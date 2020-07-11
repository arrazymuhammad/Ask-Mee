<?php 
namespace App\Model\Traits\Relationships;

use App\Model\Jawaban;
use App\Model\Komentar;
use App\Model\User;

trait PertanyaanRelationship {
	public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function jawaban()
    {
    	return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }	

    public function komentar()
    {
    	return $this->hasMany(Komentar::class, 'id_parent');
    }
}