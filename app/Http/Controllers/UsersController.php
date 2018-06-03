<?php

namespace App\Http\Controllers;

use App\Mail\NewUserCreated;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name','asc')->with('role')->get();
        return view('users.index')->with('users',$users)->with('activeMenu', 'users');
    }

    public function create()
    {
        $roles = Role::get();
        return view('users.add_edit')->with('roles',$roles)->with('activeMenu', 'users');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user){
            return redirect()->route('users.index')->withErrors(["That user doesn't exist or you don't have the right to edit it"]);
        }

        $roles = Role::get();
        return view('users.add_edit')->with('user', $user)->with('roles',$roles)->with('activeMenu', 'users');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL'
        ]);

        $input = $request->only(['name', 'email', 'phone', 'role_id']);

        $user = new User($input);
        $user->password = Hash::make(rand(1, 100000));
        $user->save();


        if ($request->has('email_body') && $request->get('email_body')){
            $emailBody = str_replace('%%registration_link%%', config('app.url') . '/register', $request->get('email_body'));
            Mail::to($user)->send(new NewUserCreated($user, $emailBody, $request->get('email_title')));
        }else{
            Mail::to($user)->send(new NewUserCreated($user));
        }

    }
}
