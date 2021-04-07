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
                <div class="d-flex justify-content-end mb-4">
                    <!-- <a href="{{ route('clinician.downloadDocument',['user_id' => $user_id, 'type_id' => $type_id]) }}" class="btn btn-outline-green d-flex align-items-center download_all_lab_report">Download All Reports</a>
                    <input type='button' id='download' value='Download'> -->
                </div>
                <div class="scrollbar scrollbar9" id="view-lab-report-file">
                    <div class="row">
                        @isset($documents)
                            @foreach($documents as $document)
                                <div class="col-12 col-sm-2 mt-4">
                                    <div class="card shadow-sm">
                                        <div class="card-footer file-footer">
                                            <a href="javascript:void(0)" class="d-flex align-items-center text-success">
                                              
                                                <img onclick="openfancy();" src="{{ $document->file_url }}" alt="Document" srcset="{{ $document->file_url }}" class="img-fluid img-100">
                                            </a>
                                         
                                            <div>
                                                <!-- <div class="dropdown"> -->
                                                    <!-- <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-ellipsis-v"></i></button> -->
                                                    <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ $document->file_url }}" download="{{ $document->file_url }}">Download File</a>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#docViewerModal"
                                                        href="#">View Details</a>
                                                    </div> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
