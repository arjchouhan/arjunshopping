@extends('layouts.main')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Order Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Order List</li>
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
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Your Orders</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>

                    <th scope="col">Order-ID</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">status</th>

                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orderData as $order)
                    <tr>
                    <td>##00-{{$order->order_id}}</td>
                    <td>{{$order->grandTotal}}</td>
                    <td>@if ($order->order_status==0) <span class="bg-info p-1 m-1">Pending</span> @elseif ($order->order_status==1) <span class="bg-warning p-2 m-1">Successully</span> @else <span class="bg-danger p-2 m-1">Failed</span> @endif</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('order.generatePDF',$order->order_id)}}"><i class="bi bi-cast"></i> view</a>
                        @if ($order->order_status==0)
                      <a class="btn btn-sm btn-success" href="#"><i class="bi bi-send"></i> Pay Now</a>
                      @endif
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection
