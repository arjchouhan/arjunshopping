@extends('layouts.main')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Welcome to Portal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
         
        </ol>
      </nav>
      


    </div><!-- End Page Title -->
    @if (Session::has('success'))
                  <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        <span> {{ Session::get('success') }}</span>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

@endsection