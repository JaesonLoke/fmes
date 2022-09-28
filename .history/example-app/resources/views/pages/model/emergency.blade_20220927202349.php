<Form action="{{route("$title",$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="modal fade" id="ModelEmergency{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white"><i class="fas fa-exclamation-triangle "></i>  Emergency Stop</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">This is only for emergency cases. Are u sure?</div>

                <label class="col-sm-4 col-label-form">Reason</label>
                        <div class="col-sm-8">
                          <input type="text" name="product_name" class="form-control"/>
                        </div>

                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-outline-danger">{{__('Stop')}}</button>
                </div>
            </div>
        </div>
    </div>
</Form>