<?php

namespace App\Http\Controllers;


use App\Http\Requests\TopicRequest;
use App\Models\Classroom;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Gate;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $topics=Topic::all();

        return view("topics.index",["topics"=>$topics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopicRequest $request,$classroom_id)
    {
        //

        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);

    $validated=$request->validated();
$validated["classroom_id"]=$classroom_id;


    Topic::create($validated);


    return  redirect()->back()->with("success",__('The opreation done'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($classroom_id,$topic_id)

    {
        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);
        $topic=Topic::findOrfail($topic_id);

        return view("topics.edit",["topic"=>$topic , "classroom_id"=>$classroom_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TopicRequest $request,$classroom_id ,$topic_id)
    {
        //
        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);

        $validated=$request->validated();
        $topic=Topic::findOrfail($topic_id);
        $topic->update($validated);



        return  redirect()->back()->with("success",__('The opreation done'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $classroom_id ,$topic_id)
    {
        //

        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);
        Topic::destroy($topic_id);

        return  redirect()->back()->with("success",__('The opreation done'));

    }
    public function trashed($classroom_id)
    {
        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);
        $topics=Topic::onlyTrashed()->latest("deleted_at")->get();


       return view("topics.trashed",["topics"=>$topics,"classroom_id"=>$classroom_id]);
    }
    public function restore($classroom_id,$topic_id)
    {
        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);
        $topic=Topic::onlyTrashed()->findOrfail($topic_id);
$topic->restore();

       return back()->with("success",__('The opreation done'));
    }


public function forceDelete($classroom_id,$topic_id){
        Gate::authorize("teacher", [Classroom::findOrFail($classroom_id)]);
    Topic::withTrashed()->findOrFail($topic_id)->forceDelete();

    return back()->with("success",__('The opreation done'));

}

}
