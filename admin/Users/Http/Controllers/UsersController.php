<?php

namespace Admin\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Auth\User;
use Admin\Users\Models\Notes;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $Users = User::all();
        $data = get_defined_vars();
        return view('users::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['User'] = $User = User::find($id);
        $data['Notes'] = $User->notes ?? [];
        return view('users::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $user_id)
    {
        $request->merge(compact('user_id'));
        if($request->notes == 'yes'){
            $author_id = $request->user()->id;  
            $identity = compact('user_id', 'author_id');          
            $Note = Notes::create($identity);
            $Note->fill($request->all())->save();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
