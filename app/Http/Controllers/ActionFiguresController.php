<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ActionFigure;

class ActionFiguresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $action_figures = ActionFigure::with('serie')->get();
      return view('categories.series.action_figures.action_figures', compact('action_figures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.series.action_figures.post_new_af');
    }

    //not in --resource
    public function search(Request $request)
    {
      $search = $request->get('search_af');
      $action_figures = DB::table('action_figures')->where('connected_series', 'like', '%'.$search.'%')->paginate(5);
      return view('categories.series.action_figures.action_figures', compact('action_figures'));
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
        'price' => 'required',
        'height' => 'required',
        'material' => 'required',
        'year_of_production' => 'required',
        'media' => 'required',
        'quantity' => 'required'
      ]);

      $action_figure = new ActionFigure;
      $action_figure->name = $request->get('name');
      $action_figure->serie_id = $request->get('serie_id');
      $action_figure->price = $request->get('price');
      $action_figure->height = $request->get('height');
      $action_figure->material = $request->get('material');
      $action_figure->year_of_production = $request->get('year_of_production');
      $action_figure->media = $request->get('media');
      $action_figure->quantity = $request->get('quantity');

      $action_figure->save();
      if($action_figure->save()){
        $red = redirect('action_figures')->with('success', 'Data has been added');
      } else{
        $red = redirect('action_figures/create')->with('danger', 'Input data failed, please try again');
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
      $action_figures = DB::select('select * from action_figures where id=?', [$id]);
      return view('categories.series.action_figures.show_af', compact('action_figures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $action_figures = DB::select('select * from action_figures where id=?',[$id]);
      return view('categories.series.action_figures.edit_af')->with('action_figures', $action_figures);
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
        'connected_series' => 'required',
        'price' => 'required',
        'height' => 'required',
        'material' => 'required',
        'year_of_production' => 'required',
        'media' => 'required',
        'quantity' => 'required'
      ]);

      $action_figure = ActionFigure::find($id);
      $name = $request->input('name');
      $connected_series = $request->input('connected_series');
      $price = $request->input('price');
      $height = $request->get('height');
      $material = $request->get('material');
      $year_of_production = $request->get('year_of_production');
      $media = $request->get('media');
      $quantity = $request->get('quantity');
      $action_figure->save();
      DB::table('action_figures')->where('id', [$id])->update(array('name'=>$name, 'connected_series'=>$connected_series, 'price'=>$price, 'height'=>$height, 'material'=>$material, 'year_of_production'=>$year_of_production, 'media'=>$media, 'quantity'=>$quantity));
      // return redirect('action_figures')->with('success', 'ActionFigure has been updated');
      if($action_figure){
        $red = redirect('action_figures')->with('success', 'Data has been updated');
      } else{
        $red = redirect('action_figures/edit/'.$id)->with('danger', 'Error update please try again');
      }
      return $red;

      //update globale
      // $action_figure = DB::update('update action_figures set name=?, connected_series=?, price=?, height=?, material=?, year_of_production=?, media=?, quantity=?', [$name, $connected_series, $price, $height, $material, $year_of_production, $media, $quantity], 'WHERE id=?', [$id]);
    }

    public function softDeleted() {
      // $comics = DB::select('select * from comics where deleted_at!=null');
      $action_figures = ActionFigure::onlyTrashed()->get();
      return view('categories.series.action_figures.soft_deleted_action_figures', compact('action_figures'));
    }

    //to bring back models to un-deleted state
    public function restoreSelectedItems(Request $request) {
      //Comic::restore();  //restore all models
      $restid = $request->input('restid');
      ActionFigure::withTrashed()->whereIn('id', $restid)->restore();
      $red = redirect('action_figures')->with('success', 'Selected products has been restored successfully');
      return $red;
    }

    public function delete(Request $request)
    {
      $delid = $request->input('delid');
      ActionFigure::where('id', $delid)->delete();
      $red = redirect('action_figures')->with('success', 'Selected products has been deleted successfully');
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
      $action_figure = ActionFigure::where('id', $id)->delete();
      $red = redirect('action_figures');
      return $red;
    }
}
