<?php

namespace App\Model;

use Auth;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    public $primaryKey = 'uuid';
    public $incrementing = false;
    public $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->uuid = (string) Str::uuid();
            $item->id_user = Auth::user()->uuid;
        });
    }
}
