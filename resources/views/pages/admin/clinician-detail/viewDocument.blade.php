<div class="modal-dialog modal-large modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Document</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
       
        <div class="modal-body">
            <div class="pb-5">
                <div class="scrollbar scrollbar9" id="view-lab-report-file">
                    <div class="row">
                        @if($action === 'scanReport')
                            <div class="col-12 col-sm-2 mt-4">
                                <div class="card shadow-sm">
                                    <div class="card-footer file-footer">
                                       <img id="firstImage" width="1100" hieght="auto" src="{{$input['value']}}">
                                    </div>
                                </div>
                            </div>
                        @else
                            @isset($documents)
                                @foreach($documents as $document)
                                    <div class="col-12 col-sm-2 mt-4">
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
    </div>
</div>
