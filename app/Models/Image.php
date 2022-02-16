<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
       'image_path',
       'home_id',
    ];


    public function home(){
        return $this->belongsTo(Home::class, 'home_id', 'id');
    }

    public function getImageUrlAttribute(){
        return Storage::disk('uploads')->url($this->image_path);
    }
}
