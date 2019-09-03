<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comic;
use App\Rare;
use App\Http\Resources\Comic as ComicResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComicsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comics = Comic::with('serie.category', 'rare')->get();
      // Restituisce collection segnalazioni come Resource
      return ComicResource::collection($comics);
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
      $comic = $request->isMethod('put') ? Comic::findOrFail($request->comic_id) : new Comic;

      $comic->id = $request->input('id');
      // $comic->category = $request->input('category');
      $comic->serie_id = $request->input('serie_id');
      $comic->name = $request->input('name');
      $comic->barcode = $request->input('barcode');
      $comic->price = $request->input('price');
      $comic->exit_number = $request->input('exit_number');
      $comic->exit_date = $request->input('exit_date');
      $comic->publisher = $request->input('publisher');
      $comic->editorial_series = $request->input('editorial_series');
      $comic->quantity = $request->input('quantity');
      $isRare = $request->get('rare_id');

      if ($isRare != 1) {
        $rare = new Rare;
        $rare->circulation = $request->get('circulation');
        $rare->condition = $request->get('condition');
        $rare->save();
        $comic->rare()->associate($rare);
      }

      // $comics = DB::insert('insert into comics(category, series, name, barcode, price, exit_number, exit_date, publisher, editorial_series, rarity, quantity) value(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$category, $series, $name, $barcode, $price, $exit_number, $exit_date, $publisher, $editorial_series, $rarity, $quantity]);

      $comic->save();
      return new ComicResource($comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comic = Comic::with('serie.category', 'rare')->get();
      // Ritorno il fumetto singolo come resource
      return new ComicResource($comic);
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

       // $comic = Comic::findOrFail($id);
       // $comic->update($request->all());
       //
       // return response()->json(['200', $comic]);

       $comic = Comic::with('serie.category', 'rare')->find($id);
       $rare_id = $comic->rare_id;
       $switchOn = $request->get('is_rare');
 
       if ($rare_id != null) {
         if ($switchOn == 1) {
           $rare = Rare::find($rare_id);
           $rare->circulation = $request->get('circulation');
           $rare->condition = $request->get('condition');
           $rare->save();
           $comic->rare()->associate($rare);
         } else {
           $rare = Rare::find($rare_id)->forceDelete();
         }
       } else {
         if ($switchOn == 1) {
           $rare = new Rare;
           $rare->circulation = $request->get('circulation');
           $rare->condition = $request->get('condition');
           $rare->save();
           $comic->rare()->associate($rare);
         }
       }
 
       $comic->serie_id = $request->get('serie_id');
       $comic->name = $request->get('name');
       $comic->barcode = $request->get('barcode');
       $comic->price = $request->get('price');
       $comic->exit_number = $request->get('exit_number');
       $comic->exit_date = $request->get('exit_date');
       $comic->publisher = $request->get('publisher');
       $comic->editorial_series = $request->get('editorial_series');
       $comic->quantity = $request->get('quantity');
       $comic->save();
 
       return response()->json(['200', $comic]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comic = Comic::findOrFail($id);
      // Ritorno il fumetto appena cancellato (softDeleted) come resource
      if($comic->delete()) {
        return new ComicResource($comic);
      }
    }
}
