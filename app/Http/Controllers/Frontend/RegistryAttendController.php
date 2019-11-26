<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistryAttend\RegistryAttendRequest;
use App\Mail\Frontend\RegistryAttend\RegistryAttend;
use Illuminate\Support\Facades\Mail;
use ZipArchive;

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
        $attend = \App\Models\RegistryAttend::create([
            'first_name' => 'Ant',
            'email' => 'ok'
        ]);
        $attend->createFilesLibrary($request->files_order);
        $attend->save();
        $files = $attend->files;
        $zip = new ZipArchive;
        $zip->open(storage_path().'/hello.zip', ZipArchive::CREATE);
        foreach ($files as $file)
        {
            
            $zip->addFile($file->getPath(), $file->file_name);
        }
        $zip->close();
        

        return redirect()->back()->withFlashSuccess('Заявка на регистрацию была отправлена успешно!');
    }
}
