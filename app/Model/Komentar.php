<?php

namespace App\Model;

use App\Model\Jawaban;
use App\Model\Pertanyaan;

class Komentar extends Model
{
    protected $table = 'komentar';

    public function parent()
    {
    	if($this->parent_type == 1) return $this->belongsTo(Pertanyaan::class, 'id_parent');
    	return $this->belongsTo(Jawaban::class, 'id_parent');
    }

    public function getIsMineAttribute()
    {
    	if(!request()->user()) return false;
    	if(request()->user()->uuid == $this->id_user) return true;
    	return false;
    }
}
