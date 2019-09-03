<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::paginate(6);
      return view('users.users_list', ['users' => $user]);
    }

    public function indexEmployee()
    {
        $users = User::all();
        return view('employee.home', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.post_new_user');
        // return view('create_user');
    }

    //not in --resource
    public function search(Request $request)
    {
      $search = $request->get('search_users');
      $users = DB::table('users')->where('name', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')->paginate(5);
      return view('users.users_list', compact('users'));
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
        'username' => 'required',
        'email' => 'required',
        'isAdmin' => 'required',
        'password' => 'required'
      ]);

      $name = $request->get('name');
      $username = $request->get('username');
      $email = $request->get('email');
      $isAdmin = $request->get('isAdmin');
      $password = bcrypt(request('password'));
      $created_at = Carbon::now()->format('Y-m-d H:i:s');
      $updated_at = Carbon::now()->format('Y-m-d H:i:s');

      $users = DB::insert('insert into users(name, username, email, isAdmin, password, created_at, updated_at) value(?, ?, ?, ?, ?, ?, ?)', [$name, $username, $email, $isAdmin, $password, $created_at, $updated_at]);
      if($users){
        $red = redirect('users_list')->with('success', 'User has been added');
      } else{
        $red = redirect('users_list/create')->with('danger', 'Input data failed, please try again');
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
      $users = DB::select('select * from users where id=?', [$id]);
      return view('users.show_user', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = DB::select('select * from users where id=?',[$id]);
      return view('users.edit_user', ['users' => $users]);
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
        'username' => 'required',
        'email' => 'required',
        'isAdmin' => 'required'
        //'password' => 'required'
      ]);

      $name = $request->get('name');
      $username = $request->get('username');
      $email = $request->get('email');
      $isAdmin = $request->get('isAdmin');
      $password = bcrypt(request('password'));
      $created_at = Carbon::now()->format('Y-m-d H:i:s');
      $updated_at = Carbon::now()->format('Y-m-d H:i:s');

      $user = DB::table('users')->where('id', [$id])->update(array('name'=>$name, 'username'=>$username, 'email'=>$email, 'isAdmin'=>$isAdmin, 'password'=>$password,
        'created_at'=>$created_at, 'updated_at'=>$updated_at));
      if($user){
        $red = redirect('users_list')->with('success', 'User has been updated');
      } else{
        $red = redirect('users_list/edit/'.$id)->with('danger', 'Error update please try again');
      }
      return $red;
    }

    public function softDeleted() {
      $users = User::onlyTrashed()->get();
      return view('users.soft_deleted_users', compact('users'));
    }

    //to bring back models to un-deleted state
    public function restoreSelectedItems(Request $request) {
      $restid = $request->input('restid');
      User::withTrashed()->whereIn('id', $restid)->restore();
      return back();
    }

    //delete item
    public function delete(Request $request)
    {
      $deleteid = $request->input('deleteid');
      $user = User::whereIn('id', $deleteid)->delete();
      $red = redirect('users_list')->with('success', 'Selected users has been deleted successfully');
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
      $user = User::where('id', $id)->forceDelete();
      return back();
    }
}
