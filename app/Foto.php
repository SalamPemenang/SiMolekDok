<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $fillable = ['id', 'dokumentasi_id', 'foto_dokumentasi', 'waktu_foto_dokumentasi'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
