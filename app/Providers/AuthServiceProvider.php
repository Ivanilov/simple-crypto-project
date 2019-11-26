<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        //

        $gate->define('ltm-admin-translations', function ($user) {
            return true;//auth()->user()->can('manage-translations');
        });


        $gate->define('ltm-bypass-lottery', function ($user) {
            return true;//$user && auth()->user()->can('manage-translations');
        });

        $gate->define('ltm-list-editors', function ($user, $connection_name, &$user_list) {
            /* @var $connection_name string */
            /* @var $user \App\User */
            /* @var $query  \Illuminate\Database\Query\Builder */
            $query = $user->on($connection_name)->getQuery();

            // modify the query to return only users that can edit translations and can be
            // managed by $user if you have a an editor scope defined on your user model
            // you can use it to filter only translation editors
            $user_list = $query->orderby('id')->get(['id', 'email']);

            // if the returned list is empty then no per locale admin will be shown for
            // the current user.
            return $user_list;
        });
    }
}
