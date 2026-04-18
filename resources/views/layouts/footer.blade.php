@php
    $settings = \App\Models\Setting::first();
    $quickLinks = \App\Models\NavigationLink::where('is_primary', true)
                    ->orderBy('order')
                    ->get();
@endphp



<footer style="background:#005a97; padding:60px 20px 0 20px; color:white;">

  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:40px;">

    <!-- LEFT -->
    <div style="flex:1; min-width:280px;">

      @if($settings->logo_path)
        <img src="{{ Storage::url($settings->logo_path) }}" style="width:180px; margin-bottom:15px;">
      @endif

      <p style="font-size:15px; line-height:1.7; opacity:0.9;">
        {{ $settings->footer_about }}
      </p>

    </div>

    <!-- QUICK LINKS -->
    <div style="flex:1; min-width:200px;">
      <h3 style="font-size:22px; font-weight:700; margin-bottom:15px;">Quick<br>Links</h3>

      <!-- <a href="/" style="display:block; margin-bottom:8px; color:white; text-decoration:none;">Home</a>
      <a href="/about" style="display:block; margin-bottom:8px; color:white; text-decoration:none;">About Us</a>
      <a href="/services" style="display:block; margin-bottom:8px; color:white; text-decoration:none;">Services</a>
      <a href="/projects" style="display:block; margin-bottom:8px; color:white; text-decoration:none;">Projects</a>
      <a href="/contact" style="display:block; margin-bottom:8px; color:white; text-decoration:none;">Contact</a> -->
        @foreach($quickLinks as $link)
        <a href="{{ $link->url }}" 
           style="display:block; margin-bottom:8px; color:white; text-decoration:none;"
           target="{{ Str::startsWith($link->url, 'http') ? '_blank' : '_self' }}">
           {{ $link->label }}
        </a>
    @endforeach

    </div>

    <!-- RIGHT -->
    <div style="flex:1; min-width:280px;">
      <h3 style="font-size:22px; font-weight:700; margin-bottom:10px;">📍 Address</h3>

      <p style="line-height:1.6;">
        {{ $settings->address_line1 }}<br>
        {{ $settings->address_line2 }}<br>
        {{ $settings->city }}, {{ $settings->state }} - {{ $settings->pincode }}
      </p>

      <iframe 
        src="{{ $settings->map_embed_url }}"
        width="100%" height="220" style="border:0; border-radius:10px;"
        allowfullscreen loading="lazy">
      </iframe>
    </div>

  </div>

  <!-- SOCIAL LINKS -->
  <div style="text-align:center; margin-top:20px;">

    @foreach($settings->social_links ?? [] as $link)
      <a href="{{ $link['url'] }}" target="_blank" style="margin:0 10px; color:white;">
        {{ ucfirst($link['platform']) }}
      </a>
    @endforeach

  </div>

  <!-- COPYRIGHT -->
  <div style="text-align:center; margin-top:40px; padding:12px 0; border-top:1px solid rgba(255,255,255,0.2); font-size:14px;">
    Copyright © 2025 <a href="https://ciggytech.com/" style="color:white"> Ciggytech</a> All Rights Reserved.
  </div>
 
</footer>
