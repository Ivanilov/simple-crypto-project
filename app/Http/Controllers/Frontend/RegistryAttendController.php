<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistryAttend\RegistryAttendRequest;
use ZipArchive;
use Defuse\Crypto\File;
use Defuse\Crypto\Key;

/**
 * Class ContactController.
 */
class RegistryAttendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.registry-attend');
    }

    /**
     * @param RegistryAttendRequest $request
     *
     * @return mixed
     */
    public function send(RegistryAttendRequest $request)
    {
        $files = glob(storage_path().'/archive/*'); // get all file names
        foreach($files as $file){ // iterate files
        if(is_file($file))
            unlink($file); // delete file
        }

        $attend = \App\Models\RegistryAttend::create([
            'first_name' => 'Ant',
            'email' => 'ok'
        ]);
        $attend->createFilesLibrary($request->files_order);
        $attend->save();
        $files = $attend->files;
        $zip = new ZipArchive;
        $zip->open(storage_path().'/archive/'.'test.zip', ZipArchive::CREATE);
        foreach ($files as $file)
        {
            $zip->addFile($file->getPath(), $file->file_name);
        }
        $zip->close();

        $key = Key::createNewRandomKey();
        File::encryptFile(storage_path().'/archive/'.'test.zip',storage_path().'/archive/encrypt/'.'test.zip',$key);
        File::decryptFile(storage_path().'/archive/encrypt/'.'test.zip',storage_path().'/archive/decrypt/'.'test.zip',$key);

        return redirect()->back()->withFlashSuccess('Кодирование прошло успешно!');
    }
}
