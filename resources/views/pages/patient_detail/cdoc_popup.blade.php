<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">CDOC Info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="add_cdoc_form">
            @csrf
            <input type="hidden" id="patient_id" name="patient_id" value="{{ $input['patient_id'] }}" >
            <input type="hidden" id="diagnosis_id" name="diagnosis_id" value="{{ $input['diagnosis_id'] }}" >
            <div class="modal-body">
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">
                            <label for="_title" class="label">CDOC Id</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" id="user_id" name="user_id" aria-describedby="_serviceHelp">
                            </div>
                        </div>                       
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">
                            <label for="_patient" class="label">Device</label>
                            <div class="input-group">
                                <select class="form-control" name="device_type" data-id="device_type">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn--submit btn-lg ">
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<script>

    /*@ Store / Update admin */
    validator = $(".add_cdoc_form").validate({
        rules:{
            icd_code: {required: true},
        },
        messages: {
            icd_code: {
                required: "Please select icd."
            },
        },
        errorPlacement: function(error, element) {
            var el_id = element.attr("name");
            $('#'+el_id+'-error').remove();
                if(element.hasClass('select2') && element.next('.select2-container').length) {
                 error.insertAfter(element.next('.select2-container'));
            } else {
                error.insertAfter(element);
            }
        },
        invalidHandler: function (event,validator) {
            
        },
        submitHandler: function (form,event) {
            event.preventDefault();

            var url = "{{ Route('cdoc.store') }}";
            alert(url);
            var fdata = new FormData($(".add_cdoc_form")[0]);
            $("#loader-wrapper").show();
            $.ajax({
                type:"POST",
                url:url,
                data:fdata,
                headers: {
                    'X_CSRF_TOKEN': '{{ csrf_token() }}',
                },
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.status == 400) {
                        alertText(data.message,'error');
                    } else {
                        alertText(data.message,'success');
                        $('.add_cdoc_form')[0].reset();
                        $(".messageViewModel").modal('hide');
                        
                        $(document).find("#employee-table").DataTable().ajax.reload(null, false);
                    }
                    $("#loader-wrapper").hide();
                },
                error: function() {
                    alertText("Server Timeout! Please try again",'warning');
                    $("#loader-wrapper").hide();
                }
            });
        }
    });
  
</script>