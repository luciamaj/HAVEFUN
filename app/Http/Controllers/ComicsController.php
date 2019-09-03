<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Serie;
use Debugbar;
use App\Comic;
use App\Rare;
use Carbon\Carbon;


class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::with('serie.category', 'rare')->paginate(5);
        return view('categories.series.comics.comics', compact('comics'));     //['comics' => $comics]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $series = Serie::all();
      return view('categories.series.comics.post_new_comic', compact('series'));
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
        'barcode' => 'required',
        'price' => 'required',
        'exit_number' => 'required',
        'exit_date' => 'required',
        'publisher' => 'required',
        'editorial_series' => 'required',
        'quantity' => 'required'
      ]);

      // $category = $request->get('serie.category');
      $comic = new Comic;
      $comic->serie_id = $request->get('serie_id');
      // $comic->serie->name = Serie::pluck('name', 'id');
      $comic->name = $request->get('name');
      $comic->barcode = $request->get('barcode');
      $comic->price = $request->get('price');
      $comic->exit_number = $request->get('exit_number');
      $comic->exit_date = $request->get('exit_date');
      $comic->publisher = $request->get('publisher');
      $comic->editorial_series = $request->get('editorial_series');
      $comic->quantity = $request->get('quantity');
      $isRare = $request->get('rare_id');

      if ($isRare != 1) {
        $rare = new Rare;
        $rare->circulation = $request->get('circulation');
        $rare->condition = $request->get('condition');
        $rare->save();
        $comic->rare()->associate($rare);
      }
      //$comic->function che collega le due tabelle nel modello Comic->associate($rare)

      $comic->save();

      if($comic){
        $red = redirect('comics')->with('success', 'Data has been added');
      } else{
        $red = redirect('comics/create')->with('danger', 'Input data failed, please try again');
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
      $comic = Comic::with('serie.category', 'rare')->find($id);
      return view('categories.series.comics.show_comic', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comic = Comic::with('serie.category', 'rare')->find($id);
      $categories = Category::all();
      $series = Serie::all();
      return view('categories.series.comics.edit_comic', ['comic' => $comic, 'categories' => $categories, 'series' => $series]);
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
        'serie_id' => 'required',
        'name' => 'required',
        'barcode' => 'required',
        'price' => 'required',
        'exit_number' => 'required',
        'exit_date' => 'required',
        'publisher' => 'required',
        'editorial_series' => 'required',
        'quantity' => 'required'
      ]);

      $comic = Comic::with('serie.category', 'rare')->find($id);
      $rare_id = $comic->rare_id;
      $isRare = $request->get('rare_id');

      Debugbar::info($rare_id);
      Debugbar::info($isRare);

      if ($rare_id != null) {
        if ($isRare != 'Normal') {
          $rare = Rare::find($rare_id);
          $rare->circulation = $request->get('circulation');
          $rare->condition = $request->get('condition');
          $rare->save();
          $comic->rare()->associate($rare);
        } else {
          $rare = Rare::find($rare_id)->forceDelete();
        }
      } else {
        if ($isRare != null) {
          Debugbar::info('herrrre');
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
      $comic->exit_date = Carbon::createFromFormat('d/m/Y', ($request->get('exit_date')));
      $comic->publisher = $request->get('publisher');
      $comic->editorial_series = $request->get('editorial_series');
      $comic->quantity = $request->get('quantity');

      // $comic = Comic::findOrFail($id);
      // $comic->update($request->all());
      // $comic->save();
      // $red = redirect('categories.series.comics')->with('success', 'Data has been updated');

      // DB::table('comics')->where('id', [$id])->update(array('serie_id'=>$serie_id, 'name'=>$name, 'barcode'=>$barcode, 'price'=>$price, 'exit_number'=>$exit_number, 'exit_date'=>$exit_date, 'publisher'=>$publisher, 'editorial_series'=>$editorial_series, 'rare_id'=>$rare_id, 'quantity'=>$quantity));
      // return redirect('comics')->with('success', 'Comic has been updated');
      if($comic){
        $red = redirect('comics')->with('success', 'Data has been updated');
      } else{
        $red = redirect('comics/edit/'.$id)->with('danger', 'Error during update, please try again');
      }

      return $red;

      // update globale
      // $comics = DB::update('update comics set category=?, series=?, name=?, barcode=?, price=?, exit_number=?, exit_date=?, publisher=?, editorial_series=?, rarity=?, quantity=?', [$category, $series, $name, $barcode, $price, $exit_number, $exit_date, $publisher, $editorial_series, $rarity, $quantity]);
    }

    public function softDeleted() {
      // $comics = DB::select('select * from comics where deleted_at!=null');
      $comics = Comic::onlyTrashed()->get();
      return view('categories.series.comics.soft_deleted_comics', compact('comics'));
    }

    //to bring back models to un-deleted state
    public function restoreSelectedItems(Request $request) {
      //Comic::restore();  //restore all models
      $restid = $request->input('restid');
      Comic::withTrashed()->whereIn('id', $restid)->restore();
      return back()->with('success', 'Selected products have been restored successfully');
    }

    //delete item
    public function delete(Request $request)
    {
      $deleteid = $request->input('deleteid');
      $comic = Comic::whereIn('id', $deleteid)->delete();
      // $red = redirect('comics')->with('success', 'Selected products has been deleted successfully');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $destroyid = $request->input('destroyid');
      $comic = Comic::where('id', $destroyid)->forceDelete();
      return back();
    }
}




// <?php
//
// namespace App\Http\Controllers;
//
// use App\Comic;
// use Illuminate\Http\Request;
//
// class ComicsController extends Controller
// {
//     public function list() {
//
//         $comics = Comic::all();
//
//         return view('comics', [
//           'comics' => $comics,
//         ]);
//     }
//
//     public function store() {
      // $comic = new Comic();
      // $comic->series = request('series');
      // $comic->save();
      //
      // return back();
//     }
// }
