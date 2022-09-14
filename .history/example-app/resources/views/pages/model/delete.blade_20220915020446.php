<Form action="{{route('product.destroy',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="model fade" id="ModelDelete{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{}}</h4>
                </div>
            </div>
        </div>
    </div>
</Form>