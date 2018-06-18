<?php

namespace Admin\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Admin\Media\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['Media'] = Media::all();
        return view('media::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('media::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      // dd($request);
        try {
            $uploader = $request->user()->id;
            $request->merge(compact('uploader'));
            $media = $request->file;
            $name = $media->getClientOriginalName();
            $uDir = 'users/'.$request->user_id;
            // $path = storage_path($uDir.'/'.$name);
            $file = $media->storeAs($uDir, $name);
            // $data = $request->except('file');
            $request->merge(compact('file'));
            // $data = array_merge($data, compact('file'));
            // dd($request->input());
            $New = Media::create($request->input());
            return $uDir.'/'.$name;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('media::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('media::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
