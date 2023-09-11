<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\scriptwriters\ScriptwriterRequest;
use App\Models\Scriptwriter;
use App\Services\ScriptwriterService;
use Illuminate\Http\Request;

class ScriptwriterController extends Controller
{
    public function __construct(private ScriptwriterService $scriptwriterService)
    {
    }

    public function index()
    {
        $scriptwriters = Scriptwriter::paginate(10);
        return view('admin.scriptwriters.index', compact('scriptwriters'));
    }

    public function create()
    {
        return view('admin.scriptwriters.create');
    }


    public function store(ScriptwriterRequest $request)
    {
        $this->scriptwriterService->create($request);
        return redirect()->route('admin.scriptwriters.index');
    }


    public function edit($id)
    {
        $scriptwriter = Scriptwriter::findOrFail($id);
        return view('admin.scriptwriters.edit', compact('scriptwriter'));
    }

    public function update(ScriptwriterRequest $request, $id)
    {
        $this->scriptwriterService->update($request, $id);
        return redirect()->route('admin.scriptwriters.index')->with("message", "the information has been updated to the database");
    }

    public function destroy($id)
    {
        $this->scriptwriterService->delete($id);
        return redirect()->route('admin.scriptwriters.index')->with('message', 'the information was deleted from the database');
    }
}
