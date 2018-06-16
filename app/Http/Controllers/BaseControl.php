<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait BaseControl
{
    public function __to($page , ...$params)
    {
        return redirect($page);

    }

    public function success(...$params)
    {
        return redirect('');

    }

    public function error(...$params)
    {

    }

    public function status(...$params)
    {

    }
}