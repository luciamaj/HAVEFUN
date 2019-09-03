<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ActionFigure;
use App\Http\Resources\ActionFigure as ActionFigureResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActionFiguresApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // with(tabelle associate al modello)
      $action_figures = ActionFigure::with('serie')->get();
      // Restituisce collection af come Resource
      return ActionFigureResource::collection($action_figures);
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
      $action_figure = $request->isMethod('put') ? ActionFigure::findOrFail($request->action_figure_id) : new ActionFigure;

      $action_figure->id = $request->input('id');
      $action_figure->serie_id = $request->input('serie_id');
      $action_figure->name = $request->input('name');
      $action_figure->price = $request->input('price');
      $action_figure->height = $request->input('height');
      $action_figure->material = $request->input('material');
      $action_figure->year_of_production = $request->input('year_of_production');
      $action_figure->media = $request->input('media');
      $action_figure->quantity = $request->input('quantity');

      $action_figure->save();
      if($action_figure->save()) {
        return new ActionFigureResource($action_figure);
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
      $action_figure = ActionFigure::findOrFail($id);
      return new ActionFigureResource($action_figure);
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
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required',
        'serie_id' => 'required',
        'price' => 'required',
        'height' => 'required',
        'material' => 'required',
        'year_of_production' => 'required',
        'quantity' => 'required'
      ]);

      // $action_figure = ActionFigure::findOrFail($id);
      // $action_figure->name = $request->input('name');
      // $action_figure->serie_id = $request->input('serie_id');
      // $action_figure->price = $request->input('price');
      // $action_figure->height = $request->get('height');
      // $action_figure->material = $request->get('material');
      // $action_figure->year_of_production = $request->get('year_of_production');
      // $action_figure->media = $request->get('media');
      // $action_figure->quantity = $request->get('quantity');
      // $action_figure->save();
      // DB::table('action_figures')->where('id', [$id])->update(array('name'=>$name, 'serie_id'=>$serie_id, 'price'=>$price, 'height'=>$height, 'material'=>$material, 'year_of_production'=>$year_of_production, 'media'=>$media, 'quantity'=>$quantity));
      // return response()->json(['200' => 'modified']);

      
      $action_figure = ActionFigure::findOrFail($id);
      $action_figure->update($request->all());

      return response()->json(['200', $action_figure]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Prendo un singolo fumetto (delete definitivo)
      $action_figure = ActionFigure::findOrFail($id);

      // Ritorno il fumetto appena cancellato come resource
      if($action_figure->delete()) {
        return new ActionFigureResource($action_figure);
      }
    }
}
