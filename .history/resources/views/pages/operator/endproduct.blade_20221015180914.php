@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center"  >
      <div class=" col " >
        
<div class="card">
    <div class="card-header">
        <span>Reporting Production</span>
    </div>

    <div class="card-body">
        <form action="{{route('operator.endproductform')}}" method="POST">
            @csrf
        
            <div class="row">
                <span class="col-sm-5 ">Product: </span><span class="font-weight-bold">{{$productinfo->product_name}}</span></div><br>

            <div class="row">
                <span class="col-sm-5 ">Current Quantity: </span><span class="font-weight-bold">{{$productinfo->completion}}</span></div>

              <div class="row">
                <span class="col-sm-5">Requested Quantity: </span><span class="font-weight-bold">{{$productinfo->quantity}}</span></div>

                <hr/>
               
            <div class="row m-10">
                <label class="col-sm-5 col-label-form">Quantity Completed:</label></div>
                <div class="row m-10">
                <div class="col-sm-6">
                  <input type="number" min=1 step=1  name="quantity" decimal=0 class="form-control" required/>
                </div>
              </div>

              <br>

                          <div class="row">
                            <label class="col-sm-2 col-label-form">Note:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-12">
                              <textarea type="text" rows="5" name="note" class="form-control" required>{{$productinfo->operator_remark}}</textarea>
                            </div>
                          </div>
              <br>
              <br>
        
            <div class="card">
                <div class="card-header">
                    Inventory Used
                </div>
        
                <div class="card-body">
                    <table class="table" id="inventorys_table">
                        <thead>
                            <tr>
                                <th>Inventory</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="inventory0">
                                <td>
                                    <select name="inventorys[]" class="form-control">
                                        <option value="">-- choose product --</option>
                                        @foreach ($inventorys as $row)
                                            <option value="{{ $row->id }}">
                                                {{ $row->inventory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" value="1" />
                                </td>
                            </tr>
                            <tr id="inventory1"></tr>
                        </tbody>
                    </table>
        
                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>

<script>
 $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#inventory' + row_number).html($('#inventory' + new_row_number).html()).find('td:first-child');
      $('#inventorys_table').append('<tr id="inventory' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#inventory" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
  </script>