<Form action="{{route('product.destroy',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="model fade" id="ModelDelete"
</Form>