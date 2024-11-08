<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class EditableTable extends Component
{

    public $rows;

    public $rowsjson;

    public function mount(){
        $this->rows = Cache::get('rows', [[
            'ACI' => '',
            'IPT' => ''
        ]]);
        $this->rowsjson = json_encode($this->rows);
    }

    public function updatedRowsjson($rows_json)
    {
        $this->rows = json_decode($rows_json);
        Cache::put('rows', $this->rows);
        return $this->rows;
    }

    public function render()
    {
        return view('livewire.editable-table');
    }
}
