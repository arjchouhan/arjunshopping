@extends('layouts.main')

@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Product Detail</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Product</li>
      <li class="breadcrumb-item active">Product Detail</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
 
<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <div id="imageContainer">
              <div class="product-image">
                <img id="mainImage" src="{{url('assets/'.$productDetail->prod_image)}}" alt="Product Image">
              </div> 
            </div>
        </div>
        <hr>
        <div class="col-xl-4" id="imglist">
        <div class="image-container">
            @foreach(explode(',', $productDetail->prod_image) as $image)
              <img src="{{url('assets/'.$image)}}" id="singleImg" class="img-fluid img-thumbnail thumbnail-image" alt="productImage" width="50" height="50">
            @endforeach
          </div>
        </div>  

      </div>
      
    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>
            <li class="nav-item">
             <a href="{{route('cart.addcart',$productDetail->id)}}"> <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#profile-overview">Add Cart <i class="bi bi-arrow-right"></i></button></a>
            </li>
          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              
              <h5 class="card-title">Details : {{$productDetail->title}}</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Product Name</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->product_name}}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Our Price</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->our_price}}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Price</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->price}}</div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label ">MRP</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->MRP}}</div>
              </div>


              <div class="row">
                <div class="col-lg-3 col-md-4 label">Sort Description</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->sort_desc}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Description</div>
                <div class="col-lg-9 col-md-8">{{$productDetail->desc}}</div>
              </div>

             
            </div>

            

            

            

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>
@push('other-scripts')
<script>
  $(document).ready(function() {
    $('#singleImg').click(function() {
     
      var newImageSrc = $(this).attr('src');
      console.log(newImageSrc);
      $('#mainImage').attr('src', newImageSrc);
    });
  });
</script>
@endpush
</main><!-- End #main -->
@endsection
