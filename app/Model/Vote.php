<?php

namespace App\Model;

use App\Model\Jawaban;
use App\Model\Pertanyaan;

class Vote extends Model
{
    protected $table = 'vote';

    public function parent()
    {
    	if($this->parent_type == 1) return $this->belongsTo(Pertanyaan::class, 'id_parent');
    	return $this->belongsTo(Jawaban::class, 'id_parent');
    }
}
