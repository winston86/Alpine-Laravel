<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{

    public $table = 'rows';

    protected $fillable = ['id', 'ACI', 'IPT'];


    public $ACI;
    public $IPT;

}
