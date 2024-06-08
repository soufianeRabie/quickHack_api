<?php

namespace App\Http\Controllers;

use App\Models\table1;
use Illuminate\Http\Request;

class Table1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atts = table1::all();
        return response()->json(['atts'=>$atts]);
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
    public function store(Request $request)
    {
//        $fillabe = ;

        $newAtts = table1::create($request->post());
        return response()->json(['table1'=>$newAtts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(table1 $table1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(table1 $table1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, table1 $table1)
    {
        $fillable = $request->post();
        $table1->fill($fillable);

        $table1->save();

        return response()->json(['table1'=>$table1]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(table1 $table1)
    {
        $table1->delete();

        return response()->json(true);
    }
}
