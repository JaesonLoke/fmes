@extends('layouts.app')

<body class="bg-dark">

@section('content')


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            
            
        </div>
    </div>
</div>
    
    

    <div class="container-fluid mt-4 mb-4">
        <div class="row justify-content-center">
          <div class=" col ">
            <div class="card">
              <div class="card-header bg-transparent">
                <span>Reports</span>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center text-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Report case</th>
                        <th scope="col" class="sort" data-sort="status">Production line</th>
                        <th scope="col">Reported by</th>
                        <th scope="col" class="sort" data-sort="completion">Date reported</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Spanner Run Out</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 2</span>
                        </td>
                        <td>
                            <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                              <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                            </a>
                          </div>
                          
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">19 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Scissors broken</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 3</span>                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                  <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                </a>
                              </div>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">21 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Klein</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 2</span>                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                  <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                </a>
                              </div>
                        </td>
                        <td>
                            <span class="name mb-0 text-sm">19 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Hammer</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 2</span>                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                  <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                </a>
                              </div>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">19 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">Measurement</span>
                            </div>
                          </div>
                        </th>
                        <td>
                            <span class="name mb-0 text-sm">Line 2</span>
                        </td>
                        <td>
                            <div class="avatar-group">
                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                  <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                </a>
                              </div>
                        </td>
                        <td>
                          <span class="name mb-0 text-sm">10 Sep 2022</span>
                        </td>
                        <td class="text-right">
                          <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                            <a href="#" data-toggle="modal" data-target="#" class="btn btn-sm btn-neutral"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush