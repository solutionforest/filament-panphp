<?php

namespace SolutionForest\FilamentPanphp\Models;

use Illuminate\Database\Eloquent\Model;

class PanAnalytics extends Model
{
    protected $table = 'pan_analytics';

    protected $fillable = [
        'name',
        'impressions',
        'hovers',
        'clicks',
    ];

}