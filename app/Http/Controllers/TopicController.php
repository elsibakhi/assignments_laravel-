<?php

namespace App\Http\Controllers;


use App\Http\Requests\TopicRequest;
use Illuminate\Http\Request;
use App\Models\Topic;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopicRequest $request)
    {
        //
 
    $validated=$request->validated();

    Topic::create($validated); 

    
    return  redirect()->back()->with("success","The opreation done");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
        
        return view("topics.edit",["topic"=>$topic]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TopicRequest $request, Topic $topic)
    {
        //

        $validated=$request->validated();

        $topic->update($validated);



        return  redirect()->back()->with("success","The opreation done");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Topic::destroy($id);

        return  redirect()->back()->with("success","The opreation done");

    }
}
