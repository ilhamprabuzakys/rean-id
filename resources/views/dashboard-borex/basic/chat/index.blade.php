@extends('layouts.app')
@section('title')
   <h4 class="page-title">ChatApp</h4>
@endsection
@section('content')
   <script>
   // window.currentUser = @auth @json(auth()->user()) @else null @endauth;
   </script>
   <script>
      @if (Auth::check())
        window.currentUser = @json(Auth::user());
    @endif
   </script>
   <div class="d-lg-flex">
      <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-3">
         <div class="card">
            <div class="p-3 px-lg-4 border-bottom">
               <div class="row">
                  <div class="col-xl-4 col-7">
                     <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                           <div class="avatar-title bg-soft-primary text-primary display-6 m-0 rounded-circle">
                              <i class="bx bxs-user-circle"></i>
                          </div>
                        </div>
                        <div class="flex-grow-1">
                           <h5 class="font-size-16 mb-1 text-truncate">
                              <a href="#" class="text-dark" id="otherUser"></a>
                           </h5>
                           <p class="text-muted text-truncate mb-0" id="isTyping"></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-8 col-5">
                     <ul class="list-inline user-chat-nav text-end mb-0">
                        <li class="list-inline-item">
                           <div class="dropdown">
                              <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bx bx-search"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                 <form class="px-2">
                                    <div>
                                       <input type="text" class="form-control border bg-soft-light" placeholder="Search...">
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>

                        <li class="list-inline-item">
                           <div class="dropdown">
                              <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="bx bx-dots-horizontal-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                 <a class="dropdown-item" href="#">Profile</a>
                                 <a class="dropdown-item" href="#">Archive</a>
                                 <a class="dropdown-item" href="#">Muted</a>
                                 <a class="dropdown-item" href="#">Delete</a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>

            <div class="chat-conversation p-3" data-simplebar>
               <ul class="list-unstyled mb-0" id="list-messages">
                  <li class="chat-day-title">
                     <span class="title">Today</span>
                  </li>
                  {{-- <li>
                     <div class="conversation-list">
                        <div class="d-flex">

                           <div class="flex-1">
                              <div class="ctext-wrap">
                                 <div class="ctext-wrap-content">
                                    <p class="mb-2 fw-bold">User</p>
                                    <p class="mb-0">Good Morning</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>

                  <li class="right">
                     <div class="conversation-list">
                        <div class="d-flex">
                           <div class="flex-1">
                              <div class="ctext-wrap">
                                 <div class="ctext-wrap-content">
                                    <p class="mb-2 fw-bold">User</p>
                                    <p class="mb-0">Good morning</p>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>

                  </li>  --}}
               </ul>
            </div>

            <div class="p-3 border-top">
               <form action="" id="message-form">
                  <div class="row">
                     <div class="col">
                        <div class="position-relative">
                           <input id="input-message" type="text" class="form-control border bg-soft-primary" placeholder="Enter Message..." autocomplete="off">
                        </div>
                     </div>
                     <div class="col-auto">
                        <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i
                              class="mdi mdi-send float-end"></i></button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- end user chat -->
   </div>
@endsection
