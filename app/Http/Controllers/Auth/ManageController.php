<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    //

    public function __invoke(...$params)
    {
        // $redirect = auth()->check();
        if(!count($params)) return redirect('admin');
    }
}
