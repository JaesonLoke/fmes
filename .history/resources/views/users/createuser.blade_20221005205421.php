@extends('layouts.pages')

@section('content')
    <!-- table -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add New Admin</h6>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center"  >
        <div class=" col " >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <div class="row m-0">
                <h3 class="mb-0">Fill in the details below...</h3>
                <div class="col-md-10 text-right">
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
                    
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Full Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="fullname" class="form-control" placeholder="Loke Chung Huang" required/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Username</label>
                        <div class="col-sm-3">
                          <input type="text" name="username" class="form-control" placeholder="Jaeson"  required/>
                        </div>
                      </div>

                      <hr>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Email</label>
                        <div class="col-sm-3">
                          <input type="email" name="email" class="form-control" placeholder="huang@gmail.com" required/>
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form required">Contact Number</label>
                        <div class="col-sm-3">
                          <input type="tel" name="phonenum" class="form-control" placeholder="019-441 1922" required/>
                        </div>
                      </div>

                      <hr>
                      
                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form ">Position</label>
                        <div class="col-sm-3">
                          <input type="text" name="pos" class="form-control" placeholder="IT Programmer" />
                        </div>
                      </div>

                      <div class="row m-3">
                        <label class="col-sm-2 col-label-form ">Description</label>
                        <div class="col-sm-8">
                          <textarea name="desc" row="4" placeholder="Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music." > </textarea>
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