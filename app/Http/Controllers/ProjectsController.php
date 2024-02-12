<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class ProjectsController extends Controller
{
    // Constructor to apply middleware to specific methods
    public function __construct()
    {
        // Apply 'auth' middleware to ensure users are authenticated for these methods
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        // Apply 'admin' middleware to ensure only admin users can access these methods
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Method to display all projects
    public function index()
    {
        // Retrieve all projects from the database
        $projects = Projects::all();
        // Return the view with the projects data
        return view('projects.list', compact('projects'));
    }

    // Method to display the project creation form
    public function create()
    {
        // Return the view for creating a new project
        return view('projects.create');
    }

    // Method to store a newly created project in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'image_url' => 'required|url',
        ]);

        // Create a new project record with the validated data
        Projects::create($validatedData);

        // Redirect the user to the home page with a success message
        return redirect()->route('home')->with('success', 'Project created successfully.');
    }

    // Method to display the project edit form
    public function edit($id)
    {
        // Find the project by its ID
        $project = Projects::findOrFail($id);
        // Return the view for editing the project with the project data
        return view('projects.edit', compact('project'));
    }

    // Method to update the specified project in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'string|nullable',
            'description' => 'required|string',
            'url' => 'nullable|url',
            'image_url' => 'required|url',
        ]);

        // Find the project by its ID
        $project = Projects::findOrFail($id);
        // Update the project record with the validated data
        $project->update($validatedData);

        // Redirect the user to the home page with a success message
        return redirect()->route('home')->with('success', 'Project updated successfully.');
    }

    // Method to delete the specified project from the database
    public function destroy($id)
    {
        // Find the project by its ID
        $project = Projects::findOrFail($id);
        // Delete the project record
        $project->delete();

        // Redirect the user to the home page with a success message
        return redirect()->route('home')->with('success', 'Project deleted successfully.');
    }
}