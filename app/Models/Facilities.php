<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'facilite', 'home_id'
    ];

    public function home(){
        return $this->belongsTo(Home::class, 'home_id', 'id');
    }
}
