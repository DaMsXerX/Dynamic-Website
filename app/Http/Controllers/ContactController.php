<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\NavigationLink;
use App\Models\Hero;
use App\Models\ContactDetail;
class ContactController extends Controller
{
    public function index(){
        return view('pages.contact', [
            'settings' => Setting::first(),
            'navLinks' => NavigationLink::orderBy('order')->get(),
            'hero' => Hero::where('page_slug', 'contact')->first(),
            'contactDetail' => ContactDetail::first(),
        ]);
    }
}
