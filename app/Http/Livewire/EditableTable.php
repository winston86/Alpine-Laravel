<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class EditableTable extends Component
{

    public $rows;

    public $rows_json;

    public function mount(){
        $this->rows = Cache::get('rows', [[
            'ACI' => '',
            'IPT' => ''
        ]]);
        $this->rows_json = json_encode($this->rows);
    }

    #[On(’created’)]
    public function refresh($rows)
    {
        $this->rows = [];
        foreach ($rows as $i => $r){
            $this->rows[$i] = [
                'ACI' => $r['ACI']??'',
                'IPT' => $r['IPT']??'',
            ];
        }
        Cache::put('rows', $this->rows);
    }

    public function render()
    {
        return view('livewire.editable-table');
    }
}
