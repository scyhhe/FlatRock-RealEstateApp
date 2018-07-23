<?php

namespace App\Http\Controllers;

use App\Home;
use App\HomeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class HomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'listByBroker', 'listAllBrokers']);
        $this->middleware('role:broker')->except(['index', 'show', 'listByBroker', 'listAllBrokers']);    
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'city' => 'required|string|max:25',
            'country' => 'required|string|max:25',
            'size' => 'required|integer|min:2',
            'price' => 'required|integer',
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'photos.*' => 'required|file|image|mimes:jpeg,bmp,png|max:2048'
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::latest()->paginate(5);
        return view('layouts.home', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validator($request->all())->validate();
        $photos = $request->file('photos');
        $paths  = [];
        
        $home = Home::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'size' => $request->size,
            'country' => $request->country,
            'city' => $request->city
        ]);
        
        //for each photo that comes with the request, save its path in the paths array, so we  can pass that to the HomeImage model afterwards
        foreach ($photos as $photo) {
            $extension = $photo->getClientOriginalExtension();
            $filename  = $home->id . substr(microtime(), 2, 8) . '.' . $extension;

            $path = $photo->storeAs('photos/home-' . $home->id, $filename, 'public');
            $real_path = storage_path() . '/app/public/' . $path;
            
            $image = Image::make($real_path)->resize(300,225)->save();

            $paths[]  = $image->basename;
        }
        
        // save each to DB with path and home_id for reference
        foreach ($paths as $path) {
            HomeImage::create([
                'home_id' => $home->id,
                'path' => $path
            ]);
        }

        session()->flash('message', 'Listing created successfully!');
        return redirect('home');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        return view('layouts.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        return view('layouts.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'size' => 'required|integer|min:2'
        ]);

        $home->update($request->all());
        session()->flash('message', 'Listing updated succesfully!');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        $home->delete();
        session()->flash('message', 'Listing was deleted.');
        return ['redirectTo' => back()];
    }

    public function listByBroker($id)
    {   
        $user = \App\User::find($id) ?? auth()->user();
        $homes = $user->homes;
        return view('layouts.show_by_broker', compact(['user','homes']));
    }

    public function listAllBrokers()
    {
        $brokers = \App\User::where('user_role', 'broker')->get();

        return view('layouts.list_all_brokers', compact('brokers'));    
    }
}
