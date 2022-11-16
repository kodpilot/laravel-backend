<?php

namespace App\Observers;

use App\Models\cv_infos;
use App\Models\verifications;

class cv_infoObserver
{
    /**
     * Handle the cv_infos "created" event.
     *
     * @param  \App\Models\cv_infos  $cv_infos
     * @return void
     */
    public function created(cv_infos $cv_infos)
    {
        $control = cv_infos::where('user_id',$cv_infos->user_id)->where('selected','1')->first() ==  null ? 1 : 0;
        if($control){
            $cv_infos->selected = '1';
            $cv_infos->save();
        }
        verifications::create([
            'cv_id' => $cv_infos->id,
        ]);
    }

    /**
     * Handle the cv_infos "updated" event.
     *
     * @param  \App\Models\cv_infos  $cv_infos
     * @return void
     */
    public function updated(cv_infos $cv_infos)
    {
        //
    }

    /**
     * Handle the cv_infos "deleted" event.
     *
     * @param  \App\Models\cv_infos  $cv_infos
     * @return void
     */
    public function deleted(cv_infos $cv_infos)
    {
        //
    }

    /**
     * Handle the cv_infos "restored" event.
     *
     * @param  \App\Models\cv_infos  $cv_infos
     * @return void
     */
    public function restored(cv_infos $cv_infos)
    {
        //
    }

    /**
     * Handle the cv_infos "force deleted" event.
     *
     * @param  \App\Models\cv_infos  $cv_infos
     * @return void
     */
    public function forceDeleted(cv_infos $cv_infos)
    {
        //
    }
}
