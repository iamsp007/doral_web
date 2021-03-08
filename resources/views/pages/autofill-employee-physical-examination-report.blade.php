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
      
      <form action="" method="post" enctype="multipart/form-data">
      @csrf
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
                                       <div class="col-lg-4">
                                          <div class="custom-control custom-radio">
                                              <input <?php if(isset($patient->pre_employment_physical_assessment)) { echo 'checked'; } ?> type="radio" class="custom-control-input" id="customRadio4" name="pre_employment_physical_assessment">
                                             <label class="custom-control-label" for="customRadio4">Pre-Employment  Physical Assessment</label>
                                          </div> 
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" class="custom-control-input" id="customRadio3" name="annual_assessment" <?php if(isset($patient->annual_assessment)) { echo 'checked'; } ?>>
                                             <label class="custom-control-label" for="customRadio3">
                                                Annual Assessment
                                             </label>
                                          </div>
                                       </div>
                                       <div class="col-lg-3">  <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="customRadio2" name="return_to_work_or_loa" <?php if(isset($patient->return_to_work_or_loa)) { echo 'checked'; } ?>>
                                          <label class="custom-control-label" for="customRadio2">
                                             Return to Work / LOA
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-lg-2">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="customRadio1" name="other" <?php if(isset($patient->other)) { echo 'checked'; } ?>>
                                          <label class="custom-control-label" for="customRadio1">
                                             Other
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
                     <p class="text-left">I hereby authorize<input type="text" name="name" value="{{ $patient->first_name.' '.$patient->last_name }}" class="form-control inline-style">to release all health information about me to Doral Health Connect. 
                     </p>
                  </div>
                  <p class="text-right">Employee Signature
                     <input type="text" name="employee_signature" class="form-control inline-style">                       
                  </p>
               </div>
               <!-- information text -->
               <div class="container mt-3">
                  <div class="card">
                     <h2>DEMOGRAPHIC INFORMATION</h2>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $patient->first_name }}">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $patient->last_name }}">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <div class="form-group datea">
                                 <div class="input-group date">
                                    <span class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" name="dob" value="{{ $patient->dob }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Email Id" name="email" value="{{ $patient->email }}">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <select class="form-control" name="gender">
                                 <option>Gender</option>
                                 <option value="1" {{ $patient->gender == 1 ? "selected" : null }}>Male</option>
                                 <option value="2" {{ $patient->gender == 2 ? "selected" : null }}>Female</option>
                                 <option value="3" {{ $patient->gender == 3 ? "selected" : null }}>Other</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <select class="form-control" name="marital_status">
                                 <option>Marital Status </option>
                                 <option>Married </option>
                                 <option>Widowed </option>
                                 <option>Separated </option>
                                 <option>Divorced  </option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group"><input type="text" class="form-control" placeholder="SSN Number" name="ssn" value="{{ $patient->detail->ssn }}"></div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group"><input type="text" class="form-control" placeholder="Address" name="address" value="{{ $patient->detail->address_full }}"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container mt-3" id="formdive">
                  <div class="">
                     <h2>VITAL INFORMATION</h2>
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>HT:</label>
                              <input type="text" class="form-control" placeholder="HT:" name="ht" value="{{ $patient->ht }}">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>WT:</label>
                              <input type="text" class="form-control" placeholder="WT:" name="wt" value="{{ $patient->wt }}">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>B/P:</label>
                              <input type="text" class="form-control" placeholder="B/P:" name="bp" value="{{ $patient->bp }}">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>PULSE:</label>
                              <input type="text" class="form-control" placeholder="PULSE" name="pulse" value="{{ $patient->pulse }}">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>RESP:</label>
                              <input type="text" class="form-control" placeholder="RESP:" name="resp" value="{{ $patient->resp }}">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>TEMP:</label>
                              <input type="text" class="form-control" placeholder="TEMP:" name="temp" value="{{ $patient->temp }}">
                           </div>
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
                                             <label>Head/ENT:</label>
                                             <input type="text" class="form-control" placeholder="Head/ENT:" name="head_ent" value="{{ $patient->head_ent }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Eyes:</label>
                                             <input type="text" class="form-control" placeholder="Eyes:" name="eyes" value="{{ $patient->eyes }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Neck:</label>
                                             <input type="text" class="form-control" placeholder="Neck:" name="neck" value="{{ $patient->neck }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Breats:</label>
                                             <input type="text" class="form-control" placeholder="Breats" name="breats" value="{{ $patient->breats }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Lungs:</label>
                                             <input type="text" class="form-control" placeholder="Lungs:" name="lungs" value="{{ $patient->lungs }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Cardiovascular:</label>
                                             <input type="text" class="form-control" placeholder="Cardiovascular:" name="cardiovascular" value="{{ $patient->cardiovascular }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Muscular/Skeletal:</label>
                                             <input type="text" class="form-control" placeholder="Muscular/Skeletal" name="muscular_skeletal" value="{{ $patient->muscular_skeletal }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Abdomen:</label>
                                             <input type="text" class="form-control" placeholder="Abdomen:" name="abdomen" value="{{ $patient->abdomen }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Genitourinary:</label>
                                             <input type="text" class="form-control" placeholder="Genitourinary:" name="genitourinary" value="{{ $patient->genitourinary }}">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Neurological:</label>
                                             <input type="text" class="form-control" placeholder="Neurological:" name="neurological" value="{{ $patient->neurological }}">
                                          </div>
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
                                                   <input type="checkbox"  id="chkPassport" name="weakness_checked" <?php if(isset($patient->weakness_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Weakness
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassport" class="mb-3">
                                                   <input type="text" id="txtPassport" placeholder="Add comment" class="form-control" name="weakness_comment"  value="<?php echo $patient->weakness_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassporta" class="containera">
                                                   <input type="checkbox"  id="chkPassporta" name="fatigue_checked" <?php if(isset($patient->fatigue_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Fatigue
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassporta" class="mb-3">
                                                   <input type="text" id="txtPassporta" placeholder="Add comment" class="form-control" name="fatigue_comment" value="<?php echo $patient->fatigue_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportlb" class="containera">
                                                   <input type="checkbox"  id="chkPassportlb" name="lack_of_appetie_checked" <?php if(isset($patient->lack_of_appetie_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Lack of Appetie
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportlb" class="mb-3">
                                                   <input type="text" id="txtPassportlb" placeholder="Add comment"  class="form-control" name="lack_of_appetie_comment"  value="<?php echo $patient->lack_of_appetie_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportb" class="containera">
                                                   <input type="checkbox"  id="chkPassportb" name="weight_loss_checked" <?php if(isset($patient->weight_loss_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Weight Loss
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportb" class="mb-3">
                                                   <input type="text" id="txtPassportb" placeholder="Add comment" class="form-control" name="weight_loss_comment" value="<?php echo $patient->weight_loss_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportk" class="containera">
                                                   <input type="checkbox"  id="chkPassportk" name="chest_pain_checked" <?php if(isset($patient->chest_pain_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Chest Pains
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportk" class="mb-3">
                                                   <input type="text" id="txtPassportk" placeholder="Add comment"  class="form-control" name="chest_pain_comment"  value="<?php echo $patient->chest_pain_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportu" class="containera">
                                                   <input type="checkbox"  id="chkPassportu" name="fever_checked" <?php if(isset($patient->fever_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Fever
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportu" class="mb-3">
                                                   <input type="text" id="txtPassportu" placeholder="Add comment"  class="form-control" name="fever_comment" value="<?php echo $patient->fever_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3"> 
                                                <label for="chkPassportn" class="containera">
                                                   <input type="checkbox"  id="chkPassportn" name="persistent_cough_checked" <?php if(isset($patient->persistent_cough_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Persistent Cough
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportn" class="mb-3">
                                                   <input type="text" id="txtPassportn" placeholder="Add comment"  class="form-control" name="persistent_cough_comment" value="<?php echo $patient->persistent_cough_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportaa" class="containera">
                                                   <input type="checkbox"  id="chkPassportaa" name="night_sweats_checked" <?php if(isset($patient->night_sweats_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Night Sweats
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportaa" class="mb-3">
                                                   <input type="text" id="txtPassportaa" placeholder="Add comment"  class="form-control" name="night_sweats_comment" value="<?php echo $patient->night_sweats_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportl" class="containera">
                                                   <input type="checkbox"  id="chkPassportl" name="shortness_of_breath_checked" <?php if(isset($patient->shortness_of_breath_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Shortness of Breath
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportl" class="mb-3">
                                                   <input type="text" id="txtPassportl" placeholder="Add comment"  class="form-control" name="shortness_of_breath_comment" value="<?php echo $patient->shortness_of_breath_comment; ?>" />
                                                </div>
                                                <?php } ?>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportla" class="containera">
                                                   <input type="checkbox"  id="chkPassportla" name="blood_streaked_sputum_checked" <?php if(isset($patient->blood_streaked_sputum_checked)) { echo 'checked'; } ?>>
                                                   <span class="checkmark"></span>
                                                   Blood-Streaked Sputum
                                                </label>
                                                <hr />
                                                <?php if(isset($patient->blood_streaked_sputum_checked)) { ?>
                                                <div id="dvPassportla" class="mb-3">
                                                    <input type="text" id="txtPassportla" placeholder="Add comment"  class="form-control" name="blood_streaked_sputum_comment" value="<?php echo $patient->blood_streaked_sputum_comment; ?>" />
                                                      </div>
                                                <?php } ?>
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
                              <h2 class="t1 fadeIn">EMPLOYEE PHYSICAL EXAMINATION REPORT <br><span class="grey">LABORATORY RESULTS 
                              (ALL LAB REPORTS AND RESULTS MUST BE ATTACHED)</span>
                              </h2>
                              <div class="text-center">
                                 <button id="btnAddRow" type="button" class="btn- btn-primary btn-pr">
                                    Add new Result
                                 </button>
                                 <button id="btnDelLastRow" type="button" class="btn- btn-primary btn-pr">
                                    Delete Last Result
                                 </button>
                              </div>
                              <div class="mb-5">
                                 <table id="tblAddRow" class="mt-3" border="1">
                                 <thead>
                                    <tr>
                                       <th>
                                          <div id="checkbox">
                                             <label class="containera">
                                                 <input type="checkbox" id="checkedAll" name="checkedAll" disabled="">
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
                            <?php foreach ($patient->record as $lab => $labTest) {  ?>      
                              <tr class="tr_class">
                                 <td>
                                    <div id="checkbox">
                                       <label class="containera">
                                           <input type="checkbox" class="record" name="record[1]" checked="" disabled="" />
                                          <span class="checkmark"></span>
                                       </label>
                                    </div>
                                 </td>
                                 <td>
                                    <select class="form-control test_name" name="test_name[1]">
                                       @foreach ($labReportTypes as $key => $item)
                                       <option disabled="" value="{{ $key }}" <?php if($key == $patient->test_name->$lab) { echo 'selected'; } ?>>{{ $item }}</option>
                                       @endforeach
                                    </select>
                                 </td>
                                 <td>
                                    <div class="form-group datea">
                                       <div class="input-group date">
                                          <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                          </span>
                                           <input type="text" class="form-control date_performed" name="date_performed[1]" readonly="" value="<?php echo $patient->date_performed->$lab; ?>" />
                                       </div>
                                    </div>
                                 </td>
                                 
                                 <td>
                                     <input class="lab_value" name="lab_value[1]" readonly="" value="<?php if($patient->result->$lab == 'Immune') { echo 'Immune'; }else { echo 'Non Immune'; } ?>"/>
                                 </td>
                                 <td>
                                    <input class="lab_value" name="lab_value[1]" readonly="" value="<?php echo $patient->lab_value->$lab; ?>"/>
                                    
                                 </td>
                              </tr>
                            <?php } ?>
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
                              <div class="col-lg-12">
                                 <div class="card-a">
                                    <label class="containera">This individual is free from any health impairment that is a potential risk to the patient or another employee of which may interfere with the performance of his/her duties including the habituation or addiction to drugs or alcohol.
                                        <input type="checkbox" name="checkbox_one" checked="">
                                       <span class="checkmark"></span>
                                    </label>
                                 </div>
                              </div>
                              <div class="col-lg-12"><div class="card-a">
                                 <label class="containera">This individual is able to work with the following limitations<br>
                                    <span> It is a long established fact fact that a reader will be by the the readable content of a page.</span>
                                    <input type="checkbox" name="checkbox_two" checked="">
                                    <span class="checkmark"></span>
                                 </label>
                                 </div>
                              </div>
                              <div class="col-lg-12"> <div class="card-a">
                                 <label class="containera">Return to Work This individual is NOT physically/mentally able to work (specify reason)<br>
                                    <span style="display: block;"> I    It is a long established fact fact that a reader will be by the the readable content of a page.</span>
                                    <input type="checkbox" name="checkbox_three" checked="">
                                    <span class="checkmark"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container mb-5">
               <div class="innerSpace">
                  <h2 class="t1 fadeIn">PHYSICAL DETAILS</h2>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Physician  Name" name="physician_name" value="{{$patient->physician_name}}">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Physician License No" name="physician_license_no" value="{{$patient->physician_license_no}}">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                           <p>Physician  Date & Signeture</p>
                           <div class="cardb"> </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="card">
                           <p>Physician Stamp</p>
                           <div class="cardb"> </div>
                        </div>
                     </div>
                  </div>
<!--                  <div class="text-center mt-3">
                     <button class="btn-pr text-center mt-2">Submit</button>
                  </div>-->
               </div>
            </div>
         </section>
      <!-- Middle Section End -->
      </form>
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
            var lastRow = $('#tblAddRow tbody tr:last').clone();

            var lookup = parseInt($(lastRow).find('input:first').attr('name').replace ( /[^\d.]/g, '' )) + 1;

            $(lastRow).find('input.record').attr('name', 'record['+lookup+']')

            $(lastRow).find('select.test_name').attr('name', 'test_name['+lookup+']')

            $(lastRow).find('input.date_performed').attr('name', 'date_performed['+lookup+']')

            $(lastRow).find('select.result').attr('name', 'result['+lookup+']')

            $(lastRow).find('input.lab_value').attr('name', 'lab_value['+lookup+']')

            lastRow.insertAfter('#tblAddRow tbody tr:last');

            $('.datea .input-group.date').datepicker({
               todayBtn: "linked",
               keyboardNavigation: false,
               forceParse: false,
               calendarWeeks: true,
               autoclose: true
            });
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
    $(function () { //
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
                $("#txtPassport").val('');
            }
        });
    });
       $(function () { //
        $("#chkPassporta").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassporta").show();
            } else {
                $("#dvPassporta").hide();
                $("#txtPassporta").val('');
            }
        });
    });
        $(function () { //
        $("#chkPassportb").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportb").show();
            } else {
                $("#dvPassportb").hide();
                $("#txtPassportb").val('');
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
             $(function () { //
        $("#chkPassportk").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportk").show();
            } else {
                $("#dvPassportk").hide();
                $("#txtPassportk").val('');
            }
        });
    });
              $(function () { //
        $("#chkPassportu").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportu").show();
            } else {
                $("#dvPassportu").hide();
                $("#txtPassportu").val('');
            }
        });
    });
                 $(function () { //
        $("#chkPassportn").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportn").show();
            } else {
                $("#dvPassportn").hide();
                $("#txtPassportn").val('');
            }
        });
    });
                     $(function () { //
        $("#chkPassportla").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportla").show();
            } else {
                $("#dvPassportla").hide();
                $("#txtPassportla").val('');
            }
        });
    });
                        $(function () { //
        $("#chkPassportlb").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportlb").show();
            } else {
                $("#dvPassportlb").hide();
                $("#txtPassportlb").val('');
            }
        });
    });
                          $(function () { //
        $("#chkPassportaa").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassportaa").show();
            } else {
                $("#dvPassportaa").hide();
                $("#txtPassportaa").val('');
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
   $(function () { //
      $("#chkPassportl").click(function () {
         if ($(this).is(":checked")) {
            $("#dvPassportl").show();
         } else {
            $("#dvPassportl").hide();
            $("#txtPassportl").val('');
         }
      });
   });
</script>
   </body>
</html>