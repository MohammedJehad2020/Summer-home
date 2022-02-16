<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'Price',
        'Size',
        'City',
        'Bedrooms_count',
        'Bathrooms_Count',
        'Description',
        'Sales_agent_name',
    ];


    public function images(){
        return $this->hasMany(Image::class, 'home_id', 'id');
    }

    public function facilities(){
        return $this->hasMany(Facilities::class, 'home_id', 'id');
    }


}
