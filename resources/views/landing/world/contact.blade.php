@extends('landing.world.world')
@section('parent', 'container')
@section('content')
   <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
         <div class="contact-form">
            <h5>Get in Touch</h5>
            
            @include('landing.world.partials.content.session')

            <form action="{{ route('home.contact_send') }}" method="post">
               @csrf
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="group">
                        <input
                           type="text"
                           name="name"
                           id="name"
                           class="@error('name')
                           is-invalid
                        @enderror"
                           required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Masukan Nama</label>
                        @error('name')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                         @enderror
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="group">
                        <input
                           type="email"
                           name="email"
                           id="email"
                           class="@error('email')
                           is-invalid
                        @enderror"
                           required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Masukan Email</label>
                        @error('email')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                         @enderror
                     </div>
                  </div>
                  <div class="col-12 col-md-12">
                     <div class="group">
                        <input
                           type="text"
                           name="subject"
                           id="subject"
                           class="@error('subject')
                           is-invalid
                        @enderror"
                           required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Masukan Subject</label>
                        @error('subject')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                         @enderror
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="group">
                        <textarea
                           name="message"
                           id="message"
                           class="@error('message')
                           is-invalid
                        @enderror"
                           required></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Masukan pesan anda</label>
                        @error('message')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                         @enderror
                     </div>
                  </div>
                  <div class="col-12">
                     <button
                        type="submit"
                        class="btn world-btn">
                        Kirim pesan
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
@section('hero')
   @include('landing.world.partials.hero.hero-contact')
@endsection
