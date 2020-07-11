<?php 
namespace App\Model\Traits\Relationships;

use App\Model\Komentar;
use App\Model\Pertanyaan;
use App\Model\User;

trait JawabanRelationship {
	public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function pertanyaan()
    {
    	return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function komentar()
    {
    	return $this->hasMany(Komentar::class, 'id_parent');
    }
}