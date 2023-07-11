@extends('layouts.main')

@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Order</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Order</li>
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
    <div class="col-lg-6">
      <div class="card bg-warning">
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
                        <input type="text" name="qty" class="input-quantity text-center" value="{{$cart->qty}}" disabled>
                    </td>
                    <td>
                    @php
                        $subtotal = $cart->prices * $cart->qty;
                        $totalSubtotal += $subtotal; // Add the subtotal to the total subtotal
                    @endphp
                        {{$subtotal}} /-
                    </td>

                </tr>
            @endforeach


            </tbody>
          </table>
          <!-- End Default Table Example -->
        </div>
        <hr>

            <div class="card-body">


              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Additional Charge</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Sub Total</th>
                    <td>{{ $totalSubtotal}}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Discount</th>
                    <td>10% (- {{ $discountINR = (($totalSubtotal)*10 / 100)}})
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">GST</th>
                    <td>5% (+{{ $GSTamount = (($totalSubtotal-$discountINR)*5 /100)}})</td>

                  </tr>
                  <tr>
                    <th scope="row">Grand Total</th>
                    <td>{{ $grandTotal = (($totalSubtotal-$discountINR)*5 /100) + ($totalSubtotal-$discountINR) }}</td>

                  </tr>

                </tbody>
              </table>

              <!-- End Default Table Example -->
            </div>


      </div>

    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-warning">
              <h5 class="card-title">Order Detail</h5>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" action="{{route('cart.orderplace')}}"  method="POST" novalidate>
              @csrf
              <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Full  Name</label>
                  <input type="text" name="fullname" id="fullname" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Mobile No</label>
                    <input type="text" class="form-control"  name="mobile_no" id="mobile_no" value="" required>
                    <div class="valid-feedback">
                      correct
                    </div>
                  </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Address</label>
                  <input type="text" class="form-control"  name="Address" id="Address" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">City</label>
                  <input type="text" class="form-control"  name="City" id="City" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">State</label>
                  <input type="text" name="State" id="State" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Country</label>
                  <input type="text" name="Country" id="Country" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Pincode</label>
                  <input type="text" name="pincode" id="pincode" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <input type="hidden" name="grandTotal" id="grandTotal" class="form-control"  value="{{$grandTotal}}">
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="submit">Order Place</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
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

