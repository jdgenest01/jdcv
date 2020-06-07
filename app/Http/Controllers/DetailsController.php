<?php

namespace App\Http\Controllers;

use App\Details;
use App\Tags;
use App\Groups;
use App\Infos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule ;

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
                'in:date,during'
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

        $typeTime = $request->input("typeTime");
        $validator = Validator::make($request->all(), $this->rules($typeTime));

        if ($validator->fails()) {
            return redirect()->route('admin.details.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $details = new Details;
        $details->title = $request->input("title");
        $details->description = $request->input("description");
        $details->typeTime = $request->input("typeTime");

        if ( $typeTime == "date" ) {
            $details->dateBeginning = $request->input("dateBeginning");
            $details->dateEnding = $request->input("dateEnding");
        } else {
            $details->timePassed = $request->input("timePassed");
        }

        $details->groups_id = $request->input("group");
        $details->tags()->sync( $request->input("tags") );
        $details->save();

        Infos::updateorCreate(
            [
                "id" => $request->input("id")
            ],
            [
                "title" => $request->input("info_title"),
                "description" => $request->input("info_description"),
                "link" => $request->input("info_link"),
                "date" => $request->input("info_date"),
                "details_id" => $details->id,
            ]
        );

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
        $groups     = Groups::all();
        $tags       = Tags::all();
        $details    = Details::where('id', $id)->first();
        $infos      = $details->infos()->get();
        $detailsTags= $details->tags()->get();

        dd($infos);

        return view("admin.details.edit",[
            "groups" => $groups,
            "tags" => $tags,
            "details" => $details,
            "infos" => $infos,
            "detailsTags" => $detailsTags,
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
