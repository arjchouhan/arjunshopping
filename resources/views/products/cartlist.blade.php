@extends('layouts.main')

@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Cart List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Product</li>
      <li class="breadcrumb-item active">Cart</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
@if ($message = Session::get('success'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <span>{{ $message }}</span>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
    @endif
<section class="section">
  <div class="row">
    <div class="col-lg-10">
      <div class="card bg-danger">
        <div class="card-body">
          <h5 class="card-title bg-secondary text-warning p-2 m-1">Cart Items</h5>

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
            @php
                $totalSubtotal = 0; // Initialize the total subtotal variable outside the loop
                @endphp

            @foreach($Cartdata as $cart)
                <tr>
                    <td>{{$cart->product_name}}</td>
                    <td>{{$cart->prices}}</td>
                    <td>
                            <div class="quantity">
                                <a  href="{{route('cart.qtyDecr',$cart->cartId)}}" class="btn btn-quantity decrement" id="decrement" onclick="return confirm('Are you sure you want to remove product qty?');">-</a>
                                <input type="text" name="qty" class="input-quantity text-center" value="{{$cart->qty}}" disabled>
                                <a  href="{{route('cart.qtyIncr',$cart->cartId)}}" class="btn btn-quantity increment" id="increment" onclick="return confirm('Are you sure you want to add product qty?');">+</a>
                            </div>
                    </td>
                    <td>
                    @php
                        $subtotal = $cart->prices * $cart->qty;
                        $totalSubtotal += $subtotal; // Add the subtotal to the total subtotal
                    @endphp
                        {{$subtotal}} /-
                    </td>
                    <td>
                        <div class="action">
                            <a  href="{{route('cart.removeItem',$cart->cartId)}}" class="btn btn-quantity decrement" id="decrement" onclick="return confirm('Are you sure you want to remove Cart Item?');"><i class="ri-archive-fill text text-danger"></i></a>

                        </div>
                </td>
                </tr>
            @endforeach


            </tbody>
          </table>
          <!-- End Default Table Example -->
          <a class="btn btn-success" href="{{route('cart.order')}}">
            <i class="bx bxl-play-store"></i>
            <span>Checkout</span>
          </a>
        </div>
      </div>
    </div>


</section>

</main><!-- End #main -->
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
@endsection

