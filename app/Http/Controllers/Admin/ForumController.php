<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;


class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Forum $forum)
    {
        $forums = $forum->all();
        return view('admin/forum/index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/forum/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Forum $forum)
    {
        $data = $request->all();
        $data['status'] = 'a';
        
        $topic = $forum->create($data);

        return redirect(route('forum.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        if (!$topic = Forum::find($id)) {
            return back();
        }

        return view('admin/forum/show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$topic = Forum::find($id)) {
            return back();
        }

        return view('admin/forum/create', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$topic = Forum::find($id)){
            return back();
        }
        
        $topic->update($request->only([
            'subject',
            'body',
        ]));

        

        return redirect()->route('forum.index', compact('topic'))->with('Topic updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$topic = Forum::find($id)){
            return back();
        }

        $topic->delete();
        return redirect()->route('forum.index');
    }
}
