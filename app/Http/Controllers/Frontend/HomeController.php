<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('Access Backend'))
        {
            if(auth()->user()->hasPermissionTo('Full access'))
                return redirect()->route('admin.dashboard');
            else
                //TODO: here must me redirect to moderator dashboard
                return redirect()->route('frontend.user.dashboard');
        }
        else
            return redirect()->route('frontend.user.dashboard');
    }
}
