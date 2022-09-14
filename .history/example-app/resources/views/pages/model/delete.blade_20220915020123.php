<Form action="{{route('product.destroy',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @c