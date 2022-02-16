<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Requests\HomeStore;
use App\Models\Image;

class HomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::all();

        return view('admin.homes.index', [
            'homes' => $homes,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homes.create', [
            'home' => new Home(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeStore $request)
    {
        try {

        $validated = $request->validated();
        $home = new Home();

        $home->Price = $request->Price;
        $home->Size = $request->Size;
        $home->City = $request->City;
        $home->Bedrooms_count = $request->Bedrooms_count;
        $home->Bathrooms_Count = $request->Bathrooms_Count;
        $home->Description = $request->Description;
        $home->Sales_agent_name = $request->Sales_agent_name;
        $home->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $home->image = $file->storeAs('/images', $file->getclientOriginalName(), [
                'disk' => 'uploads'
            ]);
        }

        if ($request->hasFile('gallery')) {
            $images = $request->file('gallery');
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $image_path = $image->store('homes', 'images');
                    Image::create([
                        'home_id' => $home->id,
                        'path' => $image_path,
                    ]);
                }
            }
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('admin.homes.index');


    } catch (\Exception $e) {

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HomeStore $request)
    {
        try {


            $validated = $request->validated();
            $id = $request->id;
            $home = Home::findOrFail($id);
    
            $home->update([
           
            $home->Price = $request->Price,
            $home->Size = $request->Size,
            $home->City = $request->City,
            $home->Bedrooms_count = $request->Bedrooms_count,
            $home->Bathrooms_Count = $request->Bathrooms_Count,
            $home->Description = $request->Description,
            $home->Sales_agent_name = $request->Sales_agent_name,

        ]);
    
            toastr()->success(trans('messages.success'));
            return redirect()->route('admin.homes.index');
    
    
        } catch (\Exception $e) {
    
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $home = Home::findOrFail($id)->delete();

        toastr()->error(trans('messages.Delete'));
        return redirect()->route('admin.homes.index');
    }
}
