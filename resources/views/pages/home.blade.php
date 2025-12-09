@extends('layouts.main')
@section('title', 'Home')


@section('content')

  <!-- new hero -->
   <!-- SUBSIDY SECTION START -->
<section class="subsidy-section">
  <div class="container">

    <div class="subsidy-grid">

      <!-- LEFT CONTENT -->
      <div class="subsidy-left">

        {{-- Dynamic Title --}}
        @if($hero)
        <h1>
            {!! $hero->title ?? 'Get a Solar Subsidy of' !!}
            @if($hero->highlight_text)
                <span class="highlight"> {{ $hero->highlight_text }} </span>
            @endif

            @if($hero->highlight_blue)
                <span class="highlight-blue"> {{ $hero->highlight_blue }} </span>
            @endif
        </h1>

        {{-- Dynamic Subtitle --}}
        <p class="sub-text">
            {{ $hero->subtitle ?? '' }}
        </p>
        @endif


        <!-- TABLE -->
        <table class="subsidy-table">
          <thead>
            <tr>
              <th>Capacity</th>
              <th>Central Subsidy</th>
              <th>State Subsidy</th>
              <th>Total Subsidy</th>
            </tr>
          </thead>

          <tbody>
            @foreach($subsidyRows as $row)
            <tr>
              <td>{{ $row->capacity }}</td>
              <td>₹{{ number_format((float) preg_replace('/[^0-9.]/', '', $row->central_subsidy ?? '0')) }}</td>
              <td>₹{{ number_format((float) preg_replace('/[^0-9.]/', '', $row->state_subsidy ?? '0')) }}</td>
              <td><b>₹{{ number_format((float) preg_replace('/[^0-9.]/', '', $row->total_subsidy ?? '0')) }}</b></td>

            </tr>
            @endforeach
          </tbody>

        </table>

      </div>


      <!-- RIGHT IMAGE -->
      <div class="subsidy-right">
        <div class="image-box">

          {{-- Dynamic hero image --}}
          @if($hero && $hero->primary_image)
              <img src="{{ asset('storage/' . $hero->primary_image) }}" 
                   alt="{{ $hero->title }}">
          @else
              <img src="/image/default.jpg" alt="Default Image">
          @endif

          @if($hero)
          {{-- Dynamic badge --}}
          @if($hero->badge_text)
          <div class="badge-tag">{{ $hero->badge_text }}</div>
          @endif
          @endif

        </div>
      </div>

    </div>

  </div>
</section>

<!-- SUBSIDY SECTION END -->
<style>
    /* SUBSIDY SECTION */
.subsidy-section {
  padding: 60px 20px;
  background: #e8f1fb;
}

.subsidy-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  align-items: center;
  justify-content: space-between;
}

/* LEFT SIDE */
.subsidy-left {
  flex: 1;
  min-width: 320px;
}

.subsidy-left h1 {
  font-size: 32px;
  font-weight: 700;
  line-height: 1.3;
  margin-bottom: 15px;
  color: #003366;
}

.highlight {
  color: #0d6efd;
  font-weight: 800;
}

.highlight-blue {
  color: #0061c7;
  font-weight: 700;
}

.sub-text {
  color: #555;
  font-size: 15px;
  margin-bottom: 25px;
  max-width: 450px;
}

/* TABLE */
.subsidy-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.subsidy-table th {
  background: #003f7f;
  color: white;
  padding: 12px;
  font-size: 14px;
}

.subsidy-table td {
  padding: 12px;
  border: 1px solid #dcdcdc;
  font-size: 14px;
  background: #ffffff;
}

.subsidy-table tr td:last-child {
  color: #003f7f;
  font-weight: bold;
}

/* RIGHT IMAGE */
.subsidy-right {
  flex: 1;
  min-width: 320px;
}

.image-box {
  position: relative;
  width: 100%;
}

.image-box img {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.badge-tag {
  position: absolute;
  top: 10px;
  right: 10px;
  background: #003f7f;
  color: white;
  padding: 8px 15px;
  font-size: 13px;
  border-radius: 20px;
  font-weight: 600;
}

/* BADGE ROW */
.badge-row {
  margin-top: 35px;
  display: flex;
  gap: 25px;
  flex-wrap: wrap;
  justify-content: center;
}

.badge-item {
  background: white;
  padding: 15px 20px;
  border-radius: 10px;
  display: flex;
  gap: 15px;
  align-items: center;
  min-width: 190px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
}

.badge-item img {
  width: 45px;
  height: 45px;
  object-fit: contain;
}

/* RESPONSIVE */
@media (max-width: 900px) {
  .subsidy-left h1 { font-size: 26px; }
  .subsidy-grid { flex-direction: column; }
  .image-box img { max-width: 100%; }
}

</style>
  <!-- new hero end -->

   <!-- TEAM INTRO SECTION START -->
@if($teamIntro)
<section class="team-intro-section" style="padding:70px 20px; background:#f7f9fc;">
  <div class="container" style="max-width:1200px; margin:auto;">
    <div class="intro-grid" style="display:flex; flex-wrap:wrap; gap:40px; align-items:center;">

      <!-- LEFT SIDE TEXT -->
      <div class="intro-left" style="flex:1; min-width:320px;">

    @php
        // Default heading
        $heading = $teamIntro->heading;

        // Replace {highlight} token with styled span
        if ($teamIntro->highlight_text) {
            $highlighted = '<span style="color:#003f8c; font-weight:800;">'
                            . $teamIntro->highlight_text .
                           '</span>';

            $heading = str_replace('{highlight}', $highlighted, $heading);
        }
    @endphp

    <h1 style="font-size:38px; font-weight:700; line-height:1.3; color:#003366; margin-bottom:20px;">
        {!! $heading !!}
    </h1>


        @if($teamIntro->paragraph1)
        <p style="color:#555; font-size:15px; line-height:1.7; margin-bottom:15px;">
          {!! $teamIntro->paragraph1 !!}
        </p>
        @endif

        @if($teamIntro->paragraph2)
        <p style="color:#555; font-size:15px; line-height:1.7;">
          {!! $teamIntro->paragraph2 !!}
        </p>
        @endif

        @if($teamIntro->button_text && $teamIntro->button_link)
        <a href="{{ $teamIntro->button_link }}" style="
          display:inline-block;
          margin-top:30px;
          padding:12px 30px;
          border:2px solid {{ $teamIntro->button_bg_color }};
          color:{{ $teamIntro->button_text_color }};
          font-weight:600;
          border-radius:6px;
          text-decoration:none;
          font-size:16px;
          transition:0.3s;
        " onmouseover="this.style.background='{{ $teamIntro->button_bg_color }}'; this.style.color='white';"
           onmouseout="this.style.background='transparent'; this.style.color='{{ $teamIntro->button_text_color }}';">
          {{ $teamIntro->button_text }}
        </a>
        @endif
      </div>

      <!-- RIGHT SIDE IMAGE BOX -->
      <div class="intro-right" style="flex:1; min-width:320px;">
        @if($teamIntro->image)
        <div style="
          position:relative;
          width:100%;
          border-radius:12px;
          overflow:hidden;
          box-shadow:0 5px 20px rgba(0,0,0,0.12);
          background:#fff;
        ">
          <img src="{{ asset('storage/' . $teamIntro->image) }}" style="width:100%; display:block;">

          @if($teamIntro->footer_text)
          <div style="
            width:100%;
            padding:15px;
            text-align:center;
            font-size:22px;
            font-weight:700;
            background:linear-gradient(to top, #ffffff, transparent);
            position:absolute;
            bottom:0;
          ">
            {!! $teamIntro->footer_text !!}
          </div>
          @endif
        </div>
        @endif
      </div>

    </div>  
  </div>
</section>
@endif
<!-- TEAM INTRO SECTION END -->

<!-- RESPONSIVE CSS -->
<style>
  @media(max-width: 900px){
    .intro-grid {
      flex-direction: column;
      text-align: center;
    }

    .intro-left a {
      margin-left: auto;
      margin-right: auto;
    }
  }
</style>

<!-- IMPACT SECTION START -->
<!-- STATS SECTION START -->
<section class="stats-section">
  <div class="container">

    <div class="stats-grid">

    @foreach($stats as $item)
     <div class="stats-item">
                    
                    @if($item->icon_url)
                        <img src="{{ $item->icon_url }}" class="stats-icon" />
                    @endif

                    <h3 class="stats-number">{{ $item->value }}</h3>
                    <p class="stats-text">{{ $item->title }}</p>
                </div>
            @endforeach
      <!-- ITEM 1 -->
      <!-- <div class="stats-item">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" class="stats-icon" />
        <h3 class="stats-number">525</h3>
        <p class="stats-text">Completed Projects</p>
      </div> -->

      <!-- ITEM 2 -->
      <!-- <div class="stats-item">
        <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" class="stats-icon" />
        <h3 class="stats-number">482</h3>
        <p class="stats-text">Happy Clients</p>
      </div> -->

      <!-- ITEM 3 -->
      <!-- <div class="stats-item">
        <img src="https://cdn-icons-png.flaticon.com/512/1250/1250785.png" class="stats-icon" />
        <h3 class="stats-number">1106</h3>
        <p class="stats-text">Questions Answered</p>
      </div> -->

      <!-- ITEM 4 -->
      <!-- <div class="stats-item">
        <img src="https://cdn-icons-png.flaticon.com/512/1829/1829775.png" class="stats-icon" />
        <h3 class="stats-number">525</h3>
        <p class="stats-text">Satisfied</p>
      </div> -->

    </div>

  </div>
</section>

<!-- STATS SECTION END -->

<!-- IMPACT SECTION END -->


<!-- IMPACT CSS -->
 
<style>
/* STATS SECTION */
.stats-section {
  background: #0a3fa6; /* Strong Blue */
  padding: 60px 20px;
}

.stats-grid {
  max-width: 1200px;
  margin: auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 25px;
  flex-wrap: wrap;
}

.stats-item {
  text-align: center;
  color: #ffffff;
  flex: 1;
  min-width: 220px;
}

.stats-icon {
  width: 55px;
  height: 55px;
  margin-bottom: 10px;
  filter: brightness(0) invert(1); /* Make icon white */
}

.stats-number {
  font-size: 42px;
  font-weight: 700;
  margin-bottom: 5px;
}

.stats-text {
  font-size: 16px;
  font-weight: 500;
  opacity: 0.9;
}

/* RESPONSIVE */
@media (max-width: 900px){
  .stats-grid {
    flex-direction: column;
    gap: 35px;
  }
  
  .stats-number {
    font-size: 36px;
  }
}
</style>


<!-- IMAGE SERVICE SECTION START -->
<section style="padding:80px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto; text-align:center;">

    <!-- HEADING -->
    <!-- <h2 style="font-size:36px; font-weight:700; color:#003366; margin-bottom:10px; animation:fadeUp 0.3s;">
      Our <span style="color:#f39c12;">Solar</span> Services
    </h2>
    <p style="color:#555; margin-bottom:50px; font-size:15px; animation:fadeUp 0.5s;">
      We provide innovative, smart and future-ready solar solutions for every need.
    </p> -->


    <h2 style="font-size:36px; font-weight:700; color:#003366; margin-bottom:10px; animation:fadeUp 0.3s;">
    {{ $homeSolarHeading->heading ?? '' }}
    <span style="color:#f39c12;">
        {{ $homeSolarHeading->highlight_text ?? '' }}
    </span>

    @if(!empty($homeSolarHeading->extra_heading))
        {{ $homeSolarHeading->extra_heading }}
    @endif
</h2>

<p style="color:#555; margin-bottom:50px; font-size:15px; animation:fadeUp 0.5s;">
    {{ $homeSolarHeading->subheading ?? '' }}
</p>



    <!-- GRID -->
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:35px;">


          @foreach($services as $index => $service)
        <div class="img-service-card" style="--d:{{ 0.2 + ($index * 0.2) }}s;">
          
          <div class="img-box">
            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
          </div>

          <h3>{{ $service->title }}</h3>

          <p>{{ $service->description ?? 'High quality solar service.' }}</p>

          @if($service->cta_url)
              <a href="{{ $service->cta_url }}">
                {{ $service->cta_label ?? 'Learn More →' }}
              </a>
          @else
              <a href="#">
                {{ $service->cta_label ?? 'Learn More →' }}
              </a>
          @endif

        </div>
      @endforeach


      <!-- CARD 1 -->
      <!-- <div class="img-service-card" style="--d:0.2s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Residential Solar</h3>
        <p>High-efficiency solar systems for homes ensuring max savings.</p>
        <a href="#">Learn More →</a>
      </div> -->

      <!-- CARD 2 -->
      <!-- <div class="img-service-card" style="--d:0.4s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Commercial Solar</h3>
        <p>Solar solutions for offices, shops & institutions with fast ROI.</p>
        <a href="#">Learn More →</a>
      </div> -->

      <!-- CARD 3 -->
      <!-- <div class="img-service-card" style="--d:0.6s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Industrial Solar</h3>
        <p>Heavy-duty solar plants designed for industries & factories.</p>
        <a href="#">Learn More →</a>
      </div> -->

      <!-- CARD 4 -->
      <!-- <div class="img-service-card" style="--d:0.8s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Off Grid Solar Systems</h3>
        <p>Complete solar AMC, cleaning, tracking & performance monitoring.</p>
        <a href="#">Learn More →</a>
      </div> -->

      <!-- CARD 5 -->
      <!-- <div class="img-service-card" style="--d:0.8s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Hybrid Solar Systems</h3>
        <p>Complete solar AMC, cleaning, tracking & performance monitoring.</p>
        <a href="#">Learn More →</a>
      </div> -->

      <!-- CARD 6 -->
      <!-- <div class="img-service-card" style="--d:0.8s;">
        <div class="img-box">
          <img src="/image/Residential-Rooftop.png">
        </div>
        <h3>Solar Water Heaters</h3>
        <p>Complete solar AMC, cleaning, tracking & performance monitoring.</p>
        <a href="#">Learn More →</a>
      </div> -->

    </div>
  </div>
</section>

<!-- CSS -->
<style>
  /* CARD DESIGN */
  .img-service-card{
    width:25%;
    min-width:250px;
    background:#ffffff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,0.1);
    transition:.4s;
    animation:fadeUp 0.8s forwards;
    opacity:0;
    animation-delay:var(--d);
    text-align:center;
    padding-bottom:30px;
  }

  /* Hover animation */
  .img-service-card:hover{
    transform:translateY(-12px);
    box-shadow:0 15px 35px rgba(0,0,0,0.18);
  }

  /* IMAGE BOX */
  .img-box{
    width:100%;
    height:180px;
    overflow:hidden;
  }

  .img-box img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:0.5s;
  }

  .img-service-card:hover .img-box img{
    transform:scale(1.15);
  }

  /* TEXT */
  .img-service-card h3{
    font-size:20px;
    color:#003366;
    font-weight:700;
    margin:20px 0 10px 0;
  }

  .img-service-card p{
    font-size:14px;
    color:#555;
    margin:0 auto;
    width:85%;
    line-height:1.6;
    margin-bottom:20px;
  }

  /* LINK */
  .img-service-card a{
    color:#003f8c;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
  }
  .img-service-card a:hover{
    color:#f39c12;
  }

  /* ANIMATION */
  @keyframes fadeUp{
    from{ opacity:0; transform:translateY(40px); }
    to{ opacity:1; transform:translateY(0); }
  }

  /* RESPONSIVE */
  @media(max-width:900px){
    .img-service-card{ width:90%; }
  }
</style>


  <!-- ========== 4 STEP PROCESS ========== -->
  <!-- <section class="process-wrap">
    <div class="section">
      <div class="container">
        <h2 class="section-title">Our Simple 4-Step Process</h2>
        <p class="section-sub">We handle everything from start to finish.</p>

        <div class="steps">
          <div class="step">
            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048949.png" alt="Survey icon">
            <h3>1. Site Survey</h3>
            <p>We visit your location and check rooftop space & power usage.</p>
          </div>

          <div class="step">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077976.png" alt="Design icon">
            <h3>2. System Design</h3>
            <p>We design the best solar system as per your requirement.</p>
          </div>

          <div class="step">
            <img src="https://cdn-icons-png.flaticon.com/512/3069/3069172.png" alt="Installation icon">
            <h3>3. Installation</h3>
            <p>Our expert team installs the system safely and neatly.</p>
          </div>

          <div class="step">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828593.png" alt="Activation icon">
            <h3>4. Activation</h3>
            <p>We commission the system and you start generating solar power.</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- PRICING SECTION START -->
<section style="padding:90px 20px; background:#ffffff;">
  <div style="max-width:1200px; margin:auto; text-align:center;">

    <h2 style="font-size:36px; font-weight:700; color:#003366;">
      {{ $homePricingHeading->heading ?? '' }}
    </h2>
    <p style="color:#555; margin-bottom:60px;">
      {{$homePricingHeading-> subheading ?? ''}}
    </p>

    <div class="pricing-grid">

     @foreach ($pricingPackages as $index => $package)
              <div class="price-card {{ $package->is_featured ? 'highlight' : '' }}"
                   style="--delay:{{ ($index + 1) * 0.2 }}s">

                  <h3>{{ $package->plan_name }}</h3>

                  <h1>{{ $package->price_label }}</h1>

                  <ul>
                      @foreach ($package->features as $feature)
                          <li>{{ $feature->description }}</li>
                      @endforeach
                  </ul>

                  <a href="{{ $package->cta_url ?? '#' }}">
                      <button class="buy-btn">{{ $package->cta_label }}</button>
                  </a>
              </div>
          @endforeach

      <!-- <div class="price-card" style="--delay:0.3s">
        <h3>1 kW Solar</h3>
        <h1>₹55,000</h1>
        <ul>
          <li>3 units/day</li>
          <li>25-year panel warranty</li>
          <li>Govt. subsidy eligible</li>
          <li>Free Installation</li>
        </ul>
        <button class="buy-btn">Get Quote</button>
      </div> -->
<!-- 
      <div class="price-card highlight" style="--delay:0.5s">
        <h3>2 kW Solar</h3>
        <h1>₹95,000</h1>
        <ul>
          <li>6 units/day</li>
          <li>Premium Inverter</li>
          <li>Net Metering Support</li>
          <li>FREE AMC 1 Year</li>
        </ul>
        <button class="buy-btn">Get Quote</button>
      </div> -->

      <!-- <div class="price-card" style="--delay:0.7s">
        <h3>3 kW Solar</h3>
        <h1>₹1,35,000</h1>
        <ul>
          <li>9 units/day</li>
          <li>Govt subsidy upto ₹1,08,000</li>
          <li>25-year warranty</li>
          <li>Premium Output</li>
        </ul>
        <button class="buy-btn">Get Quote</button>
      </div> -->

    </div>

  </div>
</section>

<style>
.pricing-grid {
  display:flex;
  flex-wrap:wrap;
  gap:30px;
  justify-content:center;
}
.price-card {
  width:280px;
  background:#fff;
  padding:30px;
  border-radius:14px;
  text-align:center;
  box-shadow:0 6px 18px rgba(0,0,0,0.12);
  transition:.4s;
  opacity:0;
  transform:scale(0.8);
  animation:zoomIn 0.7s var(--delay) forwards;
}
.price-card.highlight {
  border:2px solid #f39c12;
  transform:scale(1.05);
}
.price-card:hover {
  transform:translateY(-10px) scale(1.03);
}
.price-card h1 {
  color:#003366;
  margin-bottom:15px;
}
.price-card ul {
  padding:0; margin:0 0 20px 0;
}
.price-card li {
  list-style:none;
  margin-bottom:8px;
  color:#555;
}
.buy-btn {
  padding:10px 25px;
  background:#003f7f;
  color:white;
  border:none;
  border-radius:6px;
  cursor:pointer;
  transition:.3s;
}
.buy-btn:hover {
  background:#f39c12;
}
@keyframes zoomIn {
  to { opacity:1; transform:scale(1); }
}
@media(max-width:900px){
  .price-card{ width:90%; }
}
</style>
<!-- Solar Pricing Packages end -->


  <!-- WHY CHOOSE US START -->
<section style="padding:70px 20px; background:#fff;">
  <div style="max-width:1200px; margin:auto;">

    <h2 style="text-align:center; font-size:32px; font-weight:700; color:#000; margin-bottom:50px;">
      {{$homeWhyHeading-> heading ?? ''}}
    </h2>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:30px;">


     @foreach ($whyChoose as $item)
                <div class="choose-card">
                    <img src="{{ asset('storage/' . $item->icon_url) }}" class="choose-icon">

                    <h3 class="choose-title">{{ $item->title }}</h3>

                    <div class="choose-divider">
                        <span></span><div class="dot"></div><span></span>
                    </div>

                    <p class="choose-text">
                        {{ $item->description ?? '' }}
                    </p>
                </div>
            @endforeach



      <!-- CARD 1 -->
      <!-- <div class="choose-card">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="choose-icon">

        <h3 class="choose-title">Trusted by Government & Clients</h3>

        <div class="choose-divider">
          <span></span><div class="dot"></div><span></span>
        </div>

        <p class="choose-text">
          We’ve successfully completed projects for government buildings, schools, industries, 
          and thousands of homes across Madhya Pradesh.
        </p>
      </div> -->

      <!-- CARD 2 -->
      <!-- <div class="choose-card">
        <img src="https://cdn-icons-png.flaticon.com/512/4228/4228975.png" class="choose-icon">

        <h3 class="choose-title">Sustainable & Cost-Effective</h3>

        <div class="choose-divider">
          <span></span><div class="dot"></div><span></span>
        </div>

        <p class="choose-text">
          Our solutions help you reduce electricity bills, achieve energy independence, 
          and contribute to a greener, cleaner future.
        </p>
      </div> -->

      <!-- CARD 3 -->
      <!-- <div class="choose-card">
        <img src="https://cdn-icons-png.flaticon.com/512/9491/9491082.png" class="choose-icon">

        <h3 class="choose-title">Proven Experience in the Solar Sector</h3>

        <div class="choose-divider">
          <span></span><div class="dot"></div><span></span>
        </div>

        <p class="choose-text">
          With years of hands-on expertise, we deliver reliable and customized 
          solar power solutions with precision.
        </p>
      </div> -->

      <!-- CARD 4 -->
      <!-- <div class="choose-card">
        <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" class="choose-icon">

        <h3 class="choose-title">Expert Team Technicians</h3>

        <div class="choose-divider">
          <span></span><div class="dot"></div><span></span>
        </div>

        <p class="choose-text">
          Our certified engineers & technicians ensure quality workmanship and timely project delivery.
        </p>
      </div> -->

    </div>

  </div>
</section>
<!-- WHY CHOOSE US END -->

<!-- CSS -->
<style>
  .choose-card{
    background:#fff;
    width: 23%;
    min-width: 260px;
    padding: 25px 20px;
    border-radius:12px;
    box-shadow:0 4px 18px rgba(0,0,0,0.12);
    transition:.3s;
    text-align:center;
  }

  .choose-card:hover{
    transform: translateY(-10px);
    box-shadow:0 10px 28px rgba(0,0,0,0.18);
  }

  .choose-icon{
    width: 65px;
    margin-bottom: 15px;
    filter: hue-rotate(10deg) saturate(2); /* yellowish tone */
  }

  .choose-title{
    font-size:18px;
    font-weight:600;
    color:#000;
    margin-bottom:15px;
  }

  .choose-text{
    font-size:14px;
    color:#555;
    line-height:1.6;
  }

  /* Divider line */
  .choose-divider{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    margin-bottom:15px;
    margin-top:10px;
  }

  .choose-divider span{
    width:40px;
    height:2px;
    background:#f7c843;
  }

  .choose-divider .dot{
    width:10px;
    height:10px;
    background:#000;
    border-radius:50%;
  }

  @media(max-width:900px){
    .choose-card{
      width:90%;
    }
  }
</style>

<!-- =========== CTA SECTION =========== -->



@if($cta)
<section style="
  padding:80px 20px;
  background:#003366;
  color:white;
  text-align:center;">

  <!-- Headline -->
  <h2 style="font-size:34px; font-weight:700; margin-bottom:10px;">
    {{ $cta->headline ?? 'Switch to Clean Energy Today' }}
  </h2>

  <!-- Subtext -->
  <p style="font-size:16px; margin-bottom:20px; opacity:0.9;">
    {{ $cta->subtext ?? 'Let’s build a greener future together.' }}
  </p>

  <!-- Button -->
 <a href="{{ $cta->button_url 
            ? (filter_var($cta->button_url, FILTER_VALIDATE_URL) 
                ? $cta->button_url 
                : route($cta->button_url)) 
            : '#' }}" 
   style="
    padding:12px 28px;
    background:#ffb400;
    color:#003366;
    font-weight:700;
    border-radius:6px;
    text-decoration:none;">
    {{ $cta->button_text ?? 'Contact Us' }}
</a>

</section>
@endif

<!-- <section style="
  padding:80px 20px;
  background:#003366;
  color:white;
  text-align:center;">
  
  <h2 style="font-size:34px; font-weight:700; margin-bottom:10px;">Switch to Clean Energy Today</h2>
  <p style="font-size:16px; margin-bottom:20px; opacity:0.9;">Let’s build a greener future together.</p>

  <a href="contact.html" style="
    padding:12px 28px;
    background:#ffb400;
    color:#003366;
    font-weight:700;
    border-radius:6px;
    text-decoration:none;">
    Contact Us
  </a>
</section> -->


  <!-- ========== RECENT PROJECTS SECTION ========== -->
<!-- <section class="projects-section" style="background:#f5f5f5; padding:60px 20px;">
  <div class="container">

    <h2 class="section-title" style="text-align:center; font-size:30px; margin-bottom:10px;">
      Recent Projects
    </h2>

    <p class="section-sub" style="text-align:center; color:#777; margin-bottom:35px;">
      Here are some of our latest solar installations across different cities.
    </p>

    <div class="project-grid" 
         style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;"> -->

      <!-- CARD 1 -->
      <!-- <div class="project-card"
        style="width:30%; min-width:260px; background:#fff; border-radius:10px; 
               box-shadow:0 4px 10px rgba(0,0,0,0.08); overflow:hidden; transition:.3s;">
        
        <img src="/image/Residential-Rooftop.png"
             style="width:100%; height:180px; object-fit:cover;" />

        <div style="padding:15px;">
          <h3 style="font-size:18px; margin-bottom:5px;">8kW Solar Plant</h3>
          <p style="font-size:14px; color:#555;">Khandwa • Residential Rooftop</p>
        </div>
      </div> -->

      <!-- CARD 2 -->
      <!-- <div class="project-card"
        style="width:30%; min-width:260px; background:#fff; border-radius:10px; 
               box-shadow:0 4px 10px rgba(0,0,0,0.08); overflow:hidden; transition:.3s;">
        
        <img src="/image/Residential-Rooftop.png"
             style="width:100%; height:180px; object-fit:cover;" />

        <div style="padding:15px;">
          <h3 style="font-size:18px; margin-bottom:5px;">5kW Solar Plant</h3>
          <p style="font-size:14px; color:#555;">Ujjain • Commercial Building</p>
        </div>
      </div> -->

      <!-- CARD 3 -->
      <!-- <div class="project-card"
        style="width:30%; min-width:260px; background:#fff; border-radius:10px; 
               box-shadow:0 4px 10px rgba(0,0,0,0.08); overflow:hidden; transition:.3s;">
        
        <img src="/image/Residential-Rooftop.png"
             style="width:100%; height:180px; object-fit:cover;" />

        <div style="padding:15px;">
          <h3 style="font-size:18px; margin-bottom:5px;">15kW Solar Plant</h3>
          <p style="font-size:14px; color:#555;">Dewas • Factory Installation</p>
        </div>
      </div>

    </div>
  </div>
</section> -->


<section class="projects-section" style="background:#f5f5f5; padding:60px 20px;">
  <div class="container">

    <h2 class="section-title" style="text-align:center; font-size:30px; margin-bottom:10px;">
      {{$homeProjectsHeading-> heading ?? ''}}
    </h2>

    <p class="section-sub" style="text-align:center; color:#777; margin-bottom:35px;">
      {{$homeProjectsHeading-> subheading ?? ''}}
    </p>

    <div class="project-grid" 
         style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">

      @foreach($projects as $project)
        <div class="project-card"
             style="width:30%; min-width:260px; background:#fff; border-radius:10px; 
                    box-shadow:0 4px 10px rgba(0,0,0,0.08); overflow:hidden; transition:.3s;">
            
            <img src="{{ asset('storage/' . $project->image) }}" 
                 style="width:100%; height:180px; object-fit:cover;" />

            <div style="padding:15px;">
                <h3 style="font-size:18px; margin-bottom:5px;">{{ $project->title }}</h3>
                <p style="font-size:14px; color:#555;">
                    {{ $project->location }} • {{ $project->category }}
                </p>
            </div>
        </div>
      @endforeach

    </div>
  </div>
</section>


<!-- RESPONSIVE FIX -->
<style>
  @media(max-width:900px){
    .project-card{
      width:90% !important;
    }
  }
</style>

<!-- SUBSIDY SECTION START -->
<section style="padding:70px 20px; background:#f2f9ff;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:40px; align-items:center;">

    <div style="flex:1; min-width:300px;">
      <h2 style="font-size:34px; font-weight:700; color:#003366;">
        {{ $homePMSubsidyHeading->heading ?? '' }} <br>
        <span style="color:#f39c12;">{{ $homePMSubsidyHeading->highlight_text ?? '' }}</span>
      </h2>

      <p style="margin:15px 0; font-size:15px; color:#555; line-height:1.6;">
        {{ $homePMSubsidyHeading->subheading ?? '' }}
      </p>

      <!-- <ul style="font-size:15px; color:#003f7f; line-height:1.8; margin-top:15px;">
        <li>✔ 1kW – ₹30,000 subsidy</li>
        <li>✔ 2kW – ₹60,000 subsidy</li>
        <li>✔ 3kW – ₹78,000 + state subsidy</li>
        <li>✔ Total subsidy up to ₹1,08,000*</li>
      </ul> -->
      <!-- DYNAMIC BULLET LIST -->
      <ul style="font-size:15px; color:#003f7f; line-height:1.8; margin-top:15px;">
        @forelse ($pmBullets as $bullet)
          <li>✔ {{ $bullet->text }}</li>
        @empty
          <li>No bullet points available.</li>
        @endforelse
      </ul>




    </div>

    <div style="flex:1; min-width:300px;">
      <div style="background:#fff; padding:25px; border-radius:12px; box-shadow:0 5px 20px rgba(0,0,0,0.12);">
        <h3 style="text-align:center; margin-bottom:15px; color:#003366;">Subsidy Table</h3>
        <table style="width:100%; border-collapse:collapse;">
          <tr style="background:#003f7f; color:#fff;">
            <th style="padding:10px;">Capacity</th>
            <th style="padding:10px;">Subsidy</th>
          </tr>


          <!-- <tr><td style="padding:10px;">1 kW</td><td style="padding:10px;">₹30,000</td></tr>
          <tr style="background:#f7fbff;"><td style="padding:10px;">2 kW</td><td style="padding:10px;">₹60,000</td></tr>
          <tr><td style="padding:10px;">3 kW</td><td style="padding:10px;">₹78,000 + State Subsidy</td></tr> -->

           @foreach($pmSubsidies as $index => $sub)
                <tr style="{{ $index % 2 == 1 ? 'background:#f7fbff;' : '' }}">
                    <td style="padding:10px;">{{ $sub->capacity }}</td>
                    <td style="padding:10px;">
                        {{ $sub->amount }}

                        @if($sub->note)
                            + {{ $sub->note }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
      </div>
    </div>

  </div>
</section>
<!-- SUBSIDY SECTION END -->

<!-- FAQ START -->
<section style="padding:80px 20px; background:#ffffff;">
  <div style="max-width:900px; margin:auto;">
    
    <h2 style="font-size:34px; font-weight:700; color:#003366; text-align:center; margin-bottom:40px;">
      {{ $homeFaqHeading->heading ?? '' }}
    </h2>

     @foreach($faqs as $faq)
            <details style="margin-bottom:15px; padding:15px; border:1px solid #ddd; border-radius:10px;">
                <summary style="font-size:18px; font-weight:600; cursor:pointer;">
                    {{ $faq->question }}
                </summary>

                <p style="margin-top:10px; color:#555;">
                    {!! $faq->answer !!}
                </p>
            </details>
        @endforeach

    <!-- <details style="margin-bottom:15px; padding:15px; border:1px solid #ddd; border-radius:10px;">
      <summary style="font-size:18px; font-weight:600; cursor:pointer;">What is the lifespan of solar panels?</summary>
      <p style="margin-top:10px; color:#555;">Solar panels last 25+ years with minimal maintenance.</p>
    </details>

    <details style="margin-bottom:15px; padding:15px; border:1px solid #ddd; border-radius:10px;">
      <summary style="font-size:18px; font-weight:600; cursor:pointer;">How much can I save monthly?</summary>
      <p style="margin-top:10px; color:#555;">You can save 60–90% on electricity bills depending on usage.</p>
    </details>

    <details style="margin-bottom:15px; padding:15px; border:1px solid #ddd; border-radius:10px;">
      <summary style="font-size:18px; font-weight:600; cursor:pointer;">Is government subsidy available?</summary>
      <p style="margin-top:10px; color:#555;">Yes, subsidy up to ₹1,08,000 is available under PM Surya Ghar Yojana.</p>
    </details> -->

  </div>
</section>
<!-- FAQ END -->






  <!-- CONTACT SECTION START -->
<section style="padding:80px 20px; background:#004c8b;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:40px; align-items:center;">

    <!-- LEFT CONTENT -->
    <div style="flex:1; min-width:300px; color:white; animation:fadeUp 0.5s;">

    <h2 style="font-size:38px; font-weight:700; line-height:1.3;">
        {!! $homeSolarInfo?->title ?? 'Default Title' !!}
    </h2>

    <div style="margin-top:15px; font-size:15px; opacity:0.9;">
        {!! $homeSolarInfo?->description ?? 'Default description text...' !!}
    </div>

    <div style="
        display:flex; 
        align-items:center; 
        gap:15px; 
        background:white; 
        padding:18px 25px; 
        margin-top:35px; 
        width:fit-content; 
        border-radius:10px; 
        box-shadow:0 6px 20px rgba(0,0,0,0.25);">

        <div style="
          width:48px; height:48px; 
          background:#004c8b; 
          border-radius:50%; 
          display:flex; align-items:center; justify-content:center;">
          
          @if($homeSolarInfo?->icon_url)
              <img src="{{ asset('storage/' . $homeSolarInfo->icon_url) }}" width="24">
          @else
              <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" width="24">
          @endif

        </div>

        <span style="color:#004c8b; font-size:18px; font-weight:600;">
          {{ $homeSolarInfo?->call_heading ?? 'Call Us:' }}  
          {{ $homeSolarInfo?->call_number ?? '+91 00000 00000' }}
        </span>
    </div>
</div>


    <!-- RIGHT FORM CARD -->
    <div style="
      flex:1; min-width:330px; 
      background:white; 
      padding:30px 30px 40px; 
      border-radius:14px; 
      box-shadow:0 12px 30px rgba(0,0,0,0.25);
      animation:fadeUp 0.9s;">

      <!-- SUCCESS POPUP -->
      <div id="success-popup"
        style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);
        background:white; padding:30px; border-radius:15px; width:90%; max-width:380px;
        text-align:center; z-index:9999; box-shadow:0 10px 30px rgba(0,0,0,0.3);">

        <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" width="60">
        <h3 style="color:green; margin-top:10px;">Submission Successful!</h3>
        <p>Thank you for your submission.<br>Our team will contact you shortly.</p>

        <button onclick="hidePopup()" 
          style="margin-top:15px; padding:10px 20px; background:green; color:white;
          border:none; border-radius:6px; cursor:pointer;">
          Back to Home
        </button>
      </div>

      <!-- CONTACT FORM -->
      <form id="contactForm">

        <input type="hidden" name="access_key" value="3b8ccead-d37b-42b0-a9e4-4674854d5644">

        <!-- ROW 1 -->
        <div style="display:flex; gap:15px; margin-bottom:15px;">
          <div style="flex:1;">
            <label>Full Name *</label>
            <input name="name" type="text" required 
              style="width:100%; padding:12px; border-radius:6px; border:1px solid #ccc;">
          </div>

          <div style="flex:1;">
            <label>Phone *</label>
            <input name="contact" type="text" id="contact" required
              style="width:100%; padding:12px; border-radius:6px; border:1px solid #ccc;">
          </div>
        </div>

        <!-- ROW 2 -->
        <div style="margin-bottom:15px;">
          <label>Pincode *</label>
          <input name="subject" required
            style="width:100%; padding:12px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <!-- ROW 3 -->
        <div style="margin-bottom:15px;">
          <label>Message</label>
          <textarea name="message" rows="4" 
            style="width:100%; padding:12px; border-radius:6px; border:1px solid #ccc;"></textarea>
        </div>

        <!-- SUBMIT -->
        <button type="submit"
          style="width:100%; padding:12px; background:#ff7a00; color:white;
          font-size:17px; border:none; border-radius:6px; cursor:pointer;">
          Submit
        </button>
      </form>
    </div>

  </div>
</section>

<!-- ANIMATION -->
<style>
@keyframes fadeUp { 
  from {opacity:0; transform:translateY(40px);} 
  to   {opacity:1; transform:translateY(0);} 
}
</style>


<!-- JS: FORM SUBMIT + POPUP -->
<script>
const contactInput = document.getElementById("contact");

// Validate 10-digit number
contactInput.addEventListener("input", function () {
  this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
});

// Submit Form
document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();

  if (contactInput.value.length !== 10) {
    alert("Please enter a valid 10-digit phone number.");
    return;
  }

  const formData = new FormData(this);

  fetch("https://api.web3forms.com/submit", {
    method: "POST",
    body: formData
  })
    .then(res => {
      if (res.ok) {
        document.getElementById("success-popup").style.display = "block";
        document.getElementById("contactForm").reset();
      } else {
        alert("Something went wrong.");
      }
    })
    .catch(() => alert("Network error"));
});

// Hide popup
function hidePopup() {
  document.getElementById("success-popup").style.display = "none";
}
</script>




@endsection