<div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Patient Diagnosis Info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="add_icd_form">
            @csrf
            <input type="hidden" id="patient_id" name="patient_id" value="{{ $id }}" >
            <input type="hidden" id="section" name="section" value="icd-add" >
            <div class="modal-body">
                <div class="form-group">
                    <div class="row gutter">

                        <div class="col-12 col-sm-12">
                            <label for="_title" class="label">ICD</label>
                            <div class="input-group">
                                <select name="icd_code" class="form-control select2 icd_code">
                                    <option value="">Select a icd code</option>
                                    @foreach($icdCodes as $icdCode)
                                        <option value="{{ $icdCode->id }}">{{ $icdCode->ICD10Code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                       
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">
                            <label for="_patient" class="label">Description</label>
                            <div class="input-group">
                                <textarea class="form-control form-control-lg" name="description" id="description" rows="5" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">
                            <label for="_service" class="label">Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" id="date" name="date" aria-describedby="_serviceHelp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">
                            <label for="_datetime" class="label">Date Type</label>
                            <div class="input-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="Onset" name="date_type">
                                    <label class="custom-control-label" for="Onset">
                                    Onset 
                                    </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="Exacerbation" name="date_type">
                                    <label class="custom-control-label" for="Exacerbation">
                                    Exacerbation 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-12">   
                            <label for="_notes" class="label">Historical as of</label>
                            <input type="text" class="form-control form-control-lg" id="historical_date" name="historical_date" aria-describedby="_serviceHelp">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-6">   
                            <label for="_notes" class="label">Identified During</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="Referral" name="identified_during">
                                <label class="custom-control-label" for="Referral">
                                Referral 
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="Assessment" name="identified_during">
                                <label class="custom-control-label" for="Assessment">
                                Assessment 
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row gutter">
                        <div class="col-12 col-sm-6">   
                            <label for="_notes" class="label">Primary</label>
                            <label for="chkPassport" class="containera">
                                <input type="checkbox" id="chkPassport" name="primary">
                                <span class="checkmark"></span>
                            </label>
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
    $('.icd_code').select2();

    $('input[name="date"], input[name="historical_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10)
    });
          
    /*@ Store / Update admin */
    validator = $(".add_icd_form").validate({
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

            var url = "{{ Route('icd.store') }}";
            var fdata = new FormData($(".add_icd_form")[0]);
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
                        $('.add_icd_form')[0].reset();
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