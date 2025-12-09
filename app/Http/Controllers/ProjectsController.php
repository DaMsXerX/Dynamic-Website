<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Setting;
use App\Models\NavigationLink;
use App\Models\Hero;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('pages.projects', [
            'settings' => Setting::first(),
            'navLinks' => NavigationLink::orderBy('order')->get(),
            'hero' => Hero::where('page_slug', 'projects')->first(),
            'projects' => Project::latest()->paginate(9),
        ]);
    }
}
