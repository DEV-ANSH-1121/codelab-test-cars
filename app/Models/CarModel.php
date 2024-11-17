<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class CarModel extends Model
{
    use SoftDeletes, Sortable;

    protected $fillable = [
        'brand_id',
        'name',
        'image',
        'manufacturing_year',
        'is_active'
    ];

    protected $casts = [
        'manufacturing_year' => 'integer',
        'is_active' => 'boolean'
    ];

    public $sortable = [
        'id',
        'name',
        'manufacturing_year',
        'created_at',
        'updated_at'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image;
    }
}
