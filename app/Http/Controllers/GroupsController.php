<?php

namespace App\Http\Controllers;

use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::all();

        return view("admin.groups.main",[
            "groups" => $groups,
        ]);
    }

    public function rules (  ) {
        return [

            'title' => "required|max:255",

        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->route('admin.groups.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $groups = new Groups;
        $groups->title = $request->input("title");
        $groups->user_id = Auth::user()->id;
        $groups->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin.groups.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $groups = Groups::where( 'id', $id )->first();

        return view("admin.groups.edit",[
            "groups" => $groups,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $groups = Groups::where( 'id', $id )->first();
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->route('admin.groups.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $groups->title = $request->input("title");
        $groups->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $groups = Groups::where( 'id', $id )->first();
        $groups->delete();

        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin.groups.index');
    }
}
