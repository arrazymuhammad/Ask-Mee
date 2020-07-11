<?php 
namespace App\Model\Traits\Attributes;

use App\Model\Vote;

trait PertanyaanAttributes {
	public function setTagsAttribute($value)
    {
        $tags = collect(explode(',', $value))->map(fn($item) => trim($item));
        $this->attributes['tags'] = json_encode($tags);
    }

    public function getTagArrAttribute()
    {
        return json_decode($this->tags);
    }

    public function getTagToStringAttribute()
    {
    	$tag = json_decode($this->tags);
    	$tag = implode(", ", $tag);
    	return $tag;
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
            'parent_type' => 1,
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
            'parent_type' => 1,
            'id_parent' => $this->uuid
        ];
        $list_voted = Vote::where($param)->get();

        $point = 0;
        foreach ($list_voted as $vote) {
            if($vote->type == 1) $point++;
            $point--;
        }

        return $point;
    }
}