<?php

namespace App\Providers;

//  use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerPolicies();
        Gate::resource('forqanshahid', 'App\Policies\forqanshahid', [
            'addUser' => 'addUser',
            'editUser' => 'editUser',
            'deletUser' => 'deletUser',
            'addYear' => 'addYear',
            'editYear' => 'editYear',
            'deletYear' => 'deletYear',
            'addSection' => 'addSection',
            'editSection' => 'editSection',
            'deletSection' => 'deletSection',
            'addFiletype' => 'addFiletype',
            'editFiletype' => 'editFiletype',
            'deletFiletype' => 'deletFiletype',
            'addTopic' => 'addTopic',
            'editTopic' => 'editTopic',
            'deletTopic' => 'deletTopic',
            'addTitle' => 'addTitle',
            'editTitle' => 'editTitle',
            'deletTitle' => 'deletTitle',
            'addTitleFiles' => 'addTitleFiles',
            'editTitleFile' => 'editTitleFile',
            'deletTitleFile' => 'deletTitleFile',
            'addSlide' => 'addSlide',
            'editSlide' => 'editSlide',
            'editSlideImg' => 'editSlideImg',
            'deletSlide' => 'deletSlide',
            'addUserGroup' => 'addUserGroup',
            'editUserGroup' => 'editUserGroup',
            'deletUserGroup' => 'deletUserGroup',
            'publishing' => 'publishing',
            'initiate' => 'initiate',
            'management' => 'management',
            'initiateYears' => 'initiateYears',
            'initiateSections' => 'initiateSections',
            'initiateFiletypes' => 'initiateFiletypes',
            'publishingTopics' => 'publishingTopics',
            'publishingTitles' => 'publishingTitles',
            'publishingSlider' => 'publishingSlider',
            'managementUsers' => 'managementUsers',
            'managementGroups' => 'managementGroups',

        ]);

    }
}
