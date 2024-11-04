<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Row;


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

    public function updateRows(Request $request)
    {
        DB::table("rows")
            ->delete();

        $rows = $request->input('rows');
        foreach ($rows as $i => $r){
            $row = new Row([
                'id' => $i,
                'ACI' => $r['ACI']??'',
                'IPT' => $r['IPT']??'',
            ]);
            $row->save();
        }

        return view('index');

    }


}
