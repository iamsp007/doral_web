var base_url = $('#base_url').val();
$(document).ready(function (){
   $.ajax({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       url:patientRequestList,
       method:'POST',
       dataType:'json',
       success:function (response) {
           var html='<ul>';
           $.each(response,function (key,value) {
               var name='';
               if (value.patient_detail){
                   name=value.patient_detail.first_name+' '+value.patient_detail.last_name;
               }
               html+='' +
                   '<li>\n' +
                   '            <div class="app-card raduis_5 mt-2">\n' +
                   '                <div class="app-broadcasting">\n' +
                   '                    <div class="lside">\n' +
                   '                        <div>\n' +
                   '                            <img src="../assets/img/user/01.png" class="user_photo" alt=""\n' +
                   '                                 srcset="../assets/img/user/01.png">\n' +
                   '                        </div>\n' +
                   '                        <div class="content">\n' +
                   '                            <h1 class="_t11">'+name+'</h1>\n' +
                   '                            <p class="address">1797 Pitkin Avenue Brooklyn,\n' +
                   '                                NY 11212</p>\n' +
                   '                            <p class="emergency_contact mb-2"> Emergency Contact\n' +
                   '                                <a href="tel:9966246684" class="primary_tel">'+value.patient_detail.phone+'</a></p>\n' +
                   '                            <p class="contact"><a href="tel:8866246684" class="secondary_tel">'+value.patient_detail.phone+'</a>\n' +
                   '                            </p>\n' +
                   '                        </div>\n' +
                   '                        <div id="_dropdown">\n' +
                   '                            <div class="dropdown user-dropdown">\n' +
                   '                                <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"\n' +
                   '                                   aria-haspopup="true" aria-expanded="false" href="javascript:void(0)"><i\n' +
                   '                                        class="las la-ellipsis-v la-2x"/></a>\n' +
                   '                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">\n' +
                   '                                    <a class="dropdown-item" href="#">View Profile</a>\n' +
                   '                                </div>\n' +
                   '                            </div>\n' +
                   '                        </div>\n' +
                   '                    </div>\n'+
                   '                    <div class="rside">\n' +
                   '                        <div class="_lside">\n' +
                   '                            <ul class="specification">\n' +
                   '                                <li class="blood"><img src="../assets/img/icons/pressure.svg" class="mr-2"\n' +
                   '                                                       alt="">Blood Pressure : 250</li>\n' +
                   '                                <li class="sugar"><img src="../assets/img/icons/sugar.svg" class="mr-2"\n' +
                   '                                                       alt="">Blood Sugar : 250</li>\n' +
                   '                                <li class="caregiver" data-container="body" data-toggle="popover"\n' +
                   '                                    data-placement="top"\n' +
                   '                                    data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">\n' +
                   '                                    <img src="../assets/img/icons/caregiver.svg" class="mr-2"\n' +
                   '                                         alt="">Caregiver :&nbsp;<a title="8866246684"\n' +
                   '                                                                    href="javascript:void(0)" class="secondary_tel">Akshita</a></li>\n' +
                   '                            </ul>\n' +
                   '                        </div>\n' +
                   '                        <div class="_rside">\n' +
                   '                            <ul class="actionBar">\n' +
                   '                                <li>\n' +
                   '                                    <div class="search-clinician">\n' +
                   '                                        <input type="text" class="form-control clinician" name="animal"\n' +
                   '                                               id="searchField" placeholder="Assign Manually">\n' +
                   '                                    </div>\n' +
                   '                                </li>\n' +
                   '                                <li>\n' +
                   '                                    <button type="button" class="btn btn-start-call">Start\n' +
                   '                                        Call<span></span></button>\n' +
                   '                                </li>\n' ;

                  if (!value.clincial_id){
                      html+='                                <li>\n' +
                          '                                    <button type="button"\n' +
                          '                                            onclick="onStartBroadCast('+value.id+')"' +
                          '                                            class="btn btn-broadcast">Broadcast<span></span></button>\n' +
                          '                                </li>\n';
                  }else {
                      html+='                                <li>\n' +
                          '                                    <button type="button"\n' +
                          '                                            onclick="onRunningBroadCast('+value.id+')"\n' +
                          '                                            class="btn btn-broadcast">Running<span></span></button>\n' +
                          '                                </li>\n';
                  }

                   html+='                                <li>\n' +
                   '                                    <button type="button" class="btn btn-emergency">emergency\n' +
                   '                                        (911)<span></span></button>\n' +
                   '                                </li>\n' +
                   '                            </ul>\n' +
                   '                        </div>\n' +
                   '                    </div>\n' +
                   '                </div>\n' +
                   '            </div>\n' +
                   '        </li>' +
                   '';
           });
           html+='</ul>';
           $('#patient-request').html(html);
       },
       error:function (error) {
           console.log(error)
       }
   })
});

function onStartBroadCast(id) {
    window.location.href=base_url+'clinician/start-roadl';
}

function onRunningBroadCast(id) {
    window.location.href=base_url+'clinician/start-roadl';
}
