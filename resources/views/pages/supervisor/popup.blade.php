<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content assign-clinician">
        <div class="modal-header">
            <h5 class="modal-title" id="CaseManagementModalLabel">Assign Clinician</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="frm" style="margin: 15px;">
            @csrf
            <input type="hidden" value="{{ $patient_id }}" name="patient_id" id="patient_id">
            <input type="hidden" value="" name="clinician_id" id="clinician_id"/>

            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 p-3">
                        <div>
                            <select class="clinician_name form-control select2_dropdown" id="clinician_name" name="clinician_name"></select>
                        </div>
                        <div class="mt-4">
                            <h1 class="title">Choose Clinician ({{$total}})</h1>
                        </div>
                        <div class="mt-2 clinician_listing">
                            <ul class="listing_clinician">
                                @foreach($clinicians as $clinician)
                                    <li>
                                        <a href="javascript:void(0)" id="abc" class="appoinment-card" data-li-value="1" data-id="{{ $clinician->id }}">
                                            <div class="lside">
                                                <img src="{{ asset('assets/img/user/avatar.jpg') }}" alt=""
                                                    srcset="{{ asset('assets/img/user/avatar.jpg') }}" class="user">
                                            </div>
                                            <div class="rside">
                                                <h1 class="t7" id="t7" data-name="name" >{{$clinician->full_name}}</h1>
                                                <!-- <p>05/10/2020, 01:00PM to 02:00PM</p> -->
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="add" class="btn btn-primary" data-url="{{ Route('add-case-management') }}" data-redirecturl="{{ Route('supervisor.patients')}}" data-action="ticket-update">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

    $('#clinician_name').select2({
        minimumInputLength: 3,
        placeholder: 'Select a name',
        ajax: {
            type: "POST",
            url: "{{ route('clinician.get-user-data') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.first_name + ' ' + item.last_name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
    
    /*add and edit user data*/
    $("#add").on('click',function (e) {
        e.preventDefault();
        var t = $(this);
            
        var formdata = new FormData($("#frm")[0]);
            var url = $(this).attr("data-url");
            var redirecturl = $(this).attr("data-redirecturl");
        
            $("#loader-wrapper").show();
            $.ajax({
                type:"POST", 
                url:url,
                data: formdata,
                contentType: false,
                processData: false,
                success:function (data) {
                    if(data.status == 200) {
                        alertText(data.message,'success');
                    
                        setTimeout(function () {
                            location.href = redirecturl;
                        },2000);
                    } else {
                        alertText(data.message,'error');
                    }
                    
                    $("#loader-wrapper").hide();
                },
                error:function () {
                    alertText("Server Timeout! Please try again",'error');
                    $("#loader-wrapper").hide();
                }
            });
    });

    function alertText(text,status) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: status,
            title: text
        })
    }

    $(document).on('click', '.appoinment-card', function () {
        var clinician_id = $(this).attr("data-id");

        $(document).find("#clinician_id").val(clinician_id);
        $(document).find(".appoinment-card").removeClass("selected");
        $(this).addClass("selected");
    });

    $(document).on('change', '#clinician_name', function () {
        var temp = $(this);
        var item_type_is = temp.val();
        
        if (item_type_is != "") {
            $.ajax({
                type: "GET",
                url: "{{url('supervisor/get-clinician')}}/" + item_type_is,
                dataType: "JSON",
                success: function (data) {
                    console.log(data.result);
                    // temp.parents('tr').find('.selectedCityState').css({"display" : "block"});
                    // temp.parents('tr').find('.selectedCity').css({"display" : "none"});
                    // temp.parents('tr').find('.cityStateValue').html('');
                    // if (data.status == 200) {
                        
                    //     if (data.result != '') {
                            
                    //         $.each(data.result, function (key, value) {
                    //             var id = value['state_code'];
                    //             var name = value['city'];
                    //             temp.parents('tr').find('.cityStateValue').append('<option value="' + name + '">' + name + '</option>');
                    //         });
                    //     }
                    // }
                    
                },
            });
        } 
    });

    $(document).on('change', '#clinician_name', function () {
            var temp = $(this);
            var item_type_is = temp.val();
        
            if (item_type_is != "") {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-clinician')}}/" + item_type_is,
                    dataType: "JSON",
                    success: function (data) {
                        temp.parents('tr').find('.selectedStateCity').css({"display" : "block"});
                        temp.parents('tr').find('.selectedState').css({"display" : "none"});
                        temp.parents('tr').find('.stateCityValue').html('');

                        temp.parents('tr').find('.stateValue').html('');
                        if (data.status == 200) {
                            if (data.result != '') {
                                $.each(data.result, function (key, value) {
                                    var id = value['state_code'];
                                    var name = value['state'];
                                    temp.parents('tr').find('.stateCityValue').append('<option value="' + name + '">' + name + '</option>');
                                });
                            }
                        }
                      
                    },
                });
            } 
        });
</script>