<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Brand extends Model
{
    use SoftDeletes, Sortable;

    protected $fillable = [
        'name',
        'logo',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public $sortable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo;
    }
}
