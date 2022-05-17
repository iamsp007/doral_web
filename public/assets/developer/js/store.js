/*add and edit user data*/
$("#add").on('click',function (e) {
    e.preventDefault();
    var t = $(this);
    if(val.form() != false) {
        var formdata = new FormData($("#frm")[0]);
        var url = $(this).attr("data-url");
        var redirecturl = $(this).attr("data-redirecturl");
       
        load();
        $.ajax({
            type:"POST", 
            url:url,
            data: formdata,
            contentType: false,
            processData: false,
            success:function (data) {
                if(data.status == 200) {
                    alertText(data.message,'success');
                 
                    if (data.data.action === 'ticket-edit') {
                        t.parents(".viewModelData").modal('hide');
                        refresh();
                    } else {
                        refresh();
                        setTimeout(function () {
                            location.href = redirecturl;
                        },2000);
                    }
                } else {
                    alertText(data.message,'error');
                }
                
                unload();
            },
            error:function () {
                alertText("Server Timeout! Please try again",'error');
                unload();
            }
        });
    } else {
        return false;
    }
});

$("#avatar").on('change', function() {
    profileimage(this);
});

function profileimage(input) {
    var fileTypes = ['jpg', 'jpeg', 'png'];
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase();
        isSuccess = fileTypes.indexOf(extension) > -1;
        if (isSuccess) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.s1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('.s1').css({'display':'none'});
        }
    }
}

window.onload = function(){
        
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("image");
        filesInput.addEventListener("change", function(event){
            var files = event.target.files; 
            var output = document.getElementById("result");

            for(var i = 0; i< files.length; i++)  {
                var file = files[i];
                
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    var div = document.createElement("div");
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    output.insertBefore(div,null);            
                });
               
                picReader.readAsDataURL(file);
            }                               
        });
    }
}

$("body").on('keypress','.phone_format',function(event) {
    if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
        event.preventDefault();
    }

    $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2-$3"));
});

function refresh() {
    $(document).find(".datatable").DataTable().ajax.reload(null, false);
}

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

// function load() {
//     $("#loader").css({"display" : "block", "opacity" : "1"});
// }

// function unload() {
//     $("#loader").css({"display" : "none", "opacity" : "0.05"});
// }

function load() {
    $("body").addClass("loading");
}

function unload() {
    $("body").removeClass("loading");
}

function refresh() {
    $(".datatable").DataTable().ajax.reload(null, false);
}
