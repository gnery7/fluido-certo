<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['manufacturer_id', 'name'];
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function oilRecommendations()
    {
        return $this->hasMany(OilRecommendation::class);
    }
}