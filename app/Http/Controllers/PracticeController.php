<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
class PracticeController extends Controller {
    function getExample() {
		dump(\Auth::check());     // true if we are logged in/false if we are not logged in->does not need "use Auth"
        dump(Auth::check());    // will not work without the use Auth statement
        dump(auth()->check());    // does not need "use Auth"

        dump(\Session::all());
        dump(session()->all());
        dump(Session::all());
	}
    /*----------------------------------------------------
    Lecture 12
    -----------------------------------------------------*/
    /**
	* Demonstrating working with users
	*/
    function getExample12() {
        # Get the current logged in user
		$user = \Auth::user();
        if($user) {
            echo 'Hi logged in user '.$user->name.'<br>';
        }
        # Get a user from the database
        $user = \App\User::where('name','like','Jamal')->first();
        echo 'Hi '.$user->name.'<br>';
	}
    /**
	* Get all the cars, eagerly loading the tags
	*/
    function getExample11() {
        $cars = \App\Car::with('tags')->get();
        foreach($cars as $car) {
            echo '<br>'.$car->model.' is tagged with: ';
            foreach($car->tags as $tag) {
                echo $tag->name.' ';
            }
        }
	}
    /**
	* Get a single car with its tag(s)
	*/
    function getExample10() {
        $car = \App\Car::where('model','=','F-Pace')->first();
        echo $car->model.' is tagged with: ';
        foreach($car->tags as $tag) {
            echo $tag->name.' ';
        }
	}
    /*----------------------------------------------------
    Examples 6-9 were from Lecture 11
    -----------------------------------------------------*/
    /**
	* Get all the cars with their manufacturers
	*/
    function getExample9() {
        # Eager load the manufacturers with the cars
        $cars = \App\Car::with('manufacturer')->get();
        foreach($cars as $car) {
            echo $car->manufacturer->name.' wrote '.$car->model.'<br>';
        }
        dump($cars->toArray());
	}
    /**
	* Get a single car with its manufacturer
	*/
    function getExample8() {
        $car = \App\Car::first();
        $manufacturer = $car->manufacturer;
        echo $car->model.' was made by '.$manufacturer->name;
        dump($car->toArray());
	}
    /**
	* Associate a new manufacturer with a new car
	*/
    function getExample7() {
        $manufacturer = new \App\Manufacturer;
        $manufacturer->name = 'Land Rover';
        $manufacturer->mfr_url = 'http://www.landroverusa.com/index.html';
        $manufacturer->save();
        dump($manufacturer->toArray());

        $car = new \App\Car;
        $car->model = "LR4";
        $car->style = "HSE";
        $car->year = 1997;
        $car->price = 55300;
        $car->picture = 'https://media.ed.edmunds-media.com/land-rover/lr4/2016/oem/2016_land-rover_lr4_4dr-suv_hse-lux_fq_oem_1_300.jpg';
        $car->purchase_link = 'http://www.landroverusa.com/vehicles/lr4-7-passenger-suv/models.html';
        $car->manufacturer()->associate($manufacturer); # <--- Associate the manufacturer with this car
        $car->save();
        dump($car->toArray());
		return 'Added new car.';
	}
    /**
	* Querying on the Model vs. the Collection
	*/
    function getExample6() {
        // Query Responsibility
	    $cars = \App\Car::orderBy('id','DESC')->get();
        $first = $cars->first();
        $last  = $cars->last();
        dump($cars);
        dump($first);
        dump($last);
	}
    /*----------------------------------------------------
    Examples 1-5 were from Lecture 10
    -----------------------------------------------------*/
    /**
	* Delete example
	*/
    function getExample5() {
        $car = new \App\Car();
        $harry_potter = $car->find(8);
        $harry_potter->delete();
    }
    /**
	* Update example
	*/
    function getExample4() {
        $car = new \App\Car();
        $car->model = 'Grand Cherokee';
        $car->manufacturer = 'Jeep';
        $car->save();
        return 'Example 4';
    }
    /**
	* Query for all cars using the Car model
	*/
    function getExample3() {
        $cars = new \App\Car();
        $all_cars = $cars->all();
        foreach($all_cars as $car) {
            echo $car->model.'<br>';
        }
        return 'Example 3';
    }
    /**
	* Query for all cars using the Query Builder
	*/
    function getExample2() {
        // Equivalent to: SELECT * FROM cars
        $cars = \DB::table('cars')->get();
        foreach($cars as $car) {
            echo $car->model.'<br>';
        }
        return 'Example 2';
    }
    /**
	* Insert using the Query Builder
	*/
    function getExample1() {
        \DB::table('cars')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'model' => 'Evoque',
            'style' => 'LE',
            'price' => 18665,
            'manufacturer_id' => 2,
            'user_id' => 2,
            'year' => 2016,
            'picture' => 'http://www.toyota.com/content/vehicle-landing/2016/corolla/colorizer/1F7.jpg?interpolation=lanczos-none&output-quality=90&downsize=810px:*',
            'purchase_link' => 'http://www.toyota.com/configurator/#!/build/step/model/year/2016/series/corolla',
        ]);
        return 'Example 1';
    }
} # eoc
