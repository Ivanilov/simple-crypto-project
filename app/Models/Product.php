<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Product
 *
 * @property $id
 * @property $title
 * @property $code
 * @property $vendor_code
 * @property $retail_price
 * @property $description
 * @property $specifications
 * @property $warranty
 * @property $stock
 * @property $active
 *
 * Relationships
 *
 * @property Brand                                        $brand
 * @property Category [] | Collection                     $categories
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
class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'code',
        'vendor_code',
        'retail_price',
        'description',
        'specifications',
        'warranty',
        'stock',
        'active'
    ];

    protected $table = 'products';


    /*
     * Relationships
     */

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product','product_id','category_id');
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