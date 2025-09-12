<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OilRecommendation extends Model
{
    use HasFactory;

    protected $table = 'oil_recommendations';

    protected $fillable = ['car_model_id', 'year', 'recommended_oil'];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}