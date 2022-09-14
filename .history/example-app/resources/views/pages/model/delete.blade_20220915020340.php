<Form action="{{route('product.destroy',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="model fade" id="ModelDelete{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">

            

    </div>
</Form>