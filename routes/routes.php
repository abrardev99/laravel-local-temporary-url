<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

foreach (config('local-temporary-url.disk') as $disk) {
    Route::get("$disk/temp/{path}", function (string $path) use ($disk) {
        $filename = request('filename', null);
        return Storage::disk($disk)->download($path, $filename);
    })
        ->where('path', '.*')
        ->middleware(config('local-temporary-url.middleware'))
        ->name("$disk.temp");
}
