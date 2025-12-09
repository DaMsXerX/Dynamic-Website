<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    /* RESET */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: #ffffff;
      color: #333333;
    }

    /* COMMON CONTAINER */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* ---------------- HEADER ---------------- */
    .navbar {
      background: #ffffff;
      width: 100%;
      border-bottom: 1px solid #dddddd;
      position: sticky;
      z-index: 100;
    }

    .nav-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 0;
    }

    .logo-img {
      width: 170px;
      height: auto;
      display: block;
    }

    .nav-links {
      display: flex;
      gap: 25px;
      align-items: center;
    }

    .nav-links a {
      text-decoration: none;
      color: #333333;
      font-weight: 600;
      font-size: 14px;
      position: relative;
    }

    .nav-links a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0;
      height: 2px;
      background: #f39c12;
      transition: width 0.3s;
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    /* Mobile Toggle */
    .nav-toggle {
      width: 28px;
      height: 22px;
      display: none;
      flex-direction: column;
      justify-content: space-between;
      cursor: pointer;
    }

    .nav-toggle span {
      height: 3px;
      width: 100%;
      background: #333333;
      border-radius: 4px;
    }

    /* ---------------- HERO SECTION ---------------- */
    .hero {
      padding: 70px 20px;
      background: linear-gradient(to right, #ffffff, #fff4da);
    }

    .hero-inner {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      gap: 40px;
    }

    .hero-left {
      max-width: 520px;
    }

    .hero-left h1 {
      font-size: 38px;
      line-height: 1.2;
      margin-bottom: 15px;
    }

    .hero-left h1 span {
      color: #f39c12;
    }

    .hero-left p {
      color: #555555;
      margin-bottom: 20px;
      font-size: 15px;
    }

    .btn-primary {
      background: #f39c12;
      color: #ffffff;
      border: none;
      border-radius: 6px;
      padding: 12px 24px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
      transition: background 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
      background: #d98300;
      transform: translateY(-2px);
    }

    .hero-right img {
      width: 420px;
      max-width: 100%;
      border-radius: 12px;
      display: block;
    }

    /* ---------------- SECTION COMMON ---------------- */
    .section {
      padding: 60px 20px;
    }

    .section-title {
      text-align: center;
      font-size: 30px;
      margin-bottom: 10px;
    }

    .section-sub {
      text-align: center;
      color: #777777;
      margin-bottom: 35px;
      font-size: 14px;
    }

    /* ---------------- WHY SOLAR ---------------- */
    .benefits {
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
      justify-content: center;
    }

    .benefit-card {
      background: #ffffff;
      width: 30%;
      min-width: 260px;
      padding: 22px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      text-align: center;
      transition: transform 0.3s;
    }

    .benefit-card img {
      width: 55px;
      margin-bottom: 10px;
    }

    .benefit-card h3 {
      font-size: 18px;
      margin-bottom: 8px;
    }

    .benefit-card p {
      font-size: 14px;
      color: #555555;
    }

    .benefit-card:hover {
      transform: translateY(-6px);
    }

    /* ---------------- PROCESS (4 STEPS) ---------------- */
    .process-wrap {
      background: #f5f5f5;
    }

    .steps {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .step {
      background: #ffffff;
      width: 23%;
      min-width: 230px;
      padding: 22px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      transition: transform 0.3s;
    }

    .step img {
      width: 55px;
      margin-bottom: 10px;
    }

    .step h3 {
      font-size: 17px;
      margin-bottom: 8px;
    }

    .step p {
      font-size: 14px;
      color: #555555;
    }

    .step:hover {
      transform: translateY(-6px);
    }

    /* ---------------- SERVICES PREVIEW ---------------- */
    .services-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .service-item {
      background: #ffffff;
      width: 30%;
      min-width: 260px;
      border-radius: 10px;
      padding: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .service-item img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    .service-item h3 {
      font-size: 18px;
      margin-bottom: 6px;
    }

    .service-item p {
      font-size: 14px;
      color: #555555;
    }

    /* ---------------- FINAL CTA ---------------- */
    .final-cta {
      text-align: center;
      padding: 60px 20px;
      background: #fff9e7;
    }

    .final-cta h2 {
      font-size: 26px;
      margin-bottom: 10px;
    }

    .final-cta p {
      font-size: 14px;
      color: #555555;
      margin-bottom: 20px;
    }

    .final-cta button {
      background: #0d6efd;
      color: #ffffff;
      border: none;
      padding: 12px 26px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
      transition: background 0.3s, transform 0.2s;
    }

    .final-cta button:hover {
      background: #084dcf;
      transform: translateY(-2px);
    }

    /* ---------------- RESPONSIVE ---------------- */
    @media (max-width: 900px) {
      .hero-inner {
        flex-direction: column;
        text-align: center;
      }

      .hero-right img {
        width: 320px;
      }

      .benefit-card,
      .step,
      .service-item {
        width: 90%;
      }
    }

    @media (max-width: 768px) {
      .nav-links {
        position: absolute;
        top: 60px;
        right: 0;
        width: 220px;
        background: #ffffff;
        flex-direction: column;
        padding: 15px;
        gap: 15px;
        border-left: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
        display: none;
      }

      .nav-links.show {
        display: flex;
      }

      .nav-toggle {
        display: flex;
      }
    }
  </style>
</head>



@php
    $settings = \App\Models\Setting::first();
    $menus = \App\Models\Menu::where('is_active', true)
                ->orderBy('order')
                ->get();
@endphp

<body>

  <!-- ========== HEADER ========== -->
  <header class="navbar">
    <div class="container nav-inner">
      <a href="{{ route('home') }}">
        <!-- Google se simple solar logo (direct link) -->
        <img src="{{ Storage::url($settings->logo_path) }}"
             alt="{{ $settings->site_name ?? 'Logo' }}" class="logo-img">
      </a>

      <nav class="nav-links" id="navMenu">

            <!-- <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'active' : '' }}">
                About Us
            </a>

            <a href="{{ route('services') }}"
                class="{{ request()->routeIs('services') ? 'active' : '' }}">
                Services
            </a>

            <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                Contact
            </a> -->

             @foreach($menus as $menu)
                <a href="{{ url($menu->url) }}"
                   class="{{ request()->url() === url($menu->url) ? 'active' : '' }}">
                   {{ $menu->label }}
                </a>
            @endforeach

        </nav>

      <div class="nav-toggle" id="navToggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </header>

  <!-- MOBILE MENU JS -->
  <script>
    const navToggle = document.getElementById("navToggle");
    const navMenu = document.getElementById("navMenu");

    navToggle.addEventListener("click", function () {
      navMenu.classList.toggle("show");
    });
  </script>



