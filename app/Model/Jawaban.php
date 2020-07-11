<?php

namespace App\Model;

use App\Model\Pertanyaan;
use App\Model\Traits\Attributes\JawabanAttributes;
use App\Model\Traits\Relationships\JawabanRelationship;
use App\Model\User;

class Jawaban extends Model
{
    use JawabanRelationship, JawabanAttributes;
    protected $table = 'jawaban';
}
