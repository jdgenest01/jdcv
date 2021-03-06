<?php

namespace App\Http\Controllers;

use App\Details;
use App\Tags;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups     = Groups::all();
        $details    = Details::all();

        return view("admin.details.main",[
            "detail" => new Details,
            "groups" => $groups,
            "details" => $details,
        ]);
    }

    public function rules ( ) {

        $rules = [

            'title' => "required|max:255",
            'description' => "required",
            'groups_id' => "required",

        ];

        $rules['dateBeginning'] = "required|date";
        $rules['dateEnding'] = "required|date|after_or_equal:dateBeginning";

        return $rules;
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
            return redirect()->route("admin_details")
                        ->withErrors($validator)
                        ->withInput();
        }

        $details = new Details();
        $details->title = $request->input("title");
        $details->description = $request->input("description");
        $details->dateBeginning = $request->input("dateBeginning");
        $details->dateEnding = $request->input("dateEnding");
        $details->groups_id = $request->input("groups_id");
        $details->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $details = Details::where( 'id', $id )->first();
        $groups     = Groups::all();

        return view("admin.details.edit",[
            "details" => $details,
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

        $details = Details::where( 'id', $id )->first();

        if ( !$details ) {
            return redirect()->route("admin_details");
        }
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->route("admin_details")
                        ->withErrors($validator)
                        ->withInput();
        }

        $details->title = $request->input("title");
        $details->description = $request->input("description");
        $details->dateBeginning = $request->input("dateBeginning");
        $details->dateEnding = $request->input("dateEnding");
        $details->groups_id = $request->input("groups_id");
        $details->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $details = Details::where( 'id', $id )->first();

        $details->delete();

        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route("admin_details");
    }
}
