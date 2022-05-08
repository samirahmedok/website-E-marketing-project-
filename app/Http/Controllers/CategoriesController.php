<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('category.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = time(). '.' .$request->image->getClientOriginalExtension();
        $categories = new categories;
        $categories->cat_name = request('name');
        $categories->image = $image_name;
        $categories->save();

        $request->image->move(public_path('uploads'),$image_name);

        return back()->with('success','category has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::where('id',$id)->first();
        return view('category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categories = Categories::find($request->id);
        $categories->cat_name = request('name');
        if($request->hasFile('image'))
        {
           
            $image_name = time(). '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$image_name);
            $categories->image = $image_name;
        }
        $categories->save();
        return redirect('/categories')->with('success','category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return back()->with('success','category has been deleted successfully');
    }
}
