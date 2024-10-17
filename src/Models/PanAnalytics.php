<?php

namespace SolutionForest\FilamentPanphp\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PanAnalytics extends Model
{
    use HasFactory;
    
    protected $table = 'pan_analytics';
    protected $fillable = [
        'name',
        'impressions',
        'hovers',
        'clicks',
    ];

    public $timestamps = false;
    public $rules = [
        'name' => 'required|unique:pan_analytics|max:255',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            Validator::make($model->toArray(), $model->rules)->validate();
        });
    }
}