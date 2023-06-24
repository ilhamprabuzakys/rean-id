@extends('layouts.error')
@section('title')
   500 Internal Server Error
@endsection
@section('content')
   <h1 class="error-title"> <span class="blink-infinite">500</span></h1>
   <h4 class="text-uppercase">Internal Server Error</h4>
   <p class="font-size-15 mx-auto text-muted w-50 mt-4">Check your internet connection, and please configure it to make sure it's works properly.</p>
@endsection
