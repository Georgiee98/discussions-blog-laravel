<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $projects = Projects::all();
        return view('projects.list', compact('projects'));
    }

    public function create()
    {
        // Allow only authenticated users to create projects
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validate project data
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'url' => 'string',
            'image_url' => 'required|string',
            // Add other fields as necessary
        ]);

        Projects::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'url' => $request->url,
            'image_url' => $request->image_url,
            // Add other fields as necessary
        ]);

        return redirect()->route('home')->with('success', 'Project created successfully.');

    }

    public function edit($id)
    {
        // Fetch the project by its ID
        $project = Projects::findOrFail($id);

        // Check if the logged-in user is authorized to edit this project
        if (!Auth::user()->is_admin) {
            return redirect()->route('projects.index')->with('error', 'You are not authorized to edit this project.');
        }

        // Pass the project to the edit view
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {


        \Log::debug($request->all());
        $project = Projects::findOrFail($id);

        \Log::debug('Updated project:', $project->toArray());

        // Validate project data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'string|nullable',
            'description' => 'required|string',
            'url' => 'string|nullable',
            'image_url' => 'required|string|nullable',
        ]);

        // Directly use update method with validated data
        $project->update($validated);

        return redirect()->route('home')->with('success', 'Project updated successfully.');

    }

    public function destroy($id)
    {
        $projects = Projects::findOrFail($id);

        // Check if the logged-in user is authorized to delete this project
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this project.');
        }

        // Delete project
        $projects->delete();

        return redirect()->route('home')->with('success', 'Project deleted successfully.');
    }
}