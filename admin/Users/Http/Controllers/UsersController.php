<?php

namespace Admin\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Auth\User;
use Admin\Users\Models\{Group, Notes};

class UsersController extends Controller
{
    protected $users, $groups, $notes, $permissions;

    public function __construct()
    {
        $this->users = User::all();
        $this->groups = Group::all();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $Users = $this->users;
        $data = get_defined_vars();
        return view('users::users.index', $data);
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
      try {
        $request->merge(['password' => bcrypt($request->password)]);
        $User =  User::create($request->input());
        return back()->withSuccess('New user is now created');
      } catch (\Exception $e) {
        return back()->withError('Server Error: '.$e->getMessage());
      }

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($show)
    {
        switch ($show) {
            case 'groups':
                $view = 'show.groups';
                $data['Groups'] = $this->groups;
                break;

            default:
                # code...
                break;
        }
        return view('users::'.$view, $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['Groups'] = $User = $this->groups;
        $data['User'] = $User = $this->users->find($id);
        $data['Notes'] = $User->notes ?? [];
        return view('users::users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $user_id)
    {
        $request->merge(compact('user_id'));
        $author_id = $request->user()->id;
        $identity = compact('user_id', 'author_id');
        // dd($request->all());

        try {
            if($request->active == 'notes'){
                $Note = Notes::create($identity);
                $Note->fill($request->all())->save();
            } else {
                $User = User::find($user_id);
                $User->fill($request->all())->save();
            }
            return back()->withSuccess('Successfully updated records');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
