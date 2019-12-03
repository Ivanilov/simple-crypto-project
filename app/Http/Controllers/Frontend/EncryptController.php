<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Encrypt\EncryptRequest;
use ZipArchive;
use Defuse\Crypto\File;
use Defuse\Crypto\Key;

/**
 * Class EncryptController.
 */
class EncryptController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.encrypt');
    }

    /**
     * @param EncryptAttendRequest $request
     *
     * @return mixed
     */
    public function encrypt(EncryptRequest $request)
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
        File::encryptFileWithPassword(storage_path().'/archive/'.'test.zip',storage_path().'/archive/encrypt/'.'test.zip',$request->pass);
        
        return redirect()->back()->with('link','true')->withFlashSuccess('Кодирование прошло успешно!');
    }

    public function downloadEncrypt()
    {
        return response()->download(storage_path().'/archive/encrypt/'.'test.zip');
    }


    public function decryptIndex()
    {
        return view('frontend.decrypt');
    }

    public function decrypt(EncryptRequest $request)
    {
        File::decryptFileWithPassword(storage_path().'/archive/encrypt/'.'test.zip',storage_path().'/archive/decrypt/'.'test.zip',$request->pass);

        return response()->download(storage_path().'/archive/decrypt/'.'test.zip');
    }
}
