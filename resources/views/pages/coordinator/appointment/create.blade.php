
<div id="largeModal" class="modal fade fade2 dialogue" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Book Appointment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" style="display: none">
                <strong>Success!</strong> <span id="successResponse"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
                <strong>Error!</strong> <span id="errorResponse"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="create_appointment_frm" name="create_appointment_frm" onsubmit="return false;">
                @csrf
                <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient_id }}" >
                <input type="hidden" id="provider_pa_ma" name="provider_pa_ma" value=" {{ $provider_pa_ma }}" >
                <input type="hidden" id="provider" name="provider" value="{{ $provider }}" >
            
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-12 col-sm-6">
                                <label for="_title" class="label">Title</label>
                                <div class="input-group"><span class="input-group-text input-group-text-custom" id="admissionId"><i class="las la-heading"></i> </span>
                                    <input type="text" class="form-control form-control-lg" id="title" name="title" aria-describedby="_titleHelp" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="_service" class="label">Service</label>
                                <div class="input-group"><span class="input-group-text input-group-text-custom" id="admissionId"><i class="las la-capsules"></i> </span>

                                    <select id="service_id" name="service_id" placeholder="Provider" class="form-control form-control-lg" >
                                        @if( count( $services ) )
                                            @foreach( $services AS $service_key => $service )
                                                <option value="{{ $service['id'] }}" >{{ $service['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <!-- <div class="col-12 col-sm-6">
                                <label for="_patient" class="label">Patient Name</label>
                                <div class="input-group"><span class="input-group-text input-group-text-custom" id="admissionId"><i class="las la-user-tie"></i> </span>
                                    <input type="text" class="form-control form-control-lg" id="_patient" name="_patient" aria-describedby="_patientHelp">
                                </div>
                            </div> -->
                              
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            
                            <div class="col-12 col-sm-6">
                                <label for="_datetime" class="label">Start Date & Time - End Date & Time</label>
                                <div class="input-group"><span class="input-group-text input-group-text-custom" id="admissionId"><i class="las la-calendar-alt"></i> </span>
                                    <input type="text" id="start_datetime" value="{{ $start }}" name="start_datetime" aria-describedby="_datetimeHelp" class="form-control form-control-lg" placeholder="Appointment Start Date Time" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="_datetime" class="label">Start Date & Time - End Date & Time</label>
                                <div class="input-group"><span class="input-group-text input-group-text-custom" id="admissionId"><i class="las la-calendar-alt"></i> </span>
                                    <input type="text" id="end_datetime" value="{{ $end }}" name="end_datetime" aria-describedby="_datetimeHelp" class="form-control form-control-lg" placeholder="Appointment End Date Time" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-12">
                                <label for="_notes" class="label">Notes</label>
                                <textarea class="form-control form-control-lg" name="note" id="note" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" name="btn_create_appointment" id="btn_create_appointment" class="btn btn-primary" >Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->