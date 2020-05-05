<?php

namespace App\Http\Controllers;

use App\Details;
use App\Tags;
use App\Groups;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details    = Details::all();

        return view("admin.details.list",[
            "details" => $details,
        ]);
    }

    public function rules ( $typedate = false ) {

        $rules = [

            'title' => "required|max:255",
            'typeTime' => [
                'required',
                Rule::in('date','during'),
            ],
            'info_title.*' => "required|max:255",
            'info_date.*' => "max:255|date",
            'info_link.*' => "max:255|url",
        ];

        if ( $rules ) {

            if ( $rules == 'date' ) {

                $rules['dateBeginning'] = "required|date";
                $rules['dateEnding'] = "required|date|after_or_equal:dateBeginning";

            }

            if ( $rules == 'during' ) {

                $rules['timePassed'] = "number";

            }

        }

        return $rules;
    }

    public function create ( Request $request ) {

        $groups     = Groups::all();
        $tags       = Tags::all();

        return view("admin.details.create",[
            "groups" => $groups,
            "tags" => $tags,
        ]);
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
            return redirect()->route('admin.details.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $groups = new Groups;
        $groups->title = $request->input("title");
        $groups->user_id = Auth::user()->id;
        $groups->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin.details.index');
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
            return redirect()->route('admin.details.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $groups->title = $request->input("title");
        $groups->save();
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->route('admin.details.index');
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
        return redirect()->route('admin.details.index');
    }
}
