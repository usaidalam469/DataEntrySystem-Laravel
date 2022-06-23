<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voter;
use App\Http\Requests\VoterRequest;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters=Voter::whereIsDeleted(false)->get();
        dd($voters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voters.create_update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoterRequest $request)
    {
        try
        {
            $voter=Voter::create($request->except("_token"));
            dd($voter);
        }
        catch(Exception $e)
        {
            return back()->with('message', 'Something went wrong!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voter=Voter::where(['id'=>$id,'is_deleted'=>false])->first();
        dd($voter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $voter=Voter::whereId($id)->first();
        dd($voter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $voter=Voter::update(
            [
                'id'=>$id
            ],
            $request->except("_token")
        );
        dd($voter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voter=Voter::update(
            [
                'id'=>$id
            ],
            [
                'is_deleted'=>true
            ]
            );
        dd($voter);
    }
}
