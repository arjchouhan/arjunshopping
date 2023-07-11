@extends('layouts.main')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('product.productlist')}}">Product</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
       
      @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit product</h5>
            
              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" action="{{route('product.update_product',$productData->id)}}"  method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Product Name</label>
                  <input type="text" name="product_name" id="product_name" class="form-control" id="validationCustom01" value="{{$productData->product_name}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Title</label>
                  <input type="text" name="title" id="title" class="form-control" id="validationCustom01" value="{{$productData->title}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
               
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Sort Description</label>
                  <input type="text" class="form-control"  name="sort_desc" id="sort_desc" value="{{$productData->sort_desc}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Description</label>
                  <input type="text" class="form-control"  name="desc" id="desc" value="{{$productData->desc}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">MRP</label>
                  <input type="text" name="MRP" id="MRP" class="form-control" id="validationCustom01" value="{{$productData->MRP}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Price</label>
                  <input type="text" name="price" id="price" class="form-control" id="validationCustom01" value="{{$productData->price}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Our price</label>
                  <input type="text" name="our_price" id="our_price" class="form-control" id="validationCustom01" value="{{$productData->our_price}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                
                <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Product Image</label>
                      @foreach(explode(',', $productData->prod_image) as $image)
                      <img src="{{url('assets/'.$image)}}" class="img-fluid img-thumbnail" alt="productImage" width="150" height="150">
                      @endforeach
                      <input type="file" class="form-control" name="prod_image[]" id="prod_image[]" multiple required>
                      <div class="valid-feedback">
                        correct
                      </div>
                </div>
                

                
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="submit">Update Product</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection