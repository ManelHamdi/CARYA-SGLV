@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('SGLV')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Bienvenue dans') }} </h1>
          <img style="display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;" src="{{ asset('images') }}/loloapp.png" alt="">
      </div>
  </div>
</div>

@endsection
