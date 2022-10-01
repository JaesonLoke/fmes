<Form action="{{route("$title",$row->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="modal fade" id="ModelRemark{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Note</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                    <div class="modal-body text-left">
                        <div class="row">
                            <label class="col-sm-12 col-label-form">Planner Comment:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-12">
                              <textarea type="text" name="note" class="form-control" required>{{$row->planner_remark}}</textarea>
                            </div>
                          </div>
                           
                          <hr>

                          <div class="row">
                            <label class="col-sm-12 col-label-form">Operator Comment:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-12">
                              <textarea type="text" name="note" class="form-control" required>{{$row->operator_remark}}</textarea>
                            </div>
                          </div>


                        
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Back')}}</button>
                </div>
            </div>
        </div>
    </div>
</Form>