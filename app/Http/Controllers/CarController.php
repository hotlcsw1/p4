<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CarController extends Controller {
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /cars
    */
    public function getIndex(Request $request) {
        # Get all the cars "owned" by the current logged in user
        # Sort in descending order by id
        $cars = \App\Car::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('cars.index')->with('cars',$cars);
    }

    /**
    * Responds to requests to GET /cars/edit/{$id}
    */
    public function getEdit($id = null) {
        # Get this car and eager load its tags
        $car = \App\Car::with('tags')->find($id);
        if(is_null($car)) {
            \Session::flash('flash_message','Car not found.');
            return redirect('\cars');
        }

        # Manufacturer dropdown
        $manufacturerModel = new \App\Manufacturer();
        $manufacturers_for_dropdown = $manufacturerModel->getManufacturersForDropdown();

        # Tag checkboxes
        $tagModel = new \App\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

        # Size dropdown
        $sizeModel = new \App\Size();
        $sizes_for_dropdown = $sizeModel->getSizesForDropdown();

        /*
        Create a simple array of just the tag names for tags associated with this car;
        will be used in the view to decide which tags should be checked off
        */
        $tags_for_this_car = [];
        foreach($car->tags as $tag) {
            $tags_for_this_car[] = $tag->name;
        }

        # Pass variables to the view
        return view('cars.edit')
            ->with([
                'car' => $car,
                'manufacturers_for_dropdown' => $manufacturers_for_dropdown,
                'tags_for_checkbox' => $tags_for_checkbox,
                'tags_for_this_car' => $tags_for_this_car,
                'sizes_for_dropdown' => $sizes_for_dropdown,

            ]);
    }
    /**
    * Responds to requests to POST /cars/edit
    */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'year' => 'required|numeric|between:1900,2100',
                'model' => 'required|min:2',
                'style' => 'required|min:1',
                'picture' => 'required|url',
                'purchase_link' => 'url',
                'price' => 'numeric|between:1,500000',

            ]
        );
        $car = \App\Car::find($request->id);
        $car->model = $request->model;
        $car->style = $request->style;
        $car->price = $request->price;
        $car->manufacturer_id = $request->manufacturer;
        $car->size_id = $request->size;
        $car->picture = $request->picture;
        $car->year = $request->year;
        $car->purchase_link = $request->purchase_link;
        $car->save();
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $car->tags()->sync($tags);
        \Session::flash('flash_message','Your car was updated.');
        return redirect('/cars/edit/'.$request->id);

    }

    /**
     * Responds to requests to GET /cars/create
     */
    public function getCreate() {
        # Manufacturer dropdown
        $manufacturerModel = new \App\Manufacturer();
        $manufacturers_for_dropdown = $manufacturerModel->getManufacturersForDropdown();

        # Tag checkboxes
        $tagModel = new \App\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

        # Sizes dropdown
        $sizeModel = new \App\Size();
        $sizes_for_dropdown = $sizeModel->getSizesForDropdown();
        return view('cars.create')
            ->with('manufacturers_for_dropdown',$manufacturers_for_dropdown)
            ->with('tags_for_checkbox',$tags_for_checkbox)
            ->with('sizes_for_dropdown',$sizes_for_dropdown);

    }

    /**
     * Responds to requests to POST /cars/create
     */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'year' => 'required|numeric|between:1900,2100',
                'model' => 'required|min:2',
                'style' => 'required|min:1',
                'picture' => 'required|url',
                'purchase_link' => 'url',
                'price' => 'numeric|between:1,500000',

            ]
        );
        # Insert car record into database
        $car = new \App\Car();
        $car->model = $request->model;
        $car->style = $request->style;
        $car->price = $request->price;
        $car->manufacturer_id = $request->manufacturer;
        $car->size_id = $request->size;
        $car->user_id = \Auth::id();
        $car->picture = $request->picture;
        $car->year = $request->year;
        $car->purchase_link = $request->purchase_link;
        $car->save();
        # Add the tags
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $car->tags()->sync($tags);

        # Inform the user
        \Session::flash('flash_message','Your car of interest was added!');
        return redirect('/cars');

    }

    /**
     * Responds to requests to GET /cars/show/{model}
     */
    public function getShow($model = null) {
        return view('cars.show')->with('model', $model);
    }

    /**
	* Confirm the deletion
	*/
    public function getConfirmDelete($car_id) {
        $car = \App\Car::find($car_id);
        return view('cars.delete')->with('car', $car);
    }

    /**
	* To do the deletion
	*/
    public function getDoDelete($car_id) {
        # Find the car record in the db
        $car = \App\Car::find($car_id);
        if(is_null($car)) {
            \Session::flash('flash_message','Car not found.');
            return redirect('\cars');
        }

        # Delete all tags attached to the car
        if($car->tags()) {
            $car->tags()->detach();
        }

        # Delete the car record from db
        $car->delete();

        # Inform the user
        \Session::flash('flash_message',$car->model.' was deleted.');
        return redirect('/cars');
    }
}
