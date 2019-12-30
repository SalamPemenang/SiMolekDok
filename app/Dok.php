<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dok extends Model
{
    protected $table = 'dokumentasi';
    protected $fillable = [	'id_sub_kegiatan',
    						'nama_sub_kegiatan',
    						'video_dokumentasi',
    						'waktu_video_dokumentasi'
    					];
    protected $guarded = ['id_dokumentasi'];
    protected $primaryKey = 'id_dokumentasi';
}
