@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form action="" method="POST">
            @csrf
        
            {{-- ... customer name and email fields --}}
        
            <div class="card">
                <div class="card-header">
                    Products
                </div>
        
                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="products[]" class="form-control">
                                        <option value="">-- choose product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $row->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" value="1" />
                                </td>
                            </tr>
                            <tr id="product1"></tr>
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
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
  </script>