<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Row;

class EditableTable extends Component
{

    public $rows = [[
        'ACI' => '',
        'IPT' => ''
    ]];

    public function __construct($id = null)
    {

        $rows = Cache::get('rows');

        if (!empty($rows))
            $this->rows = $rows;

        parent::__construct($id);
    }

    public function updateRows(array $rows)
    {
        DB::table("rows")
            ->delete();

        foreach ($rows as $i => $r){
            $row = new Row([
                'id' => $i,
                'ACI' => $r['ACI']??'',
                'IPT' => $r['IPT']??'',
            ]);
            $row->save();
        }

    }

    public function updateRowCache(int $index, string $field, string $value)
    {
        $this->rows[$index][$field] = $value;
        Cache::put('rows', $this->rows);
    }

    public function removeRowCache(int $index)
    {
        $this->rows = Cache::get('rows', []);
        unset($this->rows[$index]);
        if (empty($this->rows))
            $this->rows = [[
                'ACI' => '',
                'IPT' => ''
            ]];

        $this->rows = array_values($this->rows);
        Cache::put('rows', $this->rows);
    }

    public function addRow()
    {
        array_push($this->rows, [
            'ACI' => '',
            'IPT' => ''
        ]);
        Cache::put('rows', $this->rows);
        return $this->rows;
    }

    public function render()
    {
        return view('livewire.editable-table');
    }
}
