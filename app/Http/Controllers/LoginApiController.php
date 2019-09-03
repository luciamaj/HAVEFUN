<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Auth;

class LoginApiController extends Controller
{

    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
          $user = Auth::user();
          // $success['token'] = $user->createToken('MyApp')->accessToken;
          $success['id'] = $user->id;
          $success['name'] = $user->name;
          $success['username'] = $user->username;
          $success['email'] = $user->email;
          // $success['address'] = $user->address;
          // $success['street_number'] = $user->street_number;
          // $success['avatar'] = $user->avatar;
          $success['isAdmin'] = $user->isAdmin;

          return response()->json(['success'=>$success], $this-> successStatus);
      }
      else {
          return response()->json(['error'=>'Unauthorised'], 401);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
