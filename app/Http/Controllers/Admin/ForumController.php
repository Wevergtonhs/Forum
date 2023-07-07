<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Http\Requests\StoreRequest;
use App\Services\ForumService;


class ForumController extends Controller
{

    public function __construct(
        protected ForumService $service 
        ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $forums = $this->service->getAll($request->filter);
        
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
    public function store(StoreRequest $request, Forum $forum)
    {
        $data = $request->validated();
        $data['status'] = 'a';
        
        $topic = $forum->create($data);

        return redirect()->route('forum.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        // if (!$topic = Forum::find($id)) {
        //     return back();
        // }

        if (!$topic = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/forum/show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // if (!$topic = Forum::find($id)) {
        //     return back();
        // }
        if (!$topic = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/forum/create', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        if(!$topic = Forum::find($id)){
            return back();
        }
        
        $topic->update($request->validated());

        

        return redirect()->route('forum.index', compact('topic'))->with('Topic updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // if(!$topic = Forum::find($id)){
        //     return back();
        // }

        $this->service->delete($id); 
        return redirect()->route('forum.index');
    }
}
