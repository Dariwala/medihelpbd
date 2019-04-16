<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input as input;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user()->id;
        
        return view('auth.passwords.change' , compact('user'));
    }
  
    public function change(Request $request, $id)
    {
        $user = User::find($id);
        
        if(Hash::check(Input::get('old_password'),$user->password)){

            $this->validate($request, [
            'old_password'              => 'required|string|min:6',
            'new_password'              => 'required|string|min:6',
            'confirm_password'          => 'required|string|min:6|same:new_password',
            ]);
            
        $user->password = bcrypt(Input::get('new_password'));
        $user->update();

            return back()->with(array('flash_message' => 'Password Update Successfully' , 'alert.status' => 'success'));
        }
        else{
            return back()->with(array('flash_message' => 'Donot Match Password' , 'alert.status' => 'danger'));
        }

        
    }
   
    public function store(Request $request)
    {
        //
    }
   
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        //
    }
   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
