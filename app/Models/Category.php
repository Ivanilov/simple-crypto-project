<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Category
 *
 * @property $id
 * @property $title
 * @property $code
 * @property $description
 * @property $active
 * @property $parent_id
 *
 * Relationships
 *
 * @property Product [] | Collection                     $products
 *
 * Accessors and mutators
 *
 * @property $created_at
 * @property $updated_at
 *
 * Scopes
 *
 * @method Builder|Category      filterByParentId($id)
 *
 */
class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'code',
        'description',
        'parent_id',
        'active'
    ];

    protected $table = 'categories';


    /*
     * Relationships
     */

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product','category_id','product_id');
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

    public function getParent()
    {
        if($this->parent_id == null)
            return null;
        else
        {
            return Category::find($this->parent_id);
        }
    }

    public function children()
    {
        $categories = Category::filterByParentId($this->id)->get();
        if($categories->count())
            return $categories;
        else
            return null;
    }

    /*
     * Scopes
     */

    public function scopeFilterByParentId(Builder $q,$id)
    {
        return $q->where('parent_id',$id);
    }

}