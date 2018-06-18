<?php

namespace App\Core;

use Illuminate\Http\Request;

trait BaseControl
{
    public function _to($page , ...$params)
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

    public function message()
    {
      $alerts = null;
      if($errors->count()){
        $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = implode("<br/>", $errors->all()); $icon = 'danger';
      }
      if(session('success')){
        $alerts = true;  $type = 'Success'; $alert = 'success'; $message = session('success'); $icon = 'danger';
      }
      if(session('status')){
        $alerts = true;  $type = 'Status'; $alert = 'warning'; $message = session('status'); $icon = 'danger';
      }
      if(session('error')){
        $alerts = true;  $type = 'Error'; $alert = 'danger'; $message = session('error'); $icon = 'danger';
      }
      return get_defined_vars();
    }
}
