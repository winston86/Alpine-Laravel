<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class EditableTable extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('index');
    }


}
