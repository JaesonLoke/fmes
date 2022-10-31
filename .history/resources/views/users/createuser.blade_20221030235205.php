@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Add New User</h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center"  >
        <div class=" col-9 text-center" >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <div class="row m-0">
                <h3 class="mb-0">Fill in the details below...</h3>
                <div class="col text-right">
                  <a href="{{route('user.index')}}" class="btn btn-sm btn-neutral"><i class="fas fa-exit"></i> Back</a>
                </div>
              </div>
            </div>
              <div class="table-responsive"  >
                <table class="table align-items-center table-flush" >
                  <thead class="thead-light">

                    @if($errors->any())

                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)

                          <li>{{ $error }}</li>

                        @endforeach
                      </ul>
                    </div>

                    @endif
                    
                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Full Name</label>
                        <div class="col-sm-5">
                          <input type="text" name="fullname" class="text-dark form-control" placeholder="Fullname" required/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Username</label>
                        <div class="col-sm-2">
                          <input type="text" name="username" class="text-dark form-control" placeholder="Username"  required/>
                        </div>
                      </div>

                      <hr>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Pin Number</label>
                        <div class="col-sm-2">
                          <input id="password" type="password" maxlength="4" class="text-dark form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="xxxx" class="text-dark form-control" required/>
                          <span class="font-weight-light text-right">4 numbers only</span>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Confirm Pin</label>
                        <div class="col-sm-2 text-right">
                          <input id="password" type="password" maxlength="4" class="text-dark form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="current-password" placeholder="xxxx" class="text-dark form-control" required/>
                          <span class="font-weight-light text-right">Must same as pin!</span>
                        </div>
                      </div>
                      
                      <hr>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Email</label>
                        <div class="col-sm-3">
                          <input type="email" name="email" class="text-dark form-control" placeholder="Email" required/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Contact Number</label>
                        <div class="col-sm-3">
                          <input type="tel" name="phonenum" class="text-dark form-control" placeholder="xxx-xxx xxxx" required/>
                        </div>
                      </div>

                      <hr>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form ">Profile Picture</label>
                        <div class="col-sm-3">
                          <input type="file" name="image" class="form-control "  />
                        </div>
                      </div>

                      <hr>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form ">Position</label>
                        <div class="col-sm-3">
                          <input type="text" name="pos" class="text-dark form-control" placeholder="IT Programmer" />
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form ">Description</label>
                        <div class="col-sm-8">
                          <textarea name="desc" class="text-dark form-control" rows="4" placeholder="Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music." ></textarea>
                        </div>
                      </div>

                      

                      <div class="text-center">
                        <input type="submit" class="btn btn-primary"/>
                      </div>

                      
                    </form>
                  </thead>
                </table>
                <div style="float:right; margin-right:15px; margin-bottom:20px">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>