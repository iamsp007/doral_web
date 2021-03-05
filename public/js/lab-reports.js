var selectRole;
var reportable;
$(document).ready(function() {

    reportable = $('#reportTable').DataTable({
        "processing": true,
        "language": {
            processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
        },
        "serverSide": true,
        ajax: {
            url:lab_report_data_url,
            type:'POST',
            data:{
                patient_id: patient_id,
                '_token':$('meta[name=csrf_token]').attr("content")
            }
        },
        columns:[
            {name:"id",data:"id"},
            {name:"reports.name",data:"reports.name"},
            {name:"file_name",data:"file_name"},
            {name:"original_file_name",data:"original_file_name"},
            {
                name:"id",
                data:"id",
                render:function (row) {

                    return '<div class="d-flex">\n' +
                        '                    <button type="button"\n' +
                        '                            class="btn btn-outline-green mr-2"\n' +
                        '                            data-toggle="tooltip" data-placement="top"\n' +
                        '                            title="Download Report" style="width: auto;"><i\n' +
                        '                            style="font-size: 25px;"\n' +
                        '                            class="las la-cloud-download-alt"></i></button>\n' +
                        '                    <button type="button" class="btn btn-outline-green"\n' +
                        '                            data-toggle="tooltip" data-placement="top"\n' +
                        '                            title="Delete Report" style="width: auto;"><i\n' +
                        '                            style="font-size: 25px;"\n' +
                        '                            class="las la-trash"></i></button>\n' +
                        '                </div>';
                }
            },
        ],
        "order": [[ 1, "desc" ]],
        'columnDefs': [
            {
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ],
        'select': {
            'style': 'multi'
        },
    });
    reportable.on( 'draw', function () {
        $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
    });
});

var myDropzone = new Dropzone("#dropzone-file-lab-report", {
    url:lab_report_upload_url,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    method:'POST',
    params:{
        lab_report_id:$('#selectRole').find(":selected").val(),
        patient_id:patient_id,
    },
    maxFiles: 10,
    autoProcessQueue: false,
    progress:true,
    accept: function(file, done) {
        done();
    },
    init: function() {
        this.on("maxfilesexceeded", function(file){
            var msgEl = $(file.previewElement).find('.dz-error-message');
            msgEl.text('Only one file allowed');
            msgEl.show();
            msgEl.css("opacity", 1);
            return false
        });
        this.on("success", function(file, responseText) {
            var msgEl = $(file.previewElement).find('.dz-success');
            msgEl.text(responseText.message?responseText.message:responseText);
            msgEl.show();
            msgEl.css("opacity", 1);
            reportable.ajax.reload();
            $('#uploadLabReportModal').modal('hide');
        });
    },
    paramName: 'files',
    acceptedFiles: ".doc,.xlsx,.csv",
    addRemoveLinks: true,
    error:function (file, error) {
        if (file && error) {
            var msgEl = $(file.previewElement).find('.dz-error-message');
            msgEl.text(error.message?error.message:error);
            msgEl.show();
            msgEl.css("opacity", 1);
        }else {
            var msgEl = $(file.previewElement).find('.dz-error-message');
            msgEl.text(error);
            msgEl.show();
            msgEl.css("opacity", 1);
        }
    }
});

function uploadLabReport(e) {
    myDropzone.options.params.lab_report_id=$('#selectRole').find(":selected").val();
    myDropzone.processQueue();
    reportable.ajax.reload();
}

function viewLabReports() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'view-lab-report',
        method:"POST",
        dataType: 'json',
        data:{
            patient_id:patient_id
        },
        success:function (response) {
            var sources = response.data;
            var html='<div class="row">';
            sources.map(function (value) {
                console.log(value)
                var img = base_url+'assets/img/All Banner copy.docx.png';
                html+='<div class="col-12 col-sm-2 mt-4">\n' +
                    '                                   <div class="card shadow-sm">\n' +
                    '                                       <div class="card-body">\n' +
                    '                                           <img class="img-fluid" alt="" jsaction="load:G7tQM" data-drive-wiz-load-handling=""\n' +
                    '                                                src="'+img+'">\n' +
                    '                                       </div>\n' +
                    '                                       <div class="card-footer file-footer">\n' +
                    '                                           <a href="javascript:void(0)" onclick="openDoc()"\n' +
                    '                                              class="d-flex align-items-center text-success">\n' +
                    '                                               <i class="lar la-file-pdf la-2x"></i> '+value.original_file_name+'\n' +
                    '                                           </a>\n' +
                    '                                           <div>\n' +
                    '                                               <div class="dropdown">\n' +
                    '                                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button"\n' +
                    '                                                           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"\n' +
                    '                                                           aria-expanded="false">\n' +
                    '                                                       <i class="las la-ellipsis-v"></i>\n' +
                    '                                                   </button>\n' +
                    '                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\n' +
                    '                                                       <a class="dropdown-item" href="#">Download File</a>\n' +
                    '                                                       <a class="dropdown-item" data-toggle="modal" data-target="#docViewerModal"\n' +
                    '                                                          href="'+value.file_name+'">View Details</a>\n' +
                    '                                                   </div>\n' +
                    '                                               </div>\n' +
                    '                                           </div>\n' +
                    '                                       </div>\n' +
                    '                                   </div>\n' +
                    '                               </div>';
            })
            html+'</div>';
            $('#view-lab-report-file').html(html);
        },
        error:function (error) {
            console.log(error)
        }

    });
}

function openLabReports() {
    $.ajax({
        url:lab_referral_url,
        method:"GET",
        dataType: 'json',
        success:function (response) {
            var sources = response.data;
            $('#selectRole').html('');
            var html='<option value="">Select Type</option>';
            $.each(sources,function (key, value) {
                html+='<option value="'+value.id+'">'+value.name+'</option>';
            })
            $('#selectRole').html(html);
        },
        error:function (error) {
            console.log(error)
        }

    });
}
