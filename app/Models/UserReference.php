<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReference extends Model
{
    /** @use HasFactory<\Database\Factories\UserReferenceFactory> */
    use HasFactory;
     public function user(){
        return $this->belongsTo(User::class);
    }
}
