<?php

namespace App\Http\Controllers;

use App\Tags as Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::all();

        return view("admin.tags.tags",[
            "tags" => $tags,
            "url" => route("admin_tags_insert"),
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
            return redirect()->route('admin_tags')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tags = new Tags;
        $tags->title = $request->input("title");
        $tags->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_tags');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tags = Tags::where( 'id', $id )->first();

        return view("admin.tags.tagsedit",[
            "tags" => $tags,
            "url" => route( "admin_tags_update" , $tags ),
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

        $tags = Tags::where( 'id', $id )->first();
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->route('admin_tags')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tags->title = $request->input("title");
        $tags->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $tags = Tags::where( 'id', $id )->first();
        $tags->delete();

        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_tags');
    }
}
