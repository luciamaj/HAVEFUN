<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return view('categories.categories_list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.post_new_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required'
      ]);

      // $category = $request->get('serie.category');
      $category = new Category;
      $category->name = $request->get('name');
      $category->save();

      if($category){
        $red = redirect('categories')->with('success', 'Category has been added');
      } else{
        $red = redirect('categories/create')->with('danger', 'Input data failed, please try again');
      }
      return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $categories = DB::select('select * from categories where id=?', [$id]);
      return view('categories.show_category', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = DB::select('select * from categories where id=?',[$id]);
      return view('categories.edit_category', ['categories' => $categories]);
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
      $request->validate([
        'name' => 'required'
      ]);

      $category = Category::find($id);
      $category->update($request->all());
      if($category){
        $red = redirect('categories')->with('success', 'Category has been updated');
      } else{
        $red = redirect('categories/edit/'.$id)->with('danger', 'Error during update, please try again');
      }
      return $red;
    }

    public function softDeleted() {
      $categories = Category::onlyTrashed()->get();
      return view('categories.soft_deleted_categories', compact('categories'));
    }

    //to bring back models to un-deleted state
    public function restoreSelectedItems(Request $request) {
      $restid = $request->input('restid');
      Category::withTrashed()->whereIn('id', $restid)->restore();
      return back()->with('success', 'Selected categories have been restored successfully');
    }

    //delete item
    public function delete(Request $request)
    {
      $deleteid = $request->input('deleteid');
      $category = Category::whereIn('id', $deleteid)->delete();
      $red = redirect('categories');
      return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Category::where('id', $id)->forceDelete();
      $red = redirect('categories');
      return $red;
    }
}
