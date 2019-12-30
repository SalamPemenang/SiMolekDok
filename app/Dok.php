<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dok extends Model
{
    protected $table = 'dokumentasi';
    protected $guarded = ['id_dokumentasi'];
    protected $primaryKey = 'id_dokumentasi';
}
