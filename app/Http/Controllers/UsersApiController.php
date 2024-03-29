<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return UserResource::collection($users);
    }

    // public function changeStatus(Request $request)
    // {
    //     $user = User::find($request->user_id);
    //     $user->status = $request->status;
    //     $user->save();
    //
    //     return response()->json(['success'=>'Status change successfully.']);
    // }

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
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
      return new UserResource($user);
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
      if ($user->isAdmin == 0) {
        $request->validate([
          'name' => 'required',
          'email' => 'required'
        ]);

        $user = User::findOrFail($id);
        $name = $request->get('name');
        $email = $request->get('email');
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        $updated_at = Carbon::now()->format('Y-m-d H:i:s');
      }

      DB::table('users')->where('id', [$id])->update(array('name'=>$name, 'email'=>$email));
      return response()->json(['200', $user]);
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
       $user = User::findOrFail($id);

       // Ritorno il fumetto appena cancellato come resource
       if($user->delete()) {
         return new UserResource($user);
       }
     }
}
