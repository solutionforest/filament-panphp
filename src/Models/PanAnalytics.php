<?php

namespace SolutionForest\FilamentPanphp\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

/**
 * @property float $hover_percentage
 * @property float $click_percentage
 */
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

    public array $rules = [
        'name' => 'required|unique:pan_analytics|max:255',
    ];

    protected function hoverPercentage(): Attribute
    {
        return Attribute::make(
            get: function (?string $value, array $attributes): float {
                return $attributes['impressions'] > 0
                    ? ($attributes['hovers'] / $attributes['impressions']) * 100
                    : 0;
            }
        );
    }

    protected function clickPercentage(): Attribute
    {
        return Attribute::make(
            get: function (?string $value, array $attributes): float {
                return $attributes['impressions'] > 0
                    ? ($attributes['clicks'] / $attributes['impressions']) * 100
                    : 0;
            }
        );
    }

    public static function boot(): void
    {
        parent::boot();

        static::saving(function (self $model): void {
            Validator::make($model->toArray(), $model->rules)->validate();
        });
    }
}
