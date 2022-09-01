<?php

use Illuminate\Support\Facades\Route;

function checkStatus($routeName)
{
    if (Route::is($routeName))
        return true;
}
