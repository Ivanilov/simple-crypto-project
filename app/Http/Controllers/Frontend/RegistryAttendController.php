<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistryAttend\RegistryAttendRequest;
use App\Mail\Frontend\RegistryAttend\RegistryAttend;
use Illuminate\Support\Facades\Mail;

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
        $attend = \App\Models\RegistryAttend::create($request->all());
        $attend->createFilesLibrary($request->files_order);

        try{
            Mail::send(new RegistryAttend($attend));
        }catch (\Exception $e)
        {
            return redirect()->back()->withFlashDanger('Произошла ошибка!. Код ошибки: '.$e->getCode());
        }
        return redirect()->back()->withFlashSuccess('Заявка на регистрацию была отправлена успешно!');
    }
}
