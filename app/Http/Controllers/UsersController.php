<?php

namespace App\Http\Controllers;

use App\Users as Users;
use Illuminate\Http\Request;
use LVR\Phone\Phone;
use LVR\Phone\E123;
use LVR\Phone\E164;
use LVR\Phone\NANP;
use LVR\Phone\Digits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $user =  auth()->user();

        return view( "admin.user", [
            "user" => $user,
            "success" => false,
        ] );
    }

    public function rules ( $user ) {
        return [

            'name' => "required|max:255",
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id, 'id')
            ],
            'adress' => "required|max:255",
            'phone' => "required|max:20",
            'presentation' => "required|max:255",
            'jobTitle' => "required",

        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = Users::where( 'id', $id )->first();

        $validator = Validator::make($request->all(), $this->rules($user));

        if ($validator->fails()) {
            return redirect()->route('admin.user.index')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user->email = $request->input("email");
        $user->jobTitle = $request->input("jobTitle");
        $user->phone = $request->input("phone");
        $user->adress = $request->input("adress");
        $user->presentation = $request->input("presentation");
        $user->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_user');
    }
}
