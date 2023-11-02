<?php

use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\get;

it('can generate temporary url', function () {

    $path = 'test/file.txt';
    Storage::disk('local2')->put($path, 'Hello world');

    $url = Storage::disk('local2')->temporaryUrl($path, now()->addSecond());

    expect($url)->toBeUrl();

    get($url)
        ->assertOk()
        ->assertDownload('file.txt');

    // wait for 2 second to mimic we passed given seconds.
    sleep(2);

    get($url)->assertForbidden();
});
