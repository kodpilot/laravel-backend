<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


// use App\Observers\ProductObserver;
// use App\Models\products;
// use App\Observers\CategoryObserver;
// use App\Models\categories;
use App\Observers\cv_infoObserver;
use App\Models\cv_infos;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // products::observe(ProductObserver::class);
        // categories::observe(CategoryObserver::class);
        cv_infos::observe(cv_infoObserver::class);
        //  
    }
}
