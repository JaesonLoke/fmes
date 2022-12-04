@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6 pt-md-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Production</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links ">
                  <li class="breadcrumb-item text-primary"><a href="/home"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Production</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('production.create')}}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> New</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row "  >
        <div class=" col " >
          <div class="card " >
            <!--table header-->
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Production to be complete</h3>
            </div>
              <div class="table-responsive p-3"  >
                <table class="table  table-flush data-table" >
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Production Line</th>
                      <th scope="col">Status</th>
                      <th scope="col">Work Order Amount</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list" >
                    @if (count($productions) == 0)
                      <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                      </tr>
                    @else

                    @foreach($productions as $row)
                    <tr>
                      <th scope="row" >
                            <a class="name mb-0 text-primary " href="{{route('workorder')}}?id={{ $row->id }}" > {{ $row->production_line}} </a>
                      </th>
                      <td>
                          
                          @include('pages.condition.statusCon')
                          
                        </span>
                      </td>
                      <td>
                          
                        <span>{{ DB::table('workorders')->where('production_id',$row->id)->count()}}</span>
                        
                    </td>
                      <td  >
                        <Form action="{{route('production.destroy',$row->id)}}" method="post" enctype="multipart/form-data">

                          <a href="{{route('production.edit',$row->id)}}" class="btn btn-sm btn-neutral"><i class="fas fa-edit"></i></a>
                          <a href="#" data-toggle="modal" data-target="#ModelDelete{{$row->id}}" 
                            @method('DELETE')
                          @csrf
                          <button type="submit"  class="btn btn-sm btn-danger" 
                          onclick="return confirm('{{ __('Are you sure you want to delete?') }}')" 
                          href="{{route('production.destroy',$row->id)}}"><i class="fas fa-trash"></i></a>
                          </Form>
                      </td>
                    </tr>
                    
                    @endforeach
                    @endif
                  </tbody>
                </table>
                
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection

  @push('script')
<script>

    $(function () {
        $('.data-table').DataTable({
          "aaSorting": []
        });
    });
</script>
@endpush