<?php

namespace Admin\Main\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function __invoke(Request $request, ...$params)
    {
        if($request->is('admin/dashboard*')){
            return $this->index();
        }
        elseif($request->is('admin')){
            return redirect('admin/dashboard');
        }
        
    }

    public function index()
    {
        return view('main::index');
    }
}
