@extends('layouts.main')

@section('title', 'Contact')

@section('content')

<!-- CONTACT HERO -->


<section style="padding:80px 20px;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:50px;">

    <!-- LEFT BOX -->
    <div style="flex:1; min-width:300px; animation:fadeUp .6s;">
      <h2 style="font-size:34px; font-weight:700; color:#003366;">
          {{ $contactDetail->title ?? 'Get in Touch' }}
      </h2>

      <p style="margin-top:10px; color:#555; font-size:16px; line-height:1.6;">
          {{ $contactDetail->description ?? 'Reach out to us for solar installation, consultation or support.' }}
      </p>

      <div style="margin-top:25px;">
        
        <!-- PHONE -->
        <h4 style="font-size:20px; color:#003366; font-weight:700;">
            {{ $contactDetail->phone_heading ?? 'Phone' }}
        </h4>
        <p style="font-size:16px; color:#444;">
            {{ $contactDetail->phone_value ?? '+91 00000 00000' }}
        </p>

        <!-- EMAIL -->
        <h4 style="font-size:20px; color:#003366; margin-top:20px; font-weight:700;">
            {{ $contactDetail->email_heading ?? 'Email' }}
        </h4>
        <p style="font-size:16px; color:#444;">
            {{ $contactDetail->email_value ?? 'info@example.com' }}
        </p>

        <!-- ADDRESS -->
        <h4 style="font-size:20px; color:#003366; margin-top:20px; font-weight:700;">
            {{ $contactDetail->address_heading ?? 'Address' }}
        </h4>
        <p style="font-size:16px; color:#444;">
            {!! nl2br(e(optional($contactDetail)->address_value ?? 'Default address here')) !!}
        </p>
      </div>

      <!-- GOOGLE MAP -->
      <iframe 
        src="{{ $contactDetail->map_embed_url ?? '' }}"
        width="100%" height="260"
        style="border:0; border-radius:12px; margin-top:25px;"
        allowfullscreen="" loading="lazy">
      </iframe>
    </div>


    <!-- RIGHT BOX (CONTACT FORM) -->
    <div style="flex:1; min-width:320px; animation:fadeUp .9s;">

      <div style="background:#f9fbff; padding:35px; border-radius:14px; box-shadow:0 10px 25px rgba(0,0,0,0.1);">

        <h2 style="font-size:28px; color:#003366; font-weight:700; margin-bottom:20px;">
          Send Us a Message
        </h2>

        <div id="successMessage" style="
            display:none; padding:20px; background:#d4ffd9; border-left:5px solid #28a745;
            border-radius:6px; margin-bottom:20px;">
          <strong>Success!</strong> Your message has been sent.
        </div>

        <form id="contactForm">

          <input type="hidden" name="access_key" value="3b8ccead-d37b-42b0-a9e4-4674854d5644">

          <label>Name</label>
          <input type="text" name="name" required class="input">

          <label>Phone</label>
          <input type="text" name="phone" required maxlength="10" class="input">

          <label>Email</label>
          <input type="email" name="email" required class="input">

          <label>Your Message</label>
          <textarea name="message" rows="4" required class="input"></textarea>

          <button type="submit" class="submit-btn">Send Message</button>

        </form>
      </div>
    </div>

  </div>
</section>

<style>
.input {
  width:100%;
  padding:12px 15px;
  border:1px solid #ccc;
  border-radius:8px;
  margin-bottom:15px;
  font-size:15px;
  outline:none;
  transition:0.3s;
}
.input:focus {
  border-color:#003366;
  box-shadow:0 0 6px rgba(0,51,102,0.3);
}

.submit-btn {
  width:100%;
  padding:12px;
  background:#ffaa00;
  border:none;
  border-radius:8px;
  font-size:17px;
  font-weight:700;
  color:#003366;
  cursor:pointer;
  transition:0.3s;
}
.submit-btn:hover {
  background:#ffb933;
}

@keyframes fadeUp {
  from {opacity:0; transform:translateY(30px);}
  to {opacity:1; transform:translateY(0);}
}
</style>

<script>
document.getElementById("contactForm").addEventListener("submit", async function(e){
  e.preventDefault();

  let form = e.target;
  let formData = new FormData(form);

  let response = await fetch("https://api.web3forms.com/submit", {
    method: "POST",
    body: formData
  });

  let result = await response.json();

  if (result.success) {
    document.getElementById("successMessage").style.display = "block";
    form.reset();
  } 
});
</script>


@endsection