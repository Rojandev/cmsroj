<?php

namespace App\Providers;

use App\Providers\ImageWasUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       

    }

    /**
     * Handle the event.
     *
     * @param  ImageWasUploaded  $event
     * @return void
     */
    public function handle($event)
    {
        //
         $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }

    }
    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();
        dd($event);
        //your code, for example resizing and cropping
    }
}
