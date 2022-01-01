<div class="tab-pane fade" id="patientCDOC" role="tabpanel" aria-labelledby="patientCDOC">
    <div class="app-card app-card-custom" data-name="patientCDOC">
        <div class="app-card-header">
            <h1 class="title">CDOC</h1>
            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt="" onclick="editAllField('patientCDOC')">
            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" style="display:none" data-toggle="tooltip" data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt="" onclick="updateAllField('patientCDOC')">
            
        </div>
        <div class="head">
            <form id="cdoc_form">
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <div class="p-3">
                    <!-- Emergency contact Detail -->
                    <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                        data-name="emergency_contact_detail">
                        @if(count($patient->userDevices) > 0 )
                            @php
                            $i = 1;
                            @endphp
                            @foreach($patient->userDevices as $key => $userDevice)
                                <input type="hidden" name="user_device_id" value="{{ $userDevice->id }}">
                                <div class="app-card-header">
                                    <h1 class="title">CDOC Detail {{$i++}}</h1>
                                </div>
                                <div class="main_div">
                                    <div class="p-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-portrait circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">CDOC Id</h3>
                                                            <input type="text" class="form-control-plaintext _detail " readonly name="doc_id[]" data-id="doc_id" placeholder="CDOC Id" value="{{ $userDevice->user_id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-user-nurse circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Device</h3>
                                                            <select class="form-control" name="device_id[]" data-id="device_id">
                                                                <option>Select a device</option>
                                                                <option value="1" {{ $userDevice->device_type == 1 ? "selected" : null }}>Blood Pressure</option>
                                                                <option value="2" {{ $userDevice->device_type == 2 ? "selected" : null }}>Glucometer</option>
                                                                <option value="3" {{ $userDevice->device_type == 3 ? "selected" : null }}>Digital Weight Machine</option>
                                                                <option value="4" {{ $userDevice->device_type == 4 ? "selected" : null }}>Pulse Oxymeter</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="app-card-header">
                                <h1 class="title">CDOC Detail 1</h1>
                            </div>
                            <div class="">
                                <div class="main_div">
                               
                                    <div class="p-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-portrait circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Name</h3>
                                                            <input type="text" class="form-control-plaintext _detail " readonly name="doc_id[]" data-id="doc_id" placeholder="CDOC Id" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-3">
                                                    <div class="input_box">
                                                        <div class="ls">
                                                            <i class="las la-phone circle"></i>
                                                        </div>
                                                        <div class="rs">
                                                            <h3 class="_title">Device</h3>
                                                            <select class="form-control" name="device_id[]" data-id="device_id">
                                                                <option>Select a device</option>
                                                                <option value="1">Blood Pressure</option>
                                                                <option value="2">Glucometer</option>
                                                                <option value="3">Digital Weight Machine</option>
                                                                <option value="4">Pulse Oxymeter</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="add_more_cdoc_div"></div>
                    </div>
                 
                    <button type="button" name="add" id="addDoc" class="btn btn-success">Add More CDOC Detail</button>
                    <!-- Emergency contact Detail -->
                </div>
            </form>
        </div>
    </div>
    <!-- patientCDOC End -->
</div>
