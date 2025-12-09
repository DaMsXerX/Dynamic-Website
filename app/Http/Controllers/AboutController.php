<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\NavigationLink;
use App\Models\Hero;
use App\Models\Stat;
use App\Models\TeamMember;
use App\Models\WhyChooseItem;
use App\Models\IntroSection;
use App\Models\CtaSection;
use App\Models\MissionVision;
use App\Models\SectionHeading;
use App\Models\SolarInfo;


class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about', [
            'settings' => Setting::first(),
            'navLinks' => NavigationLink::orderBy('order')->get(),
            'hero' => Hero::where('page_slug', 'about')->first(),
            'stats' => Stat::all(),
            'team' => TeamMember::all(),
            'whyChoose'         => WhyChooseItem::where('page_slug', 'about')->orderBy('order')->get(),
            'teamIntro'         => IntroSection::first(),

            // CTA section
            'cta'               => CtaSection::where('page_slug', 'about')->first(),

            'missionVision' => MissionVision::where('page_slug', 'about')->first(),

            'aboutHeading'       => SectionHeading::where('page_slug', 'about')->where('section_slug', 'about')->first(),
            'aboutMission'    => SectionHeading::where('page_slug', 'about')->where('section_slug', 'about_mission')->first(),
            'aboutWhy'  => SectionHeading::where('page_slug', 'about')->where('section_slug', 'about_why')->first(),
            'aboutTeam'       => SectionHeading::where('page_slug', 'about')->where('section_slug', 'about_team')->first(),

            //solar info
            'aboutSolarInfo' => SolarInfo::where('page_slug', 'about')->first(),
            

        ]);
    }
}
