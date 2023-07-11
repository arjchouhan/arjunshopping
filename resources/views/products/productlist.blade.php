@extends('layouts.main')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('product.productlist')}}">Product</a></li>
          <li class="breadcrumb-item active">Product List</li>
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
              <h5 class="card-title">Datatables</h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Sort Description</th>
                    <th scope="col">MRP</th>
                    <th scope="col">Price</th>
                    <th scope="col">Our Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->sort_desc}}</td>
                    <td>{{$product->MRP}} /- </td>
                    <td>{{$product->price}} /- </td>
                    <td>{{$product->our_price}} /- </td>
                    <td>
                    <a class="btn btn-sm btn-warning" href="{{route('product.editproduct',$product->id)}}"><i class="ri-ball-pen-fill"></i></a>
                    <a class="btn btn-sm btn-danger" href="{{route('product.deleteproduct',$product->id)}}"><i class="ri-delete-bin-5-fill"></i></a> 
                    <a class="btn btn-sm btn-info" href="{{route('product.productDetail',$product->id)}}"><i class="ri-file-history-line"></i></a>  
                    </td>
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