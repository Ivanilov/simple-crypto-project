<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Http\Requests\Backend\Auth\User\UpdateAvatarRequest;
use App\Http\Requests\Backend\Auth\User\RemoveAvatarRequest;

class AvatarController extends Controller
{

    public function upload(User $user, UpdateAvatarRequest $request)
    {
        $avatar = $request->file('file');

        if($user->updateAvatar($avatar))
            return view('backend.auth.user.includes.user-block', ['user' => $user]);

        return false;
    }

    public function remove(User $user, RemoveAvatarRequest $request)
    {
        if($user->removeAvatar())
            return view('backend.auth.user.includes.user-block', ['user' => $user]);

        return false;
    }
}
