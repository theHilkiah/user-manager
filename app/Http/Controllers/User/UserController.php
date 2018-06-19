<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\User\Profile;
use Admin\Media\Http\Controllers\MediaController;

class UserController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ID = auth()->user()->id;
        $data['User'] = User::find($ID);

        $path = trim($request->path(), '\/');
        $page  = str_replace(['user/', 'user'], '', $path);
        $view  = str_replace("/", ".", trim($page, '\/'));

        return view("users." . ($view ?: 'index'), $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ID = auth()->user()->id;
        $data['User'] = User::find($ID);
        switch ($id) {
           case 'account':
              return $this->edit($ID);
              break;
           case 'uploads':
              $view = 'uploads';
              break;
           default:
              $view = 'index';
              break;
        }
        return view("users.$view", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ID = auth()->id();
        $data['User'] = User::find($ID);
        return view("users.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ID = auth()->id();
        $User = User::find($ID);

        try {
            if($request->photo){
                $request->merge([
                    'user_id' => $request->user()->id,
                    'file' => $request->file('photo')
                ]);
                $photo = app(MediaController::class)->store($request);
            }
            if($id == 'account' && $request->type == 'login'){
                $User->update($request->all());
            } elseif($id == 'account' && $request->type == 'profile'){
                $Pro  = $User->profile ?? Profile::create(['user_id' => $ID]);
                if(isset($photo)) $request->merge(compact('photo'));
                $Pro->update($request->input());
            }
            return back()->withSuccess('Succsssfully updated records!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
