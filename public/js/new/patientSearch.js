$(document).ready(function () {

    var _autocomplete = new SelectPure(".autocomplete-selectrole", {
        options: [
            {
                label: "Admin",
                value: "admin",
            },
            {
                label: "Clinician",
                value: "clinician",
            },
            {
                label: "Coordinator",
                value: "coordinator",
            },
            {
                label: "Partners",
                value: "partners",
            },
            {
                label: "Patient",
                value: "patient",
            },
            {
                label: "Referral",
                value: "referral",
            },
            {
                label: "Supervisor",
                value: "supervisor",
            }
        ],
        value: ["admin"],
        multiple: true,
        autocomplete: true,
        icon: "las la-times",
        onChange: value => { console.log(value); },
        classNames: {
            select: "select-pure__select",
            dropdownShown: "select-pure__select--opened",
            multiselect: "select-pure__select--multiple",
            label: "select-pure__label",
            placeholder: "select-pure__placeholder",
            dropdown: "select-pure__options",
            option: "select-pure__option",
            autocompleteInput: "select-pure__autocomplete",
            selectedLabel: "select-pure__selected-label",
            selectedOption: "select-pure__option--selected",
            placeholderHidden: "select-pure__placeholder--hidden",
            optionHidden: "select-pure__option--hidden",
        }
    });
    var autocomplete = new SelectPure(".autocomplete-permission", {
        options: [
            {
                label: "Add",
                value: "add",
            },
            {
                label: "Edit",
                value: "edit",
            },
            {
                label: "Delete",
                value: "delete",
            },
            {
                label: "Update",
                value: "update",
            },
            {
                label: "View",
                value: "view",
            }
        ],
        value: ["add"],
        multiple: true,
        autocomplete: true,
        icon: "las la-times",
        onChange: value => { console.log(value); },
        classNames: {
            select: "select-pure__select",
            dropdownShown: "select-pure__select--opened",
            multiselect: "select-pure__select--multiple",
            label: "select-pure__label",
            placeholder: "select-pure__placeholder",
            dropdown: "select-pure__options",
            option: "select-pure__option",
            autocompleteInput: "select-pure__autocomplete",
            selectedLabel: "select-pure__selected-label",
            selectedOption: "select-pure__option--selected",
            placeholderHidden: "select-pure__placeholder--hidden",
            optionHidden: "select-pure__option--hidden",
        }
    });
    var resetAutocomplete = function () {
        _autocomplete.reset();
        autocomplete.reset();
    };
    var patientName = $('[name="patientName"]'),
        ssn = $('[name="ssn"]'),
        dobs = $('[name="dob"]'),
        city = $('[name="city"]'),
        state = $('[name="state"]'),
        statuss = $('[name="statuss"]'),
        servicess = $('[name="servicess"]'),
        zipp = $('[name="zipp"]'),
        others = $('[name="others"]')
    patientName.on('keyup', function () {
        if ("" == patientName.val()) {
            patientName.addClass('is-invalid')
            patientName.removeClass('is-valid')
        } else {
            patientName.removeClass('is-invalid')
            patientName.addClass('is-valid')
        }
    })
    ssn.on('keyup', function () {
        if ("" == ssn.val()) {
            ssn.addClass('is-invalid')
            ssn.removeClass('is-valid')
        } else {
            ssn.removeClass('is-invalid')
            ssn.addClass('is-valid')
        }
    })
    dobs.on('keyup', function () {
        if ("" == dobs.val()) {
            dobs.addClass('is-invalid')
            dobs.removeClass('is-valid')
        } else {
            dobs.removeClass('is-invalid')
            dobs.addClass('is-valid')
        }
    })
    dobs.on('change', function () {
        if ("" == dobs.val()) {
            dobs.addClass('is-invalid')
            dobs.removeClass('is-valid')
        } else {
            dobs.removeClass('is-invalid')
            dobs.addClass('is-valid')
        }
    })
    city.on('change', function () {
        if ("" == city.val()) {
            city.addClass('is-invalid')
            city.removeClass('is-valid')
        } else {
            city.removeClass('is-invalid')
            city.addClass('is-valid')
        }
    })
    state.on('change', function () {
        if ("" == state.val()) {
            state.addClass('is-invalid')
            state.removeClass('is-valid')
        } else {
            state.removeClass('is-invalid')
            state.addClass('is-valid')
        }
    })
    statuss.on('change', function () {
        if ("" == statuss.val()) {
            statuss.addClass('is-invalid')
            statuss.removeClass('is-valid')
        } else {
            statuss.removeClass('is-invalid')
            statuss.addClass('is-valid')
        }
    })
    servicess.on('change', function () {
        if ("" == servicess.val()) {
            servicess.addClass('is-invalid')
            servicess.removeClass('is-valid')
        } else {
            servicess.removeClass('is-invalid')
            servicess.addClass('is-valid')
        }
    })
    zipp.on('keyup', function () {
        if ("" == zipp.val()) {
            zipp.addClass('is-invalid')
            zipp.removeClass('is-valid')
        } else {
            zipp.removeClass('is-invalid')
            zipp.addClass('is-valid')
        }
    })
    others.on('keyup', function () {
        if ("" == others.val()) {
            others.addClass('is-invalid')
            others.removeClass('is-valid')
        } else {
            others.removeClass('is-invalid')
            others.addClass('is-valid')
        }
    })
    $("#doralPatientSearchForm").submit(function (event) {
        event.preventDefault()
        if ("" == patientName.val()) {
            patientName.addClass('is-invalid')
        }
        if ("" == ssn.val()) {
            ssn.addClass('is-invalid')
        }
        if ("" == dobs.val()) {
            dobs.addClass('is-invalid')
        }
        if ("" == city.val()) {
            city.addClass('is-invalid')
        }
        if ("" == state.val()) {
            state.addClass('is-invalid')
        }
        if ("" == statuss.val()) {
            statuss.addClass('is-invalid')
        }
        if ("" == servicess.val()) {
            servicess.addClass('is-invalid')
        }
        if ("" == zipp.val()) {
            zipp.addClass('is-invalid')
        }
        if ("" == others.val()) {
            others.addClass('is-invalid')
        }
        if ("" != dobs.val()) {
            dobs.removeClass('is-invalid')
            dobs.addClass('is-valid')
        }
    });
    var datepicker = $('#datepicker'),
        addPatientToggle = $('#addPatientToggle'),
        _addPermission = $('._addPermission'),
        close_add_permission = $('.close_add_permission'),
        doralPatientToggle = $('#doralPatientToggle'),
        _searchDoralPatients = $('._searchDoralPatients'),
        close_search_doral_patient = $('.close_search_doral_patient'),
        _open_search_patient = $('._open_search_patient'),
        _open_add_permission = $('._open_add_permission');
    $('#patientResult').DataTable({
        searching: false,
        ordering: false
    });
    $(".selectall").click(function () {
        $('#patientResult td input:checkbox').not(this).prop('checked', this.checked);
    });
    datepicker.datepicker();
    datepicker.on('changeDate', function () {
        $('#my_hidden_input').val(
            $('#datepicker').datepicker('getFormattedDate')
        );
    });
    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoUpdateInput: false,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'), 10),
    }, function (start, end, label) {
        $('input[name="dob"]').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY'));
            $('input[name="dob"]').attr("value", picker.startDate.format('MM/DD/YYYY'));
        });
    });
    // Add Permission Show/Hide Script Start Here
    addPatientToggle.on('click', function () {
        _addPermission.removeClass('d-none')
        _addPermission.removeClass('slidein');
        _addPermission.addClass('slideout');
    })
    close_add_permission.on('click', function () {
        _addPermission.addClass('slidein');
        _addPermission.removeClass('slideout');
    })
    _open_search_patient.on('click', function () {
        _addPermission.addClass('slidein');
        _addPermission.removeClass('slideout');
        setTimeout(() => {
            _searchDoralPatients.removeClass('d-none')
            _searchDoralPatients.removeClass('slidein');
            _searchDoralPatients.addClass('slideout');
        }, 1000);
    })
    // Add Permission Show/Hide Script Start Here
    // Search Doral Patient Show/Hide Script Start Here
    doralPatientToggle.on('click', function () {
        _searchDoralPatients.removeClass('d-none')
        _searchDoralPatients.removeClass('slidein');
        _searchDoralPatients.addClass('slideout');
    })
    close_search_doral_patient.on('click', function () {
        _searchDoralPatients.addClass('slidein');
        _searchDoralPatients.removeClass('slideout');
    })
    _open_add_permission.on('click', function () {
        _searchDoralPatients.addClass('slidein');
        _searchDoralPatients.removeClass('slideout');
        setTimeout(() => {
            _addPermission.removeClass('d-none')
            _addPermission.removeClass('slidein');
            _addPermission.addClass('slideout');
        }, 1000);
    })
    // Search Doral Patient Show/Hide Script End Here


    var patientResult = $('#patientResultTable').DataTable({
        searching: false,
        "processing": true,
        "language": {
            processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
        },
        "serverSide": true,
        ajax: base_url+'all-patient-list',
        columns:[
            {data:'id',name:'id'},
            {data:'id',name:'id',"bSortable": true},
            {
                data:'full_name',
                name:'first_name',
                "bSortable": true,
                render:function(data, type, row, meta){
                    return '<a href="'+base_url+'patient-details/'+row.id+'">'+data+'</a>';
                }
            },
            {
                data:'patient_detail.ssn',
                name:'patient_detail.ssn',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'dob',
                name:'dob',
                "bSortable": true,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'patient_detail.service.name',
                name:'patient_detail.service.name',
                "bSortable": false
            },
            {
                data:'gender_name',
                name:'gender_name',
                "bSortable": false,
            },
            {
                data:'patient_detail.address_1',
                name:'patient_detail.address_1',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'patient_detail.city',
                name:'patient_detail.city',
                "bSortable": false,
                render:function (data, type, row, meta) {
                    if (row.patient_detail){
                        return row.patient_detail.city+ ' - '+row.patient_detail.state;
                    }
                    return '-';
                }
            },
            {
                data:'patient_detail.Zip',
                name:'patient_detail.Zip',
                "bSortable": false,
                render:function(data, type, row, meta){
                    if (data){
                        return data;
                    }
                    return '--';
                }
            },
            {
                data:'id',
                name:'id',
                "bSortable": true,
                render:function(data, type, row, meta){
                    return ' <div class="d-flex justify-content-end">\n' +
                        '                                    <button type="button" class="btn btn--active btn--fixed--w mr-2">Active</button>\n' +
                        '                                    <button type="button" class="btn btn--call mr-2">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/call.svg" class="actives" alt="" srcset="">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/active_call.svg" class="inactives" alt=""\n' +
                        '                                             srcset="">\n' +
                        '                                    </button>\n' +
                        '                                    <button type="button" class="btn btn--video mr-2">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/video.svg" class="actives" alt="" srcset="">\n' +
                        '                                        <img src="'+base_url+'new/assets/img/icons/active_video.svg" class="inactives" alt=""\n' +
                        '                                             srcset=""></button>\n' +
                        '                                    <button type="button" class="btn btn--dark" onclick="onBroadCastOpen('+row.id+')">Rodal Start</button>\n' +
                        '                                </div>';
                }
            },
        ],
        "order": [[ 1, "desc" ]],
        "pageLength": 10,
        "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ],
        'columnDefs': [
            {
                targets: 0,
                'searchable': false,
                'orderable': false,
                'width': '1%',
                'className': 'dt-body-center',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox">';
                }
            }
        ],
        'select': {
            'style': 'multi'
        },
    });

    patientResult.on( 'draw', function () {
        $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
    });
})
