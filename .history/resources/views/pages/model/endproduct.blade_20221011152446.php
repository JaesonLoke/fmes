<Form action="{{route("$title",$row->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="modal fade" id="ModelEnd{{$row->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Product Completion Report</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                    <div class="modal-body text-left">
                        <div class="row">
                            <span class="col-sm-5 ">Product: </span><span class="font-weight-bold">{{$row->product_name}}</span></div><br>

                        <div class="row">
                            <span class="col-sm-5 ">Current Quantity: </span><span class="font-weight-bold">{{$row->completion}}</span></div>
            
                          <div class="row">
                            <span class="col-sm-5">Requested Quantity: </span><span class="font-weight-bold">{{$row->quantity}}</span></div>

                            <hr/>
                           
                        <div class="row m-10">
                            <label class="col-sm-5 col-label-form">Quantity Completed:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-6">
                              <input type="number" min=1 step=1  name="quantity" decimal=0 class="form-control" required/>
                            </div>
                          </div>

                          

                          <div class="row">
                            <label class="col-sm-2 col-label-form">Note:</label></div>
                            <div class="row m-10">
                            <div class="col-sm-12">
                              <textarea type="text" name="note" class="form-control" required>{{$row->operator_remark}}</textarea>
                            </div>
                          </div>


                        
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" class="btn btn-outline-info">{{__('Submit')}}</button>
                </div>
            </div>
        </div>
    </div>
</Form>