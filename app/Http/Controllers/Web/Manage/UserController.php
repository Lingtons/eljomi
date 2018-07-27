<?php

namespace App\Http\Controllers\Web\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id', 'asc')->get();
        return view('manage.users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('manage.users.create');
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
        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'type' => 'required'
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $password = "password";
      $user->password = Hash::make($password);
      $user->type = $request->type;
      
      $user->save();

      flash('The User '.$user->name.' was created successfully')->important();
      return redirect()->back();

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
        // $user = User::where('id', $id)->first();
        // return view("manage.users.show");
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
        // $user = User::where('id', $id)->first();
        // return view("manage.users.edit")->withUser($user);
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
        $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'type' => 'required'
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->type = $request->type;

      
      if($user->save()){
            flash('The User '.$user->name.' was successfully updated')->important();
            return redirect()->back();
        }

    }


    public function reset(Request $request)
    {
        //
        $this->validate($request, [                
        'password' => 'required|string|min:6|confirmed',
      ]);


      $user = User::findOrFail(Auth::user()->id);

      $user->password = bcrypt($request->password);
      
      if($user->save()){
            flash('Password was successfully updated')->important();
            return redirect()->back()->with(Auth::logout());
        }else{
            flash('Error ! not updated')->error();
            return redirect()->back();

        }

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
