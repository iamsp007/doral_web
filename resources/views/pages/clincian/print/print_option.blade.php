<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Print Option(s)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="pb-4">
                <div class="form-group">
                    <label for="selectRole" class="label-custom"><span>Application:</label>
                    <a href="javascript:void(0)" id="print" data-file="demograhics" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-application" style="float: right;">Print <i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Demograhics</li>
                        <li class="list-group-item">Contact @ References</li>
                        <li class="list-group-item">Education</li>
                        <li class="list-group-item">Professional License</li>
                        <li class="list-group-item">Employment History</li>
                    </ul>
                </div>
                <hr>
                <div class="form-group">
                    <label for="selectRole" class="label-custom"><span>Forms:</label>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            W-4 forms
                            <a href="javascript:void(0)" id="print" data-file="w4form" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-w4form" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <li class="list-group-item">
                            Employment Verification
                            <a href="javascript:void(0)" id="print" data-file="empVerify" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-empVerify" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <li class="list-group-item">
                            NY State Withholding – IT-204
                            <a href="javascript:void(0)" id="print" data-file="NYState" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-NYState" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <li class="list-group-item">
                            Notice of Pay Rate and Payday
                            <a href="javascript:void(0)" id="print" data-file="NoticePay" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-NoticePay" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <!-- <li class="list-group-item">
                            W-11 forms
                            <a href="javascript:void(0)" id="print" data-file="w11form" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-w11form" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <li class="list-group-item">
                            Influenza VAaccine
                            <a href="javascript:void(0)" id="print" data-file="flu" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-flu" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li> -->
                        <li class="list-group-item">
                            8850 form
                            <a href="javascript:void(0)" id="print" data-file="form8850" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-form8850" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                        </li>
                        <li class="list-group-item">
                            I9 Form
                            @if($employer_verify)
                            <a href="javascript:void(0)" id="print" data-file="i9form" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-i9form" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                            @else 
                            <a target="_blank" href="{{ Route('i9form_verify',['id' => $id]) }}" data-file="i9form_verify" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-i9form_verify" style="float: right;">Verify<i class="fa fa-spinner fa-spin loader" style="display:none;" ></i></a>
                            @endif 
                        </li>
                        {{--
                         <li class="list-group-item">
                            I9 Form Verify
                             @if($employer_verify)
                                <a href="javascript:void(0)" id="print" data-file="i9form_verify" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-i9form_verify" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                            @else 
                                <a target="_blank" href="{{ Route('i9form_verify',['id' => $id]) }}" data-file="i9form_verify" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}-i9form_verify" style="float: right;">Submit<i class="fa fa-spinner fa-spin loader" style="display:none;" ></i></a>
                            @endif
                        </li>--}}
                    </ul>
                </div>
                <hr>
                <div class="form-group">
                    <label for="selectRole" class="label-custom"><span>Document:</label>
                    <a href="javascript:void(0)" id="print" data-file="document" data-id="{{$id}}" class="btn btn-primary btn-sm mr-2" data-name="{{ $file_name }}" style="float: right;">Print<i class="fa fa-spinner fa-spin loader" style="display:none;"></i></a>
                    <ul class="list-group list-group-flush">
                    @foreach ($documents as $document)
                        <li class="list-group-item">{{$document->type_name}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

