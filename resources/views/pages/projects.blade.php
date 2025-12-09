@extends('layouts.main')

@section('title', 'Projects')

@section('content')

<!-- PROJECTS HERO -->
<section style="
  background:url('https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=1600&q=80');
  background-size:cover;
  background-position:center;
  padding:120px 20px;">
  
  <div style="max-width:900px; margin:auto; text-align:center; background:rgba(0,0,0,0.55);
      padding:60px 30px; border-radius:14px; color:white;">

    <h1 style="font-size:48px; font-weight:800;">Our Solar Projects</h1>
    <p style="margin-top:15px; font-size:18px; line-height:1.7;">
      Explore our successful solar installations across homes, businesses & industries.
    </p>
  </div>
</section>

<section style="padding:60px 20px; text-align:center;">
  <h2 style="font-size:36px; font-weight:700; color:#003366;">Completed Projects</h2>

  <div style="margin-top:25px;">
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn" data-filter="residential">Residential</button>
    <button class="filter-btn" data-filter="commercial">Commercial</button>
    <button class="filter-btn" data-filter="industrial">Industrial</button>
  </div>
</section>


<section style="padding:40px 20px; background:#f9fbff;">
  <div class="project-grid">

    <!-- PROJECT 1 -->
    <div class="project-card residential">
      <img src="https://images.unsplash.com/photo-1598515213692-5dbf42ef1c21?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>3kW Home Rooftop Solar</h3>
        <p>Khandwa, Madhya Pradesh</p>
      </div>
    </div>

    <!-- PROJECT 2 -->
    <div class="project-card commercial">
      <img src="https://images.unsplash.com/photo-1584270354809-5f3aef249e4b?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>20kW Commercial Solar</h3>
        <p>Corporate Office – Khandwa</p>
      </div>
    </div>

    <!-- PROJECT 3 -->
    <div class="project-card industrial">
      <img src="https://images.unsplash.com/photo-1598514982667-77d230e326d6?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>100kW Industrial Plant</h3>
        <p>Pithampur Industrial Area</p>
      </div>
    </div>

    <!-- PROJECT 4 -->
    <div class="project-card residential">
      <img src="https://images.unsplash.com/photo-1626785774614-13c1d25445e7?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>2kW Residential Solar</h3>
        <p>Vijay Nagar, Khandwa</p>
      </div>
    </div>

    <!-- PROJECT 5 -->
    <div class="project-card commercial">
      <img src="https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>50kW School Solar</h3>
        <p>Private School – Khandwa</p>
      </div>
    </div>

    <!-- PROJECT 6 -->
    <div class="project-card industrial">
      <img src="https://images.unsplash.com/photo-1598515213692-5dbf42ef1c21?auto=format&fit=crop&w=900&q=80">
      <div class="project-info">
        <h3>75kW Factory Solar</h3>
        <p>Sanwer Road Industrial</p>
      </div>
    </div>

  </div>
</section>

<style>
/* FILTER BUTTONS */
.filter-btn {
  padding:10px 22px;
  background:white;
  border:1px solid #003366;
  color:#003366;
  border-radius:6px;
  cursor:pointer;
  margin:5px;
  font-weight:600;
  transition:.3s;
}
.filter-btn:hover, .filter-btn.active {
  background:#003366;
  color:white;
}

/* PROJECT GRID */
.project-grid {
  max-width:1200px;
  margin:auto;
  display:flex;
  flex-wrap:wrap;
  gap:30px;
  justify-content:center;
}

/* PROJECT CARD */
.project-card {
  width:330px;
  background:white;
  border-radius:14px;
  overflow:hidden;
  box-shadow:0 10px 25px rgba(0,0,0,0.15);
  transition:.4s;
  animation:fadeUp 0.7s;
}
.project-card img {
  width:100%;
  height:200px;
  object-fit:cover;
  transition:.5s;
}
.project-card:hover img {
  transform:scale(1.15);
}

/* INFO */
.project-info {
  padding:20px;
}
.project-info h3 {
  font-size:20px;
  font-weight:700;
  color:#003366;
}
.project-info p {
  color:#555; font-size:14px; margin-top:5px;
}

/* ANIMATION */
@keyframes fadeUp {
  from {opacity:0; transform:translateY(40px);}
  to {opacity:1; transform:translateY(0);}
}

/* RESPONSIVE */
@media(max-width:900px) {
  .project-card { width:90%; }
}
</style>

<script>
const buttons = document.querySelectorAll(".filter-btn");
const cards = document.querySelectorAll(".project-card");

buttons.forEach(btn => {
  btn.addEventListener("click", () => {

    // Active button highlight
    buttons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    let filter = btn.getAttribute("data-filter");

    cards.forEach(card => {
      card.style.display = 
        (filter === "all" || card.classList.contains(filter)) 
        ? "block" : "none";
    });

  });
});
</script>

@endsection
