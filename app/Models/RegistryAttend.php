<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Log;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class RegistryAttend
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $surname
 * @property $company
 * @property $email
 * @property $phone
 *
 * Relationships
 *
 *
 * Accessors and mutators
 *
 * @property $created_at
 * @property $updated_at
 * @property $files
 *
 * Scopes
 *
 *
 */
class RegistryAttend extends Model implements HasMedia
{
    use HasMediaTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'company',
        'email',
        'phone',
        'active'
    ];

    protected $table = 'registry_attends';

    /*
     * Relationships
     */

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

    public function getFilesAttribute()
    {
        if($this->hasFile())
            return $this->getMedia('files');
        return '';
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

    public function addFile($file)
    {
        if(!$file)
            return;
        try
        {
            $this->clearMediaCollection('files');
            $this->addMedia($file)->toMediaCollection('files');
        }
        catch (FileCannotBeAdded $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function hasFile()
    {
        return $this->hasMedia('files');
    }

    public function updateOrder($order)
    {
        $order = json_decode($order);
        $i = 1;
        foreach ($order as $item)
        {
            if($media = Media::where('id', $item)->first())
            {
                $media->order_column = $i++;
                $media->save();
            }
        }
    }

    public function fileExists($id)
    {
        return Media::where('id', $id)->first();
    }

    public function createFilesLibrary($files, $collection = null)
    {
        $library = json_decode($files);

        foreach($library as $file)
        {
            if(TemporaryFile::exists($file))
            {
                $this->addMedia($file)->toMediaCollection($collection?:'files');
            }
        }

        return $this->files;
    }


}