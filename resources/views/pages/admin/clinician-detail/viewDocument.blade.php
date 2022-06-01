@php
    $mainclass = "modal-large";
    $innerClass = "col-sm-2 mt-4";
    if(isset($input['type_id'])):
        if($input['type_id'] === '46' || $input['type_id'] === '47' || $input['type_id'] === '48'):
            $mainclass = "modal-lg";
            $innerClass = "col-sm-12 mt-12";
        elseif($input['action'] === 'scanReport')
            $mainclass = "modal-xl";
            $innerClass = "col-sm-12 mt-12";
        endif;
    endif;
@endphp

<div class="modal-dialog {{$mainclass}} modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Document</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <a href="javascript:void(0)"class="btn btn-danger shadow-sm btn--sm mr-2" >CLOSE</a>
            </button>
            {{-- @if($input['action'] === 'scanReport')
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$input['user_id']}}" data-original-title="Accept" class="btn btn-primary btn-secondary shadow-sm btn--sm mr-2 update-status float-right" data-status="1" data-action="{{ $input['type_id'] }}" data-url="{{ route('clinician.update-scrap-status') }}">Verified</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$input['user_id']}}" data-original-title="Approved" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="2" data-action="{{$input['type_id']}}" data-url="{{ route('clinician.update-scrap-status') }}">Approved</a>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$input['user_id']}}" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3" data-action="{{$input['type_id']}}" data-url="{{ route('clinician.update-scrap-status') }}">REJECT</a>
            @endif --}}
        </div>
        <div class="modal-body">
            <div class="pb-5">
                <div class="scrollbar scrollbar9" style="height: 1000px;width: 100%;" id="view-lab-report-file">
                    <div class="row">
                        @if($input['action'] === 'scanReport')
                            @php
                                $opciones_ssl = [
                                    "ssl" => [
                                        "verify_peer" => false,
                                        "verify_peer_name" => false,
                                    ],
                                ];
                                $img_path = $input['value'];
                                $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
                                $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
                                $img_base_64 = base64_encode($data);
                                $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;
                            @endphp
                           
                            <div class="col-12 {{$innerClass}}">
                                <div class="card shadow-sm">
                                    <div class="card-footer file-footer">
                                       <a href="{{$path_img}}" target="_blank" class="d-flex align-items-center text-success"><img onclick="openfancy();" src="{{$path_img}}" alt="Document" srcset="{{$path_img}}" class="img-fluid img-100"></a>
                                    </div>
                                </div>
                            </div>
                        @else
                            @isset($documents)
                                @foreach($documents as $document)
                                    <div class="col-12 {{$innerClass}}">
                                        <div class="card shadow-sm">
                                            <div class="card-footer file-footer">
                                                <a href="{{ $document->file_url }}" target="_blank" class="d-flex align-items-center text-success"><img onclick="openfancy();" src="{{ $document->file_url }}" alt="Document" srcset="{{ $document->file_url }}" class="img-fluid img-100"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

