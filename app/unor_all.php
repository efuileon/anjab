<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unor_all extends Model
{
    protected $table = 'unor_alls';
    protected $fillable=['mulai_berlaku','KD_UNOR','parent','child','JABATN','struk','NM_UNOR','UNIT_KERJA','SINGKATAN','unker','eselon','wilayah','sarpras','NIP_PJB','NM_JAB'];
    protected $primaryKey = 'KD_UNOR';
    public $incrementing = false;

}
