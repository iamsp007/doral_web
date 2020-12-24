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

    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputPassword1">Patient</label>
        <input type="text" class="form-control" id="service_id" name="patient_id" placeholder="Patient">
    </div> -->
    <!-- <div class="form-group">
        <label for="exampleInputPassword1">Provider PA / MA</label>
        
        <input type="text" class="form-control" id="provider1" name="provider1" placeholder="Provider PA/ MA">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Provider</label>
        <input type="text" class="form-control" id="provider2" name="provider2" placeholder="Provider">
    </div> -->
    <div class="form-group">
        <label for="exampleInputPassword1">Serivce</label>        
        <select id="service_id" name="service_id" placeholder="Provider" class="form-control" >
            @if( count( $services ) )
                @foreach( $services AS $service_key => $service )
                    <option value="{{ $service['id'] }}" >{{ $service['name'] }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Start DateTime</label>
        <input type="text" id="start_datetime" name="start_datetime"  value="{{ $start }}" readonly="readonly" class="form-control" placeholder="Appointment Start Date Time">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">End DateTime</label>
        <input type="text" id="end_datetime" name="end_datetime"  value="{{ $end }}" readonly="readonly" class="form-control" placeholder="End Date Time">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Note</label>
        <textarea type="text" class="form-control" id="note" name="note" placeholder="Note" rows="3" cols="50"></textarea>
    </div>
   
    <button type="submit" name="btn_create_appointment" id="btn_create_appointment" class="btn btn-primary">Submit</button>
</form>