<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\Forum;
use App\Services\ForumService;
use App\DTO\CreateForumDTO;
use App\DTO\UpdateForumDTO;
use stdClass;


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
        return view('admin/forum/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateForumDTO $request)
    {  
        $topic = $this->service->create(
            CreateForumDTO::makeFromRequest($request)
        );
        
        if (!$topic) {
            return back();
        }
    
        return redirect()->route('forum.index')->with('success', 'Topic add successfully');
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

        return view('admin/forum/form', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {

        $topic = $this->service->update(
            UpdateForumDTO::makeFromRequest($request)
        );
        
        if (!$topic) {
            return back();
        }
    
        return redirect()->route('forum.index')->with('success', 'Topic updated successfully');
    
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
