<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBadDomain;
use Illuminate\Http\Request;
use App\BadDomain;
use DataTables;

class BadDomainController extends Controller
{
    /**
     * Display a listing of the bad domains.
     *
     */
    public function index()
    {
        return view('pages.bad_domain');
    }
    
    /**
     * Get data for bad domain dataTable
     *
     */
    public function getDataTable()
    {
        $domains = BadDomain::all();
        return DataTables::of($domains)->make(true);
    }
    
    /**
     * Store a new bad domain in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBadDomain $request)
    {
        $domain = new BadDomain;

        $domain->fill( $request->all() );
        $domain->save();
        return back();
    }


}
