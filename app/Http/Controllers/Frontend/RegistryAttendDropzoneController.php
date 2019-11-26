<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RegistryAttend;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

/**
 * Class ContactController.
 */
class RegistryAttendDropzoneController extends Controller
{
    public function dropzoneUpload(Request $request)
    {
        if ($path = (new TemporaryFile($request->file('file')))->upload())
            return response()->json(['path' => $path], 200);

        return response()->json(['message' => 'Server error while uploading'], 500);
    }

    public function dropzoneRemove(Request $request)
    {
        $image = $request->input('id');

        if(!$image)
            return false;

        if((new TemporaryFile($image))->remove())
            return response()->json(['error' => false], 200);

        return response()->json(['error' => true]);
    }

    public function fileExists(Request $request)
    {
        if($data = TemporaryFile::getDataIfExists($request->input('path')))
        {
            return response()->json(array_merge($data, [
                'exists' => true,
            ]),200);
        }

        return response()->json(['exists' => false], 200);
    }
}
