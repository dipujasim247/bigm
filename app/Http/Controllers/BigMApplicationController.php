<?php

namespace App\Http\Controllers;

use App\BigMApplication;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BigMApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $location_list = Location::select('division_name')->groupBy('division_name')->get();
        return view('front-form')->with('location_list', $location_list);
    }

    public function location(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('locations')->select($dependent)->where($select, '=', $value)->groupBy($dependent)->get();

        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\BigMApplication $bigMApplication
     * @return \Illuminate\Http\Response
     */
    public function show(BigMApplication $bigMApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\BigMApplication $bigMApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(BigMApplication $bigMApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\BigMApplication $bigMApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BigMApplication $bigMApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\BigMApplication $bigMApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(BigMApplication $bigMApplication)
    {
        //
    }
}
