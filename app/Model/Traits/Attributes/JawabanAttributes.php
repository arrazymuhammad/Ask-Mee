<?php 
namespace App\Model\Traits\Attributes;

use App\Model\Vote;

trait JawabanAttributes {
	public function getIsBestAttribute()
    {
    	return ($this->pertanyaan->id_jawaban_terbaik == $this->uuid) ? true : false;
    }

    public function getIsMineAttribute()
    {
    	if(!request()->user()) return false;
    	if(request()->user()->uuid == $this->id_user) return true;
    	return false;
    }

    public function getIsVotedAttribute()
    {
        $param = [
            'parent_type' => 2,
            'id_parent' => $this->uuid,
            'id_user' => request()->user()->uuid
        ];
        $vote = Vote::where($param)->count();
        if($vote > 0) return true;
        return false;
    }

    public function getVotedCountAttribute()
    {
        $param = [
            'parent_type' => 2,
            'id_parent' => $this->uuid
        ];
        $list_voted = Vote::where($param)->get();
        $point = 0;
        foreach ($list_voted as $vote) {
            if($vote->type == 1) $point++;
            else $point--;
        }
        return $point;
    }
}