<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hero;
use App\Models\Stat;
use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\WhyChooseItem;
use App\Models\Project;
use App\Models\Faq;
use App\Models\SubsidyRow;
use App\Models\BulletList;
use App\Models\CtaSection;
use App\Models\Setting;
use App\Models\PMSubsidy; 
use App\Models\IntroSection;
use App\Models\SectionHeading;
use App\Models\SolarInfo;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home', [
            // global settings
            'settings'          => Setting::first(),

              // ===== DYNAMIC HEADINGS =====
            'homeSolarHeading'      => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_solar')->first(),
            'homePricingHeading'    => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_pricing')->first(),
            'homeWhyHeading'        => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_why')->first(),
            'homeProjectsHeading'   => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_projects')->first(),
            'homePMSubsidyHeading'  => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_pmsurya')->first(),
            'homeFaqHeading'        => SectionHeading::where('page_slug', 'home')->where('section_slug', 'home_faq')->first(),


            // solar info
            'homeSolarInfo' => SolarInfo::where('page_slug', 'home')->first(),


            // hero section
            'hero'              => Hero::where('page_slug', 'home')->first(),
            'subsidyRows'       => SubsidyRow::where('section_slug', 'home_hero')->orderBy('order')->get(),

            // stats section
            'stats'             => Stat::where('page_slug', 'home')->orderBy('order')->get(),

            // services preview
            'services'          => Service::orderBy('order')->get(),

            // pricing plans
            'pricingPackages'   => PricingPackage::with('features')->get(),

            // why choose us
            'whyChoose'         => WhyChooseItem::where('page_slug', 'home')->orderBy('order')->get(),

            // top 3 projects
            'projects'          => Project::orderBy('order')->get(),

            // PM Surya Ghar Section
            // 'pmBullets'         => BulletList::where('section_slug', 'pm_surya_ghar')->orderBy('order')->get(),
            'pmBullets' => BulletList::orderBy('order')->get(),
            'pmSubsidyRows'     => SubsidyRow::where('section_slug', 'pm_surya_ghar')->get(),
            'pmSubsidies'       => PMSubsidy::orderBy('capacity')->get(),

            // FAQ
            'faqs'              => Faq::where('page_slug', 'home')->orderBy('order')->get(),

            // CTA section
            'cta'               => CtaSection::where('page_slug', 'home')->first(),


            // Team Intro Section
        'teamIntro'         => IntroSection::first(),
        ]);
    }
}



