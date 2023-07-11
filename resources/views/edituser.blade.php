@extends('layouts.main')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{route('user.userlist')}}">User</a></li>
          <li class="breadcrumb-item active">Edit User</li>
        </ol>
      </nav>
    </div>End Page Title

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
              <h5 class="card-title">Update User</h5>
             
              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" action="{{route('user.update_user',$userData->id)}}"  method="POST" novalidate>
              @csrf
              
              
              <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Name</label>
                  <input type="text" name="fullname" id="fullname" class="form-control" id="validationCustom01" value="{{$userData->fullname}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">User name</label>
                  <input type="text" name="username" id="username" class="form-control" id="validationCustom01" value="{{$userData->username}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Email</label>
                  <input type="email" class="form-control" id="validationCustom01" name="email" id="email" value="{{$userData->email}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Mobile No</label>
                  <input type="text" class="form-control" id="validationCustom01" name="mobile_no" id="mobile_no" value="{{$userData->mobile_no}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Address</label>
                  <input type="text" class="form-control" id="validationCustom01" name="address" id="address" value="{{$userData->address}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">City</label>
                  <input type="text" class="form-control" id="validationCustom01" name="city" id="city" value="{{$userData->city}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">State</label>
                  <input type="text" class="form-control" id="validationCustom01" name="state" id="state" value="{{$userData->state}}" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Country</label>
                  <input type="text" class="form-control" id="validationCustom01" value="{{$userData->country}}" name="country" id="country" required>
                  <div class="valid-feedback">
                    correct
                  </div>
                </div>

                
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

          

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection