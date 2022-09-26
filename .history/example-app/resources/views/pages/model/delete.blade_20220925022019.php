<Form action="{{route('$route',$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="modal fade" id="ModelDelete{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product {{$row->id}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">Are you sure to delete this record?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-outline-danger">{{__('Delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</Form>