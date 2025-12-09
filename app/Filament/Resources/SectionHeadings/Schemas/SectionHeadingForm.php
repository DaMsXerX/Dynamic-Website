<?php

namespace App\Filament\Resources\SectionHeadings\Schemas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SectionHeadingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
              // PAGE DROPDOWN
                Select::make('page_slug')
                    ->label('Page')
                    ->options([
                        'home' => 'Home',
                        'about' => 'About',
                        'services' => 'Services',
                        'contact' => 'Contact',
                    ])
                    ->reactive()
                    ->required(),

                // SECTION DROPDOWN (DEPENDENT)
                Select::make('section_slug')
                    ->label('Section')
                    ->options(function (callable $get) {
                        $page = $get('page_slug');

                        $sections = [

                            'home' => [
                                
                                'home_solar'   => 'Solar Services',
                                'home_pricing'      => 'Pricing Packages',
                                'home_why'     => 'Why Choose Us',
                                
                                'home_projects' => 'Projects Section',
                                'home_pmsurya' => 'Subsidy Section',
                                'home_faq' => 'FAQ',
                                
                            ],

                            'about' => [
                                'about'           => 'About Us',
                                'about_mission' => 'Mission & Vision',
                                'about_why' => 'Why Choose Us',
                                'about_team'           => 'Team Section',
                                
                            ],

                            'services' => [
                                'services_heading'       => 'Our solar services',
                                'services_offer' => 'What we offer',
                                'services_work'          => 'Services Works',
                            ],

                            'contact' => [
                                // 'hero'         => 'Hero Section',
                                // 'contact_info' => 'Contact Info Section',
                                // 'cta'          => 'CTA Section',
                            ],
                        ];

                        return $sections[$page] ?? [];
                    })
                    ->searchable()
                    ->required(),

                TextInput::make('heading')->required(),
                TextInput::make('highlight_text'),
                TextInput::make('extra_heading'),
                TextInput::make('subheading'),

                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                
            ]);
    }
}
