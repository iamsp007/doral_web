<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/datapicker/datepicker3.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/my-style.css') }}">
      <title>Welcome to Doral</title>
   </head>
   <body>
      <!-- Header Section Start -->
      <header class="header">
         <div class="container">
            <div class="block">
               <div class="text-center">
                  <!-- Logo Start -->
                  <a href="index.html" title="Welcome to Doral">
                  <img src="{{ asset('assets/img/logo-blue.png') }}" alt="Welcome to Doral" class="img-width-75" srcset="{{ asset('assets/img/logo-white.svg') }}">
                  </a>
                  <!-- Logo End -->
               </div>
            </div>
         </div>
      </header>
      <!-- Header Section End -->
      <!-- Middle Section Start -->
      <section id="form-inner">
         <div class="middle">
         <div class="container">
            <div class="innerSpace mt-4">
               <h1 class="t1 fadeIn">EMPLOYEE PHYSICAL EXAMINATION REPORT</h1>
            </div>
            <div class="row">
               <div class="col-12 col-lg-12 col-sm-12 col-md-12">
                  <div class="lside card mt-3 mb-3">
                     <div class="food-20">
                        <div class=" ml-3">
                             <div class="row">
                                 <div class="col-lg-4">  <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customRadio4" name="example1">
      <label class="custom-control-label" for="customRadio4">Pre-Employment  Physical Assessment</label>
    </div> 
                                 </div>
                                 <div class="col-lg-3"> <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customRadio3" name="example1">
      <label class="custom-control-label" for="customRadio3">Annual Assessment
                                    </label>
    </div> 
                                 </div>
                                 <div class="col-lg-3">  <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customRadio2" name="example1">
      <label class="custom-control-label" for="customRadio2">Return to Work / LOA
                                    </label>
    </div> 
                                 </div>
                                 <div class="col-lg-2">
                                    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customRadio1" name="example1">
      <label class="custom-control-label" for="customRadio1">Other
 </label>
    </div> 
                                 </div>
                              </div>
                        
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="innerSpace">
               <h2 class="t1 fadeIn">AUTHORIZATION TO RELEASE INFORMATION</h2>
               <p class="text-left">I hereby authorize        <input type="" name="" class="form-control inline-style">                        to release all health information about me to cottage 
                  homecare services, Inc. 
               </p>
            </div>
            <p class="text-right">Employee Signature        <input type="" name="" class="form-control inline-style">                       
            </p>
         </div>
         <!-- information text -->
         <div class="container mt-3">
            <div class="card">
               <h2>DEMOGRAPHIC INFORMATION</h2>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="First Name" name=""></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="Last Name" name=""></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"> <div class="form-group datea">
                              <div class="input-group date">
                                 <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                              </div>
                           </div></div>
                  </div>
                 
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="Email Id" name=""></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <select class="form-control">
                           <option>Gender</option>
                           <option>Male</option>
                           <option>Female</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <select class="form-control">
                           <option>Marital Status </option>
                           <option>Married </option>
                           <option>Widowed </option>
                           <option>Separated </option>
                           <option>Divorced  </option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="SSN Number" name=""></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="Address" name=""></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container mt-3" id="formdive">
            <div class="">
               <h2>DEMOGRAPHIC INFORMATION</h2>
               <div class="row">
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label>HT:</label><input type="text" class="form-control" placeholder="HT:" name="">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group"><label>WT:</label><input type="text" class="form-control" placeholder="WT:" name=""></div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group"><label>B/P:</label><input type="text" class="form-control" placeholder="B/P:" name=""></div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group"><label>PULSE:</label><input type="text" class="form-control" placeholder="PULSE" name=""></div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group"><label>RESP:</label><input type="text" class="form-control" placeholder="RESP:" name=""></div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group"><label>TEMP:</label><input type="text" class="form-control" placeholder="TEMP:" name=""></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container" id="formdivea">
            <div class="" id="accordionExample-form">
               <div class="bs-example" id="PHYSICAN">
                  <div class="accordion" id="accordionExample">
                     <div class="">
                        <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                              <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><span>PHYSICAN CONDITION</span>  <i class="fa fa-angle-right"></i></button>                                   
                           </h2>
                        </div>
                       
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                       <label>Head/ENT:</label><input type="text" class="form-control" placeholder="Head/ENT:" name="">
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Eyes:</label><input type="text" class="form-control" placeholder="Eyes:" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Neck:</label><input type="text" class="form-control" placeholder="Neck:" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Breats:</label><input type="text" class="form-control" placeholder="Breats" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Lungs:</label><input type="text" class="form-control" placeholder="Lungs:" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Cardiovascular:</label><input type="text" class="form-control" placeholder="Cardiovascular:" name=""></div>
                                 </div>
                                  <div class="col-lg-4">
                                    <div class="form-group"><label>Muscular/Skeletal:</label><input type="text" class="form-control" placeholder="Muscular/Skeletal" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Abdomen:</label><input type="text" class="form-control" placeholder="Abdomen:" name=""></div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group"><label>Genitourinary:</label><input type="text" class="form-control" placeholder="Genitourinary:" name=""></div>
                                 </div>
                                   <div class="col-lg-4">
                                    <div class="form-group"><label>Neurological:</label><input type="text" class="form-control" placeholder="Neurological:" name=""></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="card-header" id="headingThree">
                           <h2 class="mb-0">
                              <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">EXPERIENCING ANY OF THE SYMPTOMS BELOW? <i class="fa fa-angle-right"></i></button>                     
                           </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                           <div class="card-body" id="comment">
                              <div class=" ml-3">
                                 <div id="checkbox">
                                    <div class="row">
                                       <div class="col-lg-3">
                                           <label for="chkPassport" class="containera">
                           <input type="checkbox"  id="chkPassport">
                            <span class="checkmark"></span>
                           Weakness
                      </label>
                       <hr />
                           <div id="dvPassport" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber"  class="form-control" />
                           </div>

                                        
                                       </div>
                                        <div class="col-lg-3">
                                           <label for="chkPassporta" class="containera">
                           <input type="checkbox"  id="chkPassporta">
                            <span class="checkmark"></span>
                        Fatigue
                      </label>
                       <hr />
                           <div id="dvPassporta" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber"  class="form-control" />
                           </div>

                                        
                                       </div>
                                        <div class="col-lg-3"> <label for="chkPassportlb" class="containera">
                           <input type="checkbox"  id="chkPassportlb">
                            <span class="checkmark"></span>
                           Lack of Appetie
                      </label>
                       <hr />
                           <div id="dvPassportlb" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>
                                       </div>
                                       <div class="col-lg-3">
                                            <label for="chkPassportb" class="containera">
                           <input type="checkbox"  id="chkPassportb">
                            <span class="checkmark"></span>
                           Weight Loss
                      </label>
                       <hr />
                           <div id="dvPassportb" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber"  class="form-control" />
                           </div>

                                       </div>
                                       <div class="col-lg-3">   <label for="chkPassportk" class="containera">
                           <input type="checkbox"  id="chkPassportk">
                            <span class="checkmark"></span>
                         Chest Pains
                      </label>
                       <hr />
                           <div id="dvPassportk" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber"  class="form-control" />
                           </div>

                                        
                                       </div>
                                       <div class="col-lg-3">
                                           <label for="chkPassportu" class="containera">
                           <input type="checkbox"  id="chkPassportu">
                            <span class="checkmark"></span>
                          Fever
                      </label>
                       <hr />
                           <div id="dvPassportu" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>

                                       </div>
                                       <div class="col-lg-3"> 
                                                <label for="chkPassportn" class="containera">
                           <input type="checkbox"  id="chkPassportn">
                            <span class="checkmark"></span>
                        Persistent Cough
                      </label>
                       <hr />
                           <div id="dvPassportn" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>

                                       </div>
                                       <div class="col-lg-3">  <label for="chkPassportaa" class="containera">
                           <input type="checkbox"  id="chkPassportaa">
                            <span class="checkmark"></span>
                          Night Sweats
                      </label>
                       <hr />
                           <div id="dvPassportaa" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>

                                       </div>
                                       <div class="col-lg-3">  <label for="chkPassportl" class="containera">
                           <input type="checkbox"  id="chkPassportl">
                            <span class="checkmark"></span>
                         Shortness of Breath
                      </label>
                       <hr />
                           <div id="dvPassportl" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>
                                       </div>
                                       <div class="col-lg-3">
                                         <label for="chkPassportla" class="containera">
                           <input type="checkbox"  id="chkPassportla">
                            <span class="checkmark"></span>
                       Blood-Streaked Sputum
                      </label>
                       <hr />
                           <div id="dvPassportla" style="display: none" class="mb-3">
                             
                               <input type="text" id="txtPassportNumber" value="Add comment"  class="form-control" />
                           </div>
                                       </div>
                                      
                                     
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- last section -->
         <div class="container">
            <div class="innerSpace">
               <h2 class="t1 fadeIn">EMPLOYEE PHYSICAL EXAMINATION REPORT <br><span class="grey">LABORATORY RESULYS 
                  (ALL LAB REPORTS AND RESULTS MUST BE ATTACHED)</span>
               </h2>
               <div class="text-center">
                  <button id="btnAddRow" type="button" class="btn- btn-primary btn-pr">
                  Add new Result
                  </button>
                  <button id="btnDelLastRow" type="button" class="btn- btn-primary btn-pr">
                  Delete Last Result
                  </button>
               <!--    <button id="btnDelCheckRow" type="button" class="btn- btn-primary btn-pr">
                  Delete Checked Result
                  </button> -->
               </div>
               <div class="mb-5">
               <table id="tblAddRow" class="mt-3" border="1">
                  <thead>
                     <tr>
                        <th>
                           <div id="checkbox">
                              <label class="containera">
                              <input type="checkbox" checked="checked" id="checkedAll">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                        </th>
                        <th>Test</th>
                        <th>Date Performed</th>
                        <th>Results</th>
                        <th>LAB Value</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div id="checkbox">
                              <label class="containera">
                              <input type="checkbox" checked="checked">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                        </td>
                        <td>
                           <input name="txtName[]" value="123" />
                        </td>
                        <td>
                           <div class="form-group datea">
                              <div class="input-group date">
                                 <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                              </div>
                           </div>
                        </td>
                        
                         <td>
                          <select class="form-control"><option>Immune</option>
                           <option>None Immune</option></select>
                        </td>
                        <td>
                           <input name="txtCity[]" value="123456" />
                        </td>
                     </tr>
                       <tr>
                        <td>
                           <div id="checkbox">
                              <label class="containera">
                              <input type="checkbox" checked="checked">
                              <span class="checkmark"></span>
                              </label>
                           </div>
                        </td>
                        <td>
                           <input name="txtName[]" value="123" />
                        </td>
                        <td>
                           <div class="form-group datea">
                              <div class="input-group date">
                                 <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                              </div>
                           </div>
                        </td>
                         <td>
                          <select class="form-control"><option>Immune</option>
                           <option>None Immune</option></select>
                        </td>
                        <td>
                           <input name="txtCity[]" value="123456" />
                        </td>
                       
                     </tr>
                  </tbody>
               </table>
           </div>
            </div>
         </div>
         <div class="container mb-4">
            <div class="card" id="cont-a">
            <div class="row">
               
                          <div id="checkbox">
                              <div class="row">
                                 <div class="col-lg-12"> <div class="card-a"><label class="containera">This individual is free from any health impairment that is a potential risk to the patient or another employee of which may interfere with the performance of his/her duties including the habituation or addiction to drugs or alcohol.        <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                    </label>
                                 </div>
                             </div>
                                 <div class="col-lg-12"><div class="card-a"><label class="containera">This individual is able to work with the following limitations<br>
                                   <span> It is a long established fact fact that a reader will be by the the readable content of a page.</span>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                 </div>  </div>
                                 <div class="col-lg-12"> <div class="card-a"><label class="containera">Return to Work This individual is NOT physically/mentally able to work (specify reason)<br>
                               <span style="display: block;"> I    It is a long established fact fact that a reader will be by the the readable content of a page.</span>
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                    </label>
                                 </div>  </div>
                               
                              </div>
                           </div>
               
             
         </div></div>
         </div>
          <div class="container mb-5">
            <div class="innerSpace">
               <h2 class="t1 fadeIn">PHYSICAL DETAILS</span>
               </h2>
               <div class="row">
              <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="Physician  Name " name=""></div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group"><input type="text" class="form-control" placeholder="Physician License No" name=""></div>
                  </div>
               </div>
                  <div class="row">
              <div class="col-lg-6">
               <div class="card">
                     <p>Physician  Date & Signeture</p><div class="cardb"> </div>
                  </div>
               </div>
                  <div class="col-lg-6">
                      <div class="card">
                     <p>Physician Stamp</p><div class="cardb"> </div>
                  </div>
                  </div>
               </div>
               <div class="text-center mt-3">
               <button class="btn-pr text-center mt-2">Submit</button>
            </div>
            </div>
         </div>
      </section>
      <!-- Middle Section End -->
      <!-- Footer Section End -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/datapicker/bootstrap-datepicker.js') }}"></script>  
 
      <script>
         $(document).ready(function(){
             // Add down arrow icon for collapse element which is open by default
             $(".collapse.show").each(function(){
                 $(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-right");
             });
             
             // Toggle right and down arrow icon on show hide of collapse element
             $(".collapse").on('show.bs.collapse', function(){
                 $(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
             }).on('hide.bs.collapse', function(){
                 $(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
             });
         });
         
         // Add button Delete in row
         $('tbody tr')
         .find('td')
         //.append('<input type="button" value="Delete" class="del"/>')
         .parent() //traversing to 'tr' Element
         .append('<td class="text-center"><a href="#" class="delrow btn-pr">Delete Row</a></td>');
         
         // For select all checkbox in table
         $('#checkedAll').click(function (e) {
         //e.preventDefault();
         $(this).closest('#tblAddRow').find('td input:checkbox').prop('checked', this.checked);
         });
         
         // Add row the table
         $('#btnAddRow').on('click', function() {
         var lastRow = $('#tblAddRow tbody tr:last').html();
         //alert(lastRow);
         $('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
         $('#tblAddRow tbody tr:last input').val('');
         });
         
         // Delete last row in the table
         $('#btnDelLastRow').on('click', function() {
         var lenRow = $('#tblAddRow tbody tr').length;
         //alert(lenRow);
         if (lenRow == 1 || lenRow <= 1) {
             alert("Can't remove all row!");
         } else {
             $('#tblAddRow tbody tr:last').remove();
         }
         });
         
         // Delete row on click in the table
         $('#tblAddRow').on('click', 'tr a', function(e) {
         var lenRow = $('#tblAddRow tbody tr').length;
         e.preventDefault();
         if (lenRow == 1 || lenRow <= 1) {
             alert("Can't remove all row!");
         } else {
             $(this).parents('tr').remove();
         }
         });
         
         // Delete selected checkbox in the table
         $('#btnDelCheckRow').click(function() {
         var lenRow      = $('#tblAddRow tbody tr').length;
         var lenChecked  = $("#tblAddRow input[type='checkbox']:checked").length;
         var row = $("#tblAddRow tbody input[type='checkbox']:checked").parent().parent();
         //alert(lenRow + ' - ' + lenChecked);
         if (lenRow == 1 || lenRow <= 1 || lenChecked >= lenRow) {
             alert("Can't remove all row!");
         } else {
             row.remove();
         }
         });
                 var mem = $('.datea .input-group.date').datepicker({
                     todayBtn: "linked",
                     keyboardNavigation: false,
                     forceParse: false,
                     calendarWeeks: true,
                     autoclose: true
                 });
      </script>
      <script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
       $(function () {
        $("#chkPassporta").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassporta").show();
            } else {
                $("#dvPassporta").hide();
            }
        });
    });
        $(function () {
        $("#chkPassportb").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportb").show();
            } else {
                $("#dvPassportb").hide();
            }
        });
    });
         $(function () {
        $("#chkPassportc").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportc").show();
            } else {
                $("#dvPassportc").hide();
            }
        });
    });
          $(function () {
        $("#chkPassportd").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportd").show();
            } else {
                $("#dvPassportd").hide();
            }
        });
    });
           $(function () {
        $("#chkPassporte").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassporte").show();
            } else {
                $("#dvPassporte").hide();
            }
        });
    });
            $(function () {
        $("#chkPassportt").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportt").show();
            } else {
                $("#dvPassportt").hide();
            }
        });
    });
             $(function () {
        $("#chkPassportk").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportk").show();
            } else {
                $("#dvPassportk").hide();
            }
        });
    });
              $(function () {
        $("#chkPassportu").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportu").show();
            } else {
                $("#dvPassportku").hide();
            }
        });
    });
                 $(function () {
        $("#chkPassportn").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportn").show();
            } else {
                $("#dvPassportkn").hide();
            }
        });
    });
                     $(function () {
        $("#chkPassportla").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportla").show();
            } else {
                $("#dvPassportla").hide();
            }
        });
    });
                        $(function () {
        $("#chkPassportlb").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportlb").show();
            } else {
                $("#dvPassportlb").hide();
            }
        });
    });
                          $(function () {
        $("#chkPassportaa").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportaa").show();
            } else {
                $("#dvPassportaa").hide();
            }
        });
    });
                                   $(function () {
        $("#chkPassportlc").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportlc").show();
            } else {
                $("#dvPassportlc").hide();
            }
        });
    });
                        $(function () {
        $("#chkPassportl").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportl").show();
            } else {
                $("#dvPassportl").hide();
            }
        });
    });
</script>
   </body>
</html>