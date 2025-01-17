<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atts =Pharmacy::all();
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
        $newAtts = Pharmacy::create($request->post());
        return response()->json(['pharmacy'=>$newAtts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pharmacy $table1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pharmacy $table1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Pharmacy $pharmacy)
    {
        $fillable = $request->post();
        $pharmacy->fill($fillable);

        $pharmacy->save();

        return response()->json(['pharmacy'=>$pharmacy]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return response()->json(true);
    }
}
