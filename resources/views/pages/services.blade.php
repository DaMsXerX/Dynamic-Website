@extends('layouts.main')

@section('title', 'Services')

@section('content')
 <!-- new section satrt -->

 <!-- SERVICE HERO SECTION -->
<section style="
  background:url('/image/Residential-Rooftop.png');
  background-size:cover;
  background-position:center;
  padding:;">
  
  <div style="max-width:px; margin:auto; text-align:center; background:rgba(0,0,0,0.55);
      padding:60px 30px; border-radius:px; color:white;">

    <h1 style="font-size:48px; font-weight:800;">{{$servicesHeading -> heading ?? ''}}</h1>
    <p style="margin-top:15px; font-size:18px; line-height:1.7;">
      {{$servicesHeading -> subheading ?? ''}}
    </p>
  </div>
</section>

<section style="padding:70px 20px;">
  <div style="max-width:1100px; margin:auto; text-align:center;">
    <h2 style="font-size:36px; font-weight:700; color:#003366;">{{ $servicesOffer -> heading ?? ''}}</h2>
    <p style="margin-top:12px; font-size:16px; color:#555;">
      {{ $servicesOffer-> subheading ?? ''}}
    </p>
  </div>
</section>
<section style="padding:50px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:35px; justify-content:center;">

    @foreach($services as $service)
      <div class="service-card">
        @if($service->image)
          <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
        @endif
        <h3>{{ $service->title }}</h3>
        <p>{{ $service->description }}</p>
        <a href="{{ $service->cta_url ?? '/contact' }}">
          {{ $service->cta_label ?? 'Learn More →' }}
        </a>
      </div>
    @endforeach

  </div>
</section>


<section style="padding:80px 20px;">
  <div style="max-width:1100px; margin:auto; text-align:center;">

    <h2 style="font-size:36px; font-weight:700; color:#003366;">{{ $servicesWork -> heading ?? ''}}</h2>

    <div style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center; margin-top:40px;">

      <!-- <div class="process-box">
        <span>01</span>
        <h4>Site Assessment</h4>
        <p>We evaluate your location, structure & energy requirements.</p>
      </div>

      <div class="process-box">
        <span>02</span>
        <h4>Design & Planning</h4>
        <p>Customized solar system layout to match your needs.</p>
      </div>

      <div class="process-box">
        <span>03</span>
        <h4>Installation</h4>
        <p>Certified engineers install solar panels & inverters.</p>
      </div>

      <div class="process-box">
        <span>04</span>
        <h4>Activation</h4>
        <p>System activation + monitoring setup + final tesing.</p>
      </div> -->
       @foreach($processSteps as $index => $step)
      <div class="process-box">
        <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
        <h4>{{ $step->title }}</h4>
        <p>{{ $step->description }}</p>
      </div>
      @endforeach

    </div>

  </div>
</section>

<!-- <section style="padding:80px 20px; background:#003366; color:white;">
  <div style="max-width:1100px; margin:auto;">

    <h2 style="font-size:34px; font-weight:700; text-align:center;">Why Solar With Us?</h2>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:40px; margin-top:50px;">

      <div class="benefit-card">
        <h3>High ROI</h3>
        <p>Solar pays for itself in 3–5 years with massive bill savings.</p>
      </div>

      <div class="benefit-card">
        <h3>Premium Support</h3>
        <p>24/7 support & real-time monitoring assistance.</p>
      </div>

      <div class="benefit-card">
        <h3>Govt Subsidy</h3>
        <p>Up to ₹1,08,000 subsidy under national solar schemes.</p>
      </div>

    </div>
  </div>
</section> -->

<!-- <section style="padding:80px 20px; background:#003366; color:white;">
  <div style="max-width:1100px; margin:auto;">

    <h2 style="font-size:34px; font-weight:700; text-align:center;">Why Solar With Us?</h2>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:40px; margin-top:50px;">

      <div class="benefit-card">
        <h3>High ROI</h3>
        <p>Solar pays for itself in 3–5 years with massive bill savings.</p>
      </div>

      <div class="benefit-card">
        <h3>Premium Support</h3>
        <p>24/7 support & real-time monitoring assistance.</p>
      </div>

      <div class="benefit-card">
        <h3>Govt Subsidy</h3>
        <p>Up to ₹1,08,000 subsidy under national solar schemes.</p>
      </div>

    </div>
  </div>
</section> -->

<!-- <section style="padding:70px 20px; text-align:center; background:#f3f8ff;">
  <h2 style="font-size:34px; font-weight:700; color:#003366;">Ready to Switch to Solar?</h2>
  <p style="margin-top:10px; color:#555;">Get a free consultation from our solar experts.</p>
  
  <a href="contact.html" 
    style="margin-top:20px; display:inline-block; padding:12px 28px; background:#ffaa00; 
           color:#003366; font-weight:700; text-decoration:none; border-radius:8px;">
    Contact Now
  </a>
</section> -->

@if($cta)
<section style="padding:70px 20px; text-align:center; background:#f3f8ff;">

    <h2 style="font-size:34px; font-weight:700; color:#003366;">
        {{ $cta->headline }}
    </h2>

    @if($cta->subtext)
    <p style="margin-top:10px; color:#555;">
        {{ $cta->subtext }}
    </p>
    @endif

    @php
        $ctaUrl = $cta->button_url ?: url('/contact');
    @endphp

    <a href="{{ $ctaUrl }}"
        style="margin-top:20px; display:inline-block; padding:12px 28px; background:#ffaa00;
               color:#003366; font-weight:700; text-decoration:none; border-radius:8px;">
        {{ $cta->button_text ?? 'Contact Now' }}
    </a>

</section>
@endif


<style>
.service-card {
  width:300px;
  background:white;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
  transition:.4s;
  animation:fadeUp .8s;
}
.service-card img {
  width:100%; height:180px; object-fit:cover;
}
.service-card h3 {
  font-size:22px; font-weight:700; margin:15px 20px 5px; color:#003366;
}
.service-card p {
  margin:0 20px 15px; color:#555; font-size:15px;
}
.service-card a {
  margin:0 20px 25px; display:inline-block; color:#003f8c; 
  font-weight:600; text-decoration:none;
}
.service-card:hover {
  transform:translateY(-12px);
  box-shadow:0 15px 35px rgba(0,0,0,0.2);
}
.process-box {
  width:230px;
  padding:25px;
  background:white;
  border-radius:14px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
  animation:fadeUp .8s;
  transition:.4s;
}
.process-box span {
  font-size:28px; font-weight:800; color:#ffaa00;
}
.process-box h4 {
  margin-top:10px; color:#003366; font-size:20px;
}
.process-box p {
  color:#555; font-size:15px; margin-top:8px;
}
.process-box:hover {
  transform:translateY(-12px);
}
.benefit-card {
  width:240px;
  text-align:center;
}
.benefit-card h3 {
  font-size:22px; color:#ffaa00; margin-bottom:10px;
}
.benefit-card p {
  color:white; font-size:15px; line-height:1.6;
}
@keyframes fadeUp {
  from {opacity:0; transform:translateY(30px);}
  to {opacity:1; transform:translateY(0);}
}
</style>

@endsection