<Form action="{{route("$title",$row->id)}}" method="POST" enctype="multipart/form-data">
    @method('DELETE')
    @csrf

    <div class="modal fade" id="ModelEnd{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Product Completion Report</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                    <div class="modal-body text-center">
                        <div class="row m-10">
                            <label class="col-sm-5 col-label-form">Quantity Completed:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-6">
                              <input type="number" name="quantity" class="form-control"/>
                            </div>
                          </div>

                          <br>

                          <div class="row m-10">
                            <label class="col-sm-5 col-label-form">Note:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-6">
                              <textarea type="number" name="quantity" class="form-control"></>
                            </div>
                          </div>


                        
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-outline-danger">{{__('Stop')}}</button>
                </div>
            </div>
        </div>
    </div>
</Form>