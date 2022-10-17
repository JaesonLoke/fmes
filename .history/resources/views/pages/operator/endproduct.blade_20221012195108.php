@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

<Form action="{{route('operator.endproductform')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-header">
            Products
        </div>

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Inventory</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="product0">
                        <td>
                            <select name="products[]" class="form-control">
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


@endsection