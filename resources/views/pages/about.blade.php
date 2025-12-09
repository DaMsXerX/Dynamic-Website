
@extends('layouts.main')

@section('title', 'About')

@section('content')
<!-- =========== ABOUT HERO SECTION =========== -->

<section style="
  background:url('/image/Residential-Rooftop.png');
  background-size:cover;
  background-position:center;
  padding:;">
  
  <div style="max-width:px; margin:auto; text-align:center; background:rgba(0,0,0,0.55);
      padding:60px 30px; border-radius:; color:white;">

    <h1 style="font-size:48px; font-weight:800;">{{$aboutHeading-> heading ?? ''}}</h1>
    <p style="margin-top:15px; font-size:18px; line-height:1.7;">
      {{$aboutHeading ->subheading ?? ''}}
    </p>
  </div>
</section>

<!-- <section style="
  background:url('https://static.vecteezy.com/system/resources/thumbnails/040/995/143/small/ai-generated-fields-of-solar-panels-and-systems-to-produce-green-electricity-ai-generated-photo.jpg'); 
  background-size:cover;
  background-position:center;
  padding:12px 20px;
  position:relative;
  color:white;">
  
  <div style="background:rgba(0,0,0,0.55); padding:80px 20px; text-align:center; border-radius:12px;">
    <h1 style="font-size:52px; font-weight:800; animation:fadeUp 1s;">About Us</h1>
    <p style="max-width:700px; margin:auto; margin-top:15px; font-size:18px; line-height:1.6;">
      
    </p>
  </div>
</section> -->


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

        <!-- @if($teamIntro->button_text && $teamIntro->button_link)
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
        @endif -->
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


<!-- =========== MISSION & VISION SECTION =========== -->
<!-- <section style="padding:80px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto;">

    <h2 style="font-size:36px; font-weight:700; text-align:center; color:#003366;">Our Mission & Vision</h2>

    <div style="display:flex; flex-wrap:wrap; gap:40px; margin-top:50px;">

      <div class="mv-card" style="flex:1; min-width:280px;">
        <h3>Our Mission</h3>
        <p>
          To accelerate India’s transition to clean energy by delivering affordable,
          innovative, and energy-efficient solar solutions to every home and business.
        </p>
      </div>

      <div class="mv-card" style="flex:1; min-width:280px;">
        <h3>Our Vision</h3>
        <p>
          To be a global leader in renewable energy, driving a sustainable future through
          advanced solar technologies, customer trust, and environmental responsibility.
        </p>
      </div>

    </div>

  </div>
</section> -->

@if($missionVision)
<section style="padding:80px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto;">

    <h2 style="font-size:36px; font-weight:700; text-align:center; color:#003366;">
      {{$aboutMission -> heading ?? ''}}
    </h2>

    <div style="display:flex; flex-wrap:wrap; gap:40px; margin-top:50px;">

      <!-- Mission Card -->
      <div class="mv-card" style="flex:1; min-width:280px;">
        <h3>{{ $missionVision->mission_title ?? 'Our Mission' }}</h3>
        <p>{{ $missionVision->mission_description ?? '' }}</p>
      </div>

      <!-- Vision Card -->
      <div class="mv-card" style="flex:1; min-width:280px;">
        <h3>{{ $missionVision->vision_title ?? 'Our Vision' }}</h3>
        <p>{{ $missionVision->vision_description ?? '' }}</p>
      </div>

    </div>

  </div>
</section>
@endif



<!-- =========== WHY CHOOSE US SECTION =========== -->
<section style="padding:80px 20px;">
  <div style="max-width:1200px; margin:auto; text-align:center;">

    <h2 style="font-size:36px; font-weight:700; color:#003366;">{{$aboutWhy -> heading}}</h2>

    <div style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center; margin-top:50px;">

        @foreach($whyChoose as $item)
      <div class="wc-card">
        @if($item->icon_url)
          <img src="{{ asset('storage/' . $item->icon_url) }}" alt="{{ $item->title }}">
        @endif
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->description }}</p>
      </div>
      @endforeach

    </div>
  </div>
</section>


<!-- =========== TEAM SECTION =========== -->
<!-- <section style="padding:80px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto;">

    <h2 style="font-size:36px; font-weight:700; text-align:center; color:#003366;">Meet Our Team</h2>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:35px; margin-top:50px;">

      <div class="team-card">
        <img src="https://img.freepik.com/free-photo/ceo-company_1098-21107.jpg?semt=ais_hybrid&w=740&q=80">
        <h3>Rohan Sharma</h3>
        <p>Founder & CEO</p>
      </div>

      <div class="team-card">
        <img src="https://media.istockphoto.com/id/1663394735/photo/portrait-of-indian-businesswoman-dressed-in-formalwear-with-arms-crossed-standing-confidently.jpg?s=612x612&w=0&k=20&c=AwYj_5C3ON2nVo6QEXI8BsQNAUdAjddD5gL9ZHGH7vk=">
        <h3>Priya Mehta</h3>
        <p>Project Manager</p>
      </div>

      <div class="team-card">
        <img src="https://img.freepik.com/free-photo/smiling-young-male-professional-standing-with-arms-crossed-while-making-eye-contact-against-isolated-background_662251-838.jpg?semt=ais_hybrid&w=740&q=80">
        <h3>Amit Verma</h3>
        <p>Senior Engineer</p>
      </div>

    </div>
  </div>
</section> -->

<section style="padding:80px 20px; background:#f3f8ff;">
  <div style="max-width:1200px; margin:auto;">

    <h2 style="font-size:36px; font-weight:700; text-align:center; color:#003366;">{{$aboutTeam -> heading}}</h2>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:35px; margin-top:50px;">

      @foreach($team as $member)
      <div class="team-card">
        @if($member->photo)
          <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}">
        @else
          <img src="/images/default-team.jpg" alt="{{ $member->name }}">
        @endif
        <h3>{{ $member->name }}</h3>
        <p>{{ $member->role }}</p>
      </div>
      @endforeach

    </div>
  </div>
</section>



<!-- =========== CTA SECTION =========== -->
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
@if($cta)
<section style="
  padding:80px 20px;
  background:#003366;
  color:white;
  text-align:center;">
  
  <h2 style="font-size:34px; font-weight:700; margin-bottom:10px;">
    {{ $cta->headline }}
  </h2>
  <p style="font-size:16px; margin-bottom:20px; opacity:0.9;">
    {{ $cta->subtext }}
  </p>

  @if($cta->button_text)
  <a href="{{ $cta->button_url ?? url('/contact') }}" style="
    padding:12px 28px;
    background:#ffb400;
    color:#003366;
    font-weight:700;
    border-radius:6px;
    text-decoration:none;">
    {{ $cta->button_text }}
  </a>
  @endif

</section>
@endif



<!-- =========== CSS ANIMATION & CARD STYLES =========== -->
<style>
@keyframes fadeUp {
  from {opacity:0; transform:translateY(40px);}
  to {opacity:1; transform:translateY(0);}
}

/* Mission | Vision Cards */
.mv-card {
  background:white;
  padding:30px;
  border-radius:14px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
  animation:fadeUp 0.7s;
}
.mv-card h3 {
  font-size:22px;
  color:#003366;
  margin-bottom:10px;
}
.mv-card p {
  color:#444; line-height:1.7;
}

/* Why Choose Us Cards */
.wc-card {
  width:250px;
  background:white;
  padding:30px;
  border-radius:14px;
  box-shadow:0 10px 25px rgba(0,0,0,0.1);
  transition:.3s;
  animation:fadeUp 0.7s;
}
.wc-card:hover {
  transform:translateY(-10px);
  box-shadow:0 15px 35px rgba(0,0,0,0.2);
}
.wc-card img {
  width:50px;
  margin-bottom:15px;
}
.wc-card h3 {
  font-size:20px;
  font-weight:700;
  color:#003366;
}
.wc-card p {
  color:#555;
}

/* Team Cards */
.team-card {
  width:240px;
  background:white;
  padding:25px;
  text-align:center;
  border-radius:14px;
  box-shadow:0 10px 25px rgba(0,0,0,0.15);
  transition:.3s;
  animation:fadeUp 0.7s;
}
.team-card:hover {
  transform:translateY(-10px);
  box-shadow:0 15px 35px rgba(0,0,0,0.25);
}
.team-card img {
  width:120px;
  height:120px;
  object-fit:cover;
  border-radius:50%;
  margin-bottom:15px;
}
.team-card h3 {
  font-size:20px;
  color:#003366;
  font-weight:700;
}
.team-card p {
  font-size:14px;
  color:#777;
}
</style>







  <!-- CONTACT SECTION START -->
<section style="padding:80px 20px; background:#004c8b;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:40px; align-items:center;">

    <!-- LEFT CONTENT -->
    <div style="flex:1; min-width:300px; color:white; animation:fadeUp 0.5s;">

    <h2 style="font-size:38px; font-weight:700; line-height:1.3;">
        {!! $aboutSolarInfo?->title ?? 'Default Title' !!}
    </h2>

    <div style="margin-top:15px; font-size:15px; opacity:0.9;">
        {!! $aboutSolarInfo?->description ?? 'Default description text...' !!}
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
          
          @if($aboutSolarInfo?->icon_url)
              <img src="{{ asset('storage/' . $aboutSolarInfo->icon_url) }}" width="24">
          @else
              <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" width="24">
          @endif

        </div>

        <span style="color:#004c8b; font-size:18px; font-weight:600;">
          {{ $aboutSolarInfo?->call_heading ?? 'Call Us:' }}  
          {{ $aboutSolarInfo?->call_number ?? '+91 00000 00000' }}
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



