<div class="col-xl-4 col-lg-4 col-md-12 col-sm-8 col-12">
   <div class="card h-100">
      <div class="card-body text-nowrap">
         <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Selamat Datang <strong>{{ $user->name
               }}!</strong> </h4>
         <p class="pb-0 overflow-hidden">Terakhir login {{
            \Carbon\Carbon::parse($user->last_activity_at)->diffForHumans() }}</p>
         @php
         $totalKarya = ($user->posts->count() ?? 0) +
         ($user->events->count() ?? 0) + ($user->ebooks->count() ?? 0) +
         ($user->news->count() ?? 0);
         @endphp
         <h5 class="mb-1">Karya kamu <span class="text-primary">{{ $totalKarya == 0 ? 'Masih kosong' :
               $totalKarya }} </span></h5>
         <p class="mb-2 pb-1">Tetap berkarya ya!</p>
         <a href="{{ route('logs.index') }}" class="btn btn-sm btn-primary">Lihat aktivitas ku</a>
      </div>
      <img src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/faq-illustration.png') }}"
         class="position-absolute bottom-0 end-0 me-3" height="140" alt="lihat log">
   </div>
</div>