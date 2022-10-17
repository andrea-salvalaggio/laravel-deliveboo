<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;

class RestaurantController extends Controller
{
    protected $validateDatas = [
        'name' => 'required|min:2|max:40',
        'address' =>'unique|required|min:10|max:80, deve contenere un numero',
        'open' => 'required|date_format:H:i',
        'close' => 'required|date_format:H:i|after:open',
        'image'=> 'required|image!size:1024',

    ];

    //messaggi

    protected $validateDateMsgs = [
        'name.required' => 'Restaurant name is required',
        'name.min' => 'Restaurant name need to be min 2 characters',
        'name.max' => 'Restaurant name need to be max 40 characters',

        'address.unique'=> 'There is already a restaurant with this address',
        'address.required'=>'Restaurant address is required',
        'address.min' => 'Restaurant address need to be min 10 characters',
        'address.max' => 'Restaurant address need to be max 80 characters',

        'open.required'=> 'open time is required',
        'close.required' => 'open time is required',

        'image.required' => 'RestaurantPic is required',
        'image.image' => 'RestaurantPic must be an image',
        'image.size' => 'RestaurantPic must be 1MB',

    ];

    public function index()
    {
        //
        $restaurants=Auth::user()->restaurant;
        if ($restaurants === null) {
            return redirect()->route('admin.restaurant.create');
        } else{
            return view('admin.restaurant.index', compact('restaurants'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $newRestaurant = new Restaurant();
        $categories = Category::all();
        return view('admin.restaurant.create', compact(['newRestaurant', 'categories']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $sentData = $request->all();
        // dd($sentData);
        $newRestaurant = new Restaurant();
        $newRestaurant['user_id'] = Auth::user()->id;
        // dd($newRestaurant);
        $newRestaurant->fill($sentData);
        $newRestaurant->restaurantPic = Storage::put('uploads/user', $sentData['restaurantPic']);
        $newRestaurant->save();
        $newRestaurant->categories()->sync($sentData['categories']);
        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newRestaurant = Restaurant::findOrFail($id);
        $categories = Category::all();
        if($newRestaurant->user_id == auth()->id()) {
            return view('admin.restaurant.edit', compact(['newRestaurant', 'categories']));
        } else {
            return view('admin.dish.errors.accessDenied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sentData = $request->all();
        $newRestaurant = Restaurant::findOrFail($id);

        /**
         * Controllo se nell'edit è stata inserita un immagine o meno, nel secondo caso l'immagine finale sarà quella precedente!
         */
        if (array_key_exists('restaurantPic', $sentData)) {
            $sentData['restaurantPic'] = Storage::put('uploads', $sentData['restaurantPic']);
        }else{
            $sentData['restaurantPic'] = $newRestaurant->restaurantPic;
        }

        $newRestaurant->categories()->sync($sentData['categories']);
        $newRestaurant = $newRestaurant->update($sentData);
        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
