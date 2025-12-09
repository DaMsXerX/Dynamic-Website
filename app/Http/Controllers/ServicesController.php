<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Setting;
use App\Models\NavigationLink;
use App\Models\Hero;
use App\Models\ServiceProcessStep;
use App\Models\CtaSection;
use App\Models\SectionHeading;

class ServicesController extends Controller
{
     public function index()
    {
        return view('pages.services', [
            'settings' => Setting::first(),
            'navLinks' => NavigationLink::orderBy('order')->get(),
            'hero' => Hero::where('page_slug', 'services')->first(),
            'services' => Service::all(),
            'processSteps' => ServiceProcessStep::where('page_slug', 'services')
                                                ->orderBy('order')
                                                ->get(),



            'cta' => CtaSection::where('page_slug', 'services')->first(),

            'servicesHeading'       => SectionHeading::where('page_slug', 'services')->where('section_slug', 'services_heading')->first(),
            'servicesOffer'    => SectionHeading::where('page_slug', 'services')->where('section_slug', 'services_offer')->first(),
            'servicesWork'  => SectionHeading::where('page_slug', 'services')->where('section_slug', 'services_work')->first(),
            
        ]);
    }
}
