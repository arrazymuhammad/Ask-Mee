<?php

namespace App\Model;

use App\Model\Traits\Attributes\PertanyaanAttributes;
use App\Model\Traits\Relationships\PertanyaanRelationship;
use App\Model\User;

class Pertanyaan extends Model
{
    use PertanyaanRelationship, PertanyaanAttributes;

    protected $table = 'pertanyaan';
    public $guarded = [];
}
