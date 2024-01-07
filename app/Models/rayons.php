<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rayons extends Model
{
    use HasFactory;

    protected $fillable = [
        'rayon',
        'user_id'
    ];

    // RELASI
    public function user(){
        return $this->belongsTo(users::class, 'user_id', 'id');
    }

    public function student(){
        return $this->hasMany(students::class, 'rayon_id', 'id');
    }
}
