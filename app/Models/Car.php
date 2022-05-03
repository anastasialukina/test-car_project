<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'model_id',
    ];

    protected $casts = [
        'model_id' => 'integer',
        'number' => 'string',
    ];

    public function users(?int $car_id = null): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->when($car_id, function ($query) use ($car_id) {
                $query->where('car_id', $car_id);
            });
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }
}
