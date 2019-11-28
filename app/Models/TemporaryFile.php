<?php
namespace App\Models;

use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;


class TemporaryFile
{
    public $file;

    public $folder;

    public function __construct($file = null)
    {
        $this->folder = 'files/temp/';

        if ($file)
            $this->file = $file;
    }

    public function upload($file = null)
    {
        if($file)
            $this->file = $file;

        if(!$this->file)
            return false;

        $upload_filename = $this->makeUniqueTemporaryFilename($file->getClientOriginalName());
        $upload_path = $this->makeTemporaryPath($upload_filename);

        if($file->storeAs($this->folder,$upload_filename))
        {
            return storage_path('app/').$upload_path;
        }


        return false;
    }


    public function remove($file = null)
    {
        if($file)
            $this->file = $file;

        if(!$this->file)
            return false;

        if (File::exists($this->file)) {
            return File::delete($this->file);
        }

        return true;
    }

    public static function getDataIfExists($path)
    {
        if (File::exists($path)) {
            return [
                'name' => File::name($path),
                'size' => File::size($path),
                'mimetype' => File::mimeType($path),
                'path' => $path
            ];
        }

        return false;
    }

    public static function exists($path)
    {
        return File::exists($path);
    }

    private function makeUniqueTemporaryFilename($filename)
    {
        while (File::exists($this->folder . $filename)) {
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            $filename = pathinfo($filename)['filename'] . '-' . $imageToken . '.' . pathinfo($filename)['extension'];
        }

        return $filename;
    }

    private function makeTemporaryPath($filename)
    {
        return $this->folder . $filename;
    }
}