<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Serie;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $series = Serie::with('category')->get();
      return view('categories.series.series_list', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.series.post_new_serie');
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
        'name' => 'required',
        'category_id' => 'required'
      ]);

      // $category = $request->get('serie.category');
      $serie = new Serie;
      $serie->category_id = $request->get('category_id');
      $serie->name = $request->get('name');
      $serie->save();

      if($serie){
        $red = redirect('series')->with('success', 'Serie has been added');
      } else{
        $red = redirect('series/create')->with('danger', 'Input data failed, please try again');
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
      $series = DB::select('select * from series where id=?', [$id]);
      return view('categories.series.show_serie', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $series = DB::select('select * from series where id=?',[$id]);
      return view('categories.series.edit_serie', ['series' => $series]);
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
        'name' => 'required',
        'category_id' => 'required'
      ]);

      $serie = Serie::find($id);
      $serie->update($request->all());
      if($serie){
        $red = redirect('series')->with('success', 'Serie has been updated');
      } else{
        $red = redirect('series/edit/'.$id)->with('danger', 'Error during update, please try again');
      }
      return $red;
    }

    public function softDeleted() {
      $series = Serie::onlyTrashed()->get();
      return view('categories.series.soft_deleted_series', compact('series'));
    }

    //to bring back models to un-deleted state
    public function restoreSelectedItems(Request $request) {
      $restid = $request->input('restid');
      Serie::withTrashed()->whereIn('id', $restid)->restore();
      return back()->with('success', 'Selected series have been restored successfully');
    }

    //delete item
    public function delete(Request $request)
    {
      $deleteid = $request->input('deleteid');
      $serie = Serie::whereIn('id', $deleteid)->delete();
      $red = redirect('series');
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
      $serie = Serie::where('id', $id)->forceDelete();
      $red = redirect('$series');
      return $red;
    }
}
