<Form action="{{route('product.destroy',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="model fade" id="ModelDelete{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('User Delete')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal body">Are you sure to delete this record?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gr"

            </div>
        </div>
    </div>
</Form>