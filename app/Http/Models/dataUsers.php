<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class dataUsers extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute() {
        return $this->country_code. ' ' .$this->phone;
    }
}
