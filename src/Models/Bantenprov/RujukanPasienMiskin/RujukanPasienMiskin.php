<?php

namespace App\Models\Bantenprov\RujukanPasienMiskin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RujukanPasienMiskin extends Model 
{

    protected $table = 'rujukan_pasien_miskin';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

}