<?php

use App\Enums\RolesEnum;
use Illuminate\Support\Facades\Route;

Route::get('test/{type}', function ($type) {
    switch ($type) {
        case 'enum':
            return 'enum';

        default:
            # code...
            break;
    }

    return 'ok';
});
