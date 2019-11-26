<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Brand
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $active
 *
 * Relationships
 *
 * @property Product[]|Collection               $products
 *
 * Accessors and mutators
 *
 * @property $created_at
 * @property $updated_at
 *
 * Scopes
 *
 *
 */
class Brand extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'active'
    ];

    protected $table = 'brands';

    /*
     * Relationships
     */

    public function products()
    {
        return $this->hasMany(Product::class,'brand_id','id');
    }

    /*
     * Accessors and mutators
     */

    public function getCreatedAtAttribute($value)
    {
        return $this->formatDates($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->formatDates($value);
    }

    /*
     * Helpers
     */

    private function formatDates($value)
    {
        if (!empty($value))
            return Carbon::parse($value)->format('Y-m-d');
        return null;
    }

    public function isActive()
    {
        if($this->active == 1)
            return true;
        else
            return false;
    }

}