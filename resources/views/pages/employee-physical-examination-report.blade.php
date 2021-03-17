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
      
      <form action="{{ route('post-employee-physical-examination-report', $patient->id) }}" method="post" enctype="multipart/form-data">
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
                                             <input type="radio" class="custom-control-input" id="assessment1" name="physical_assessment" value="Pre-Employment Physical Assessment" checked>
                                             <label class="custom-control-label" for="assessment1">Pre-Employment Physical Assessment</label>
                                          </div> 
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="custom-control custom-radio">
                                             <input type="radio" class="custom-control-input" id="assessment2" name="physical_assessment" value="Annual Assessment">
                                             <label class="custom-control-label" for="assessment2">
                                                Annual Assessment
                                             </label>
                                          </div>
                                       </div>
                                       <div class="col-lg-3">  <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="assessment3" name="physical_assessment" value="Return to Work / LOA">
                                          <label class="custom-control-label" for="assessment3">
                                             Return to Work / LOA
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-lg-2">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="assessment4" name="physical_assessment" value="Other">
                                          <label class="custom-control-label" for="assessment4">
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
                     <p class="text-left">I hereby authorize<input type="text" name="name" value="{{ $patient->first_name }} {{ $patient->last_name }}" class="form-control inline-style">to release all health information about me to Doral Health Connect. 
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
                                 <option {{ (isset($maritalStatus->name) && $maritalStatus->name === 'Single')  ? "selected" : null }}>Single </option>
                                 <option {{ (isset($maritalStatus->name) && $maritalStatus->name === 'Married')  ? "selected" : null }}>Married </option>
                                 <option {{ (isset($maritalStatus->name) && $maritalStatus->name === 'Separated')  ? "selected" : null }}>Separated </option>
                                 <option {{ (isset($maritalStatus->name) && $maritalStatus->name === 'Widowed')  ? "selected" : null }}>Widowed </option>
                                 <option {{ (isset($maritalStatus->name) && $maritalStatus->name === 'Divorced')  ? "selected" : null }}>Divorced  </option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group"><input type="text" class="form-control" placeholder="SSN Number" name="ssn" value="{{$patient->demographic->ssn ?? ''}}"></div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <textarea id="address" name="address" rows="4" cols="62" class="form-control-plaintext _detail no-height" readonly placeholder=""> Address1: {{ $address->Street1 ?? '' }} &#13;&#10; Address2: {{ $address->Street2 ?? '' }} &#13;&#10; City: {{ $address->City ?? '' }} &#13;&#10; State: {{ $address->State ?? '' }} &#13;&#10; Zip4: {{ $address->Zip4 ?? '' }} &#13;&#10; Zip5: {{ $address->Zip5 ?? '' }}</textarea></div>
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
                              <!-- <input type="text" class="form-control" placeholder="HT:" name="ht"> -->
                              <select name="height" class="form-control" required="" name="ht">
                                 <option>Select Height</option>
                                 <option value="131">131 CM</option>
                                 <option value="132">132 CM</option>
                                 <option value="130">130 CM</option>
                                 <option value="133">133 CM</option>
                                 <option value="134">134 CM</option>
                                 <option value="135">135 CM</option>
                                 <option value="136">136 CM</option>
                                 <option value="137">137 CM</option>
                                 <option value="138">138 CM</option>
                                 <option value="139">139 CM</option>
                                 <option value="140">140 CM</option>
                                 <option value="141">141 CM</option>
                                 <option value="142">142 CM</option>
                                 <option value="143">143 CM</option>
                                 <option value="144">144 CM</option>
                                 <option value="145">145 CM</option>
                                 <option value="146">146 CM</option>
                                 <option value="147">147 CM</option>
                                 <option value="148">148 CM</option>
                                 <option value="149">149 CM</option>
                                 <option value="150">150 CM</option>
                                 <option value="151">151 CM</option>
                                 <option value="152">152 CM</option>
                                 <option value="153">153 CM</option>
                                 <option value="154">154 CM</option>
                                 <option value="155">155 CM</option>
                                 <option value="156">156 CM</option>
                                 <option value="157">157 CM</option>
                                 <option value="158">158 CM</option>
                                 <option value="159">159 CM</option>
                                 <option value="160">160 CM</option>
                                 <option value="161">161 CM</option>
                                 <option value="162">162 CM</option>
                                 <option value="163">163 CM</option>
                                 <option value="164">164 CM</option>
                                 <option value="165">165 CM</option>
                                 <option value="166">166 CM</option>
                                 <option value="167">167 CM</option>
                                 <option value="168">168 CM</option>
                                 <option value="169">169 CM</option>
                                 <option value="170">170 CM</option>
                                 <option value="171">171 CM</option>
                                 <option value="172">172 CM</option>
                                 <option value="173">173 CM</option>
                                 <option value="174">174 CM</option>
                                 <option value="175">175 CM</option>
                                 <option value="176">176 CM</option>
                                 <option value="177">177 CM</option>
                                 <option value="178">178 CM</option>
                                 <option value="179">179 CM</option>
                                 <option value="180">180 CM</option>
                                 <option value="181">181 CM</option>
                                 <option value="182">182 CM</option>
                                 <option value="183">183 CM</option>
                                 <option value="184">184 CM</option>
                                 <option value="185">185 CM</option>
                                 <option value="186">186 CM</option>
                                 <option value="187">187 CM</option>
                                 <option value="188">188 CM</option>
                                 <option value="189">189 CM</option>
                                 <option value="190">190 CM</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>WT:</label>
                              <!-- <input type="text" class="form-control" placeholder="WT:" name="wt"> -->
                              <select name="weight" class="form-control required" required="" name="wt">
                                 <option>Select Weight</option>
                                 <option value="35">35 Kg</option>
                                 <option value="36">36 Kg</option>
                                 <option value="37">37 Kg</option>
                                 <option value="38">38 Kg</option>
                                 <option value="39">39 Kg</option>
                                 <option value="40">40 Kg</option>
                                 <option value="41">41 Kg</option>
                                 <option value="42">42 Kg</option>
                                 <option value="43">43 Kg</option>
                                 <option value="44">44 Kg</option>
                                 <option value="45">45 Kg</option>
                                 <option value="46">46 Kg</option>
                                 <option value="47">47 Kg</option>
                                 <option value="48">48 Kg</option>
                                 <option value="49">49 Kg</option>
                                 <option value="50">50 Kg</option>
                                 <option value="51">51 Kg</option>
                                 <option value="52">52 Kg</option>
                                 <option value="53">53 Kg</option>
                                 <option value="54">54 Kg</option>
                                 <option value="55">55 Kg</option>
                                 <option value="56">56 Kg</option>
                                 <option value="57">57 Kg</option>
                                 <option value="58">58 Kg</option>
                                 <option value="59">59 Kg</option>
                                 <option value="60">60 Kg</option>
                                 <option value="61">61 Kg</option>
                                 <option value="62">62 Kg</option>
                                 <option value="63">63 Kg</option>
                                 <option value="64">64 Kg</option>
                                 <option value="65">65 Kg</option>
                                 <option value="66">66 Kg</option>
                                 <option value="67">67 Kg</option>
                                 <option value="68">68 Kg</option>
                                 <option value="69">69 Kg</option>
                                 <option value="70">70 Kg</option>
                                 <option value="71">71 Kg</option>
                                 <option value="72">72 Kg</option>
                                 <option value="73">73 Kg</option>
                                 <option value="74">74 Kg</option>
                                 <option value="75">75 Kg</option>
                                 <option value="76">76 Kg</option>
                                 <option value="77">77 Kg</option>
                                 <option value="78">78 Kg</option>
                                 <option value="79">79 Kg</option>
                                 <option value="80">80 Kg</option>
                                 <option value="81">81 Kg</option>
                                 <option value="82">82 Kg</option>
                                 <option value="83">83 Kg</option>
                                 <option value="84">84 Kg</option>
                                 <option value="85">85 Kg</option>
                                 <option value="86">86 Kg</option>
                                 <option value="87">87 Kg</option>
                                 <option value="88">88 Kg</option>
                                 <option value="89">89 Kg</option>
                                 <option value="90">90 Kg</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>B/P:</label>
                              <input type="text" class="form-control" placeholder="B/P(mmHg)" name="bp">
                         
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>PULSE:</label>
                              <input type="text" class="form-control" placeholder="PULSE(BPM)" name="pulse">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>RESP:</label>
                              <input type="text" class="form-control" placeholder="RESP" name="resp">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <label>TEMP:</label>
                              <input type="text" class="form-control" placeholder="TEMP(Celsius)" name="temp">
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
                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><span>PHYSICIAN CONDITION</span>  <i class="fa fa-angle-right"></i></button>                                   
                                 </h2>
                              </div>
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Head/ENT:</label>
                                             <input type="text" class="form-control" placeholder="Head/ENT:" name="head_ent">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Eyes:</label>
                                             <input type="text" class="form-control" placeholder="Eyes:" name="eyes">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Neck:</label>
                                             <input type="text" class="form-control" placeholder="Neck:" name="neck">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Breats:</label>
                                             <input type="text" class="form-control" placeholder="Breats" name="breats">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Lungs:</label>
                                             <input type="text" class="form-control" placeholder="Lungs:" name="lungs">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Cardiovascular:</label>
                                             <input type="text" class="form-control" placeholder="Cardiovascular:" name="cardiovascular">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Muscular/Skeletal:</label>
                                             <input type="text" class="form-control" placeholder="Muscular/Skeletal" name="muscular_skeletal">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Abdomen:</label>
                                             <input type="text" class="form-control" placeholder="Abdomen:" name="abdomen">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Genitourinary:</label>
                                             <input type="text" class="form-control" placeholder="Genitourinary:" name="genitourinary">
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group">
                                             <label>Neurological:</label>
                                             <input type="text" class="form-control" placeholder="Neurological:" name="neurological">
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
                                                   <input type="checkbox"  id="chkPassport" name="weakness_checked">
                                                   <span class="checkmark"></span>
                                                   Weakness
                                                </label>
                                                <hr />
                                                <div id="dvPassport" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassport" placeholder="Add comment" class="form-control" name="weakness_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassporta" class="containera">
                                                   <input type="checkbox"  id="chkPassporta" name="fatigue_checked">
                                                   <span class="checkmark"></span>
                                                   Fatigue
                                                </label>
                                                <hr />
                                                <div id="dvPassporta" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassporta" placeholder="Add comment" class="form-control" name="fatigue_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportlb" class="containera">
                                                   <input type="checkbox"  id="chkPassportlb" name="lack_of_appetie_checked">
                                                   <span class="checkmark"></span>
                                                   Lack of Appetie
                                                </label>
                                                <hr />
                                                <div id="dvPassportlb" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportlb" placeholder="Add comment"  class="form-control" name="lack_of_appetie_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportb" class="containera">
                                                   <input type="checkbox"  id="chkPassportb" name="weight_loss_checked">
                                                   <span class="checkmark"></span>
                                                   Weight Loss
                                                </label>
                                                <hr />
                                                <div id="dvPassportb" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportb" placeholder="Add comment" class="form-control" name="weight_loss_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportk" class="containera">
                                                   <input type="checkbox"  id="chkPassportk" name="chest_pain_checked">
                                                   <span class="checkmark"></span>
                                                   Chest Pains
                                                </label>
                                                <hr />
                                                <div id="dvPassportk" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportk" placeholder="Add comment"  class="form-control" name="chest_pain_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportu" class="containera">
                                                   <input type="checkbox"  id="chkPassportu" name="fever_checked">
                                                   <span class="checkmark"></span>
                                                   Fever
                                                </label>
                                                <hr />
                                                <div id="dvPassportu" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportu" placeholder="Add comment"  class="form-control" name="fever_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3"> 
                                                <label for="chkPassportn" class="containera">
                                                   <input type="checkbox"  id="chkPassportn" name="persistent_cough_checked">
                                                   <span class="checkmark"></span>
                                                   Persistent Cough
                                                </label>
                                                <hr />
                                                <div id="dvPassportn" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportn" placeholder="Add comment"  class="form-control" name="persistent_cough_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportaa" class="containera">
                                                   <input type="checkbox"  id="chkPassportaa" name="night_sweats_checked">
                                                   <span class="checkmark"></span>
                                                   Night Sweats
                                                </label>
                                                <hr />
                                                <div id="dvPassportaa" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportaa" placeholder="Add comment"  class="form-control" name="night_sweats_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportl" class="containera">
                                                   <input type="checkbox"  id="chkPassportl" name="shortness_of_breath_checked">
                                                   <span class="checkmark"></span>
                                                   Shortness of Breath
                                                </label>
                                                <hr />
                                                <div id="dvPassportl" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportl" placeholder="Add comment"  class="form-control" name="shortness_of_breath_comment" />
                                                </div>
                                             </div>
                                             <div class="col-lg-3">
                                                <label for="chkPassportla" class="containera">
                                                   <input type="checkbox"  id="chkPassportla" name="blood_streaked_sputum_checked">
                                                   <span class="checkmark"></span>
                                                   Blood-Streaked Sputum
                                                </label>
                                                <hr />
                                                <div id="dvPassportla" style="display: none" class="mb-3">
                                                   <input type="text" id="txtPassportla" placeholder="Add comment"  class="form-control" name="blood_streaked_sputum_comment" />
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
                                       <th>Sr No.</th>
                                       <th>Test Name</th>
                                       <th>Date Performed</th>
                                       <th>Results</th>
                                       <th>Test Value</th>
                                       <th>Reports</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                              <tbody>
                              <tr class="tr_class">
                                 <td>
                                    <label class="containera srNO" >
                                        1
                                     </label>
                                 </td>
                                 <td>
                                 <!-- onchange="getAndSetLabReport(event,this.value)" -->
                                 <select onchange="getAndSetLabReport(event,this.value)" class="form-control test_name" name="report[1][test_name]">
                                       <option>Select Type</option>
                                       @foreach ($labReportTypes as $key => $item)
                                       @if($key !=1 && $key !=7 && $key !=12)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                 </td>
                                 <td>
                                    <div class="form-group datea">
                                       <div class="input-group date">
                                          <span class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                          </span>
                                          <input type="text" class="form-control date_performed" name="report[1][date_performed]" />
                                          <input type="text" class="form-control date_experied" name="report[1][date_experied]" style="display:none;"/>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <select class="form-control result result_1" name="result[1]" required>
                                       <option>Select Result</option>
                                    </select>
                                 </td>
                                 <td>
                                    <input class="lab_value" name="report[1][lab_value]" />
                                 </td>
                                 <td>
                                    <button type="button"
                                          class="btn btn-outline-green d-flex align-items-center" onclick="downloadReport(this)"
                                          data-toggle="modal" data-target="#labreportModal" name=""><i
                                          class="las la-binoculars la-2x mr-2"></i> View</button>
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
                              <div class="col-lg-12">
                                 <div class="card-a">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" id="physical_note1" name="physical_note" value="1">
                                       <label class="custom-control-label" for="physical_note1">This individual is free from any health impairment that is a potential risk to the patient or another employee of which may interfere with the performance of his/her duties including the habituation or addiction to drugs or alcohol.</label>
                                    </div> 
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="card-a">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" id="physical_note2" name="physical_note" value="2">
                                       <label class="custom-control-label" for="physical_note2">This individual is able to work with the following limitations<br><span> It is a long established fact fact that a reader will be by the the readable content of a page.</label>
                                    </div> 
                                 </div>
                              </div>
                              <div class="col-lg-12"> <div class="card-a">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="physical_note3" name="physical_note" value="3">
                                    <label class="custom-control-label" for="physical_note3">Return to Work This individual is NOT physically/mentally able to work (specify reason)<br>
                                    <span style="display: block;"> I It is a long established fact fact that a reader will be by the the readable content of a page.</span></label>
                                 </div>   
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container mb-5">
               <div class="innerSpace">
                  <h2 class="t1 fadeIn">PHYSICIAN DETAILS</h2>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Physician  Name" name="physician_name" value="{{ $loginUser->full_name }}">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Physician License No" name="physician_license_no" value="">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                           <p>Physician  Date & Signature</p>
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
                  <div class="text-center mt-3">
                     <button class="btn-pr text-center mt-2">Submit</button>
                  </div>
               </div>
            </div>
         </section>
      <!-- Middle Section End -->
      </form>
      <!--@include('pages.modals.labreports')-->
      <!-- Footer Section End -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/datapicker/bootstrap-datepicker.js') }}"></script>  
      <script src="{{ asset('js/dropzone.js') }}"></script>
      <!--<script src="{{ asset('js/lab-reports.js') }}"></script>-->
    
      <script>
        $(document).ready(function() {
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
         .append('<td class="text-center"><a href="#" class="delrow btn-pr">Delete</a></td>');
         
         // For select all checkbox in table
         $('#checkedAll').click(function (e) {
            //e.preventDefault();
            $(this).closest('#tblAddRow').find('td input:checkbox').prop('checked', this.checked);
         });
       
                  //  yearRange: new Date().getFullYear() + ':' + new Date().getFullYear()
                
         // Add row the table
         $('#btnAddRow').on('click', function() {
            var lastRow = $('#tblAddRow tbody tr:last').clone();
           
            var lookup = parseInt($(lastRow).find('input:first').attr('name').replace ( /[^\d.]/g, '' )) + 1;
            
            $(lastRow).find('.srNO').html(lookup);

            $(lastRow).find('select.test_name').attr('name', 'report['+lookup+'][test_name]')

            $(lastRow).find('input.date_performed').attr('name', 'report['+lookup+'][date_performed]')

            $(lastRow).find('select.result').removeClass('result_'+(lookup-1)).attr('name', 'result['+lookup+']').addClass('result_'+lookup)

            $(lastRow).find('input.lab_value').attr('name', 'report['+lookup+'][lab_value]')

            lastRow.insertAfter('#tblAddRow tbody tr:last');

            $('.datea .input-group.date').datepicker({
               todayBtn: "linked",
               keyboardNavigation: false,
               forceParse: false,
               calendarWeeks: true,
               autoclose: true,
               endDate: "today"
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
            autoclose: true,
            endDate: "today",
         });
      </script>
    <script type="text/javascript">
        $(function () {
            $("#chkPassport").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                    $("#txtPassport").val('');
                }
            });
        });
           $(function () {
            $("#chkPassporta").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassporta").show();
                } else {
                    $("#dvPassporta").hide();
                    $("#txtPassporta").val('');
                }
            });
        });
            $(function () {
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
         $(function () {
            $("#chkPassportk").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassportk").show();
                } else {
                    $("#dvPassportk").hide();
                    $("#txtPassportk").val('');
                }
            });
        });
         $(function () {
            $("#chkPassportu").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassportu").show();
                } else {
                    $("#dvPassportu").hide();
                    $("#txtPassportu").val('');
                }
            });
        });
         $(function () {
            $("#chkPassportn").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassportn").show();
                } else {
                    $("#dvPassportn").hide();
                    $("#txtPassportn").val('');
                }
            });
        });
         $(function () {
            $("#chkPassportla").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassportla").show();
                } else {
                    $("#dvPassportla").hide();
                    $("#txtPassportla").val('');
                }
            });
        });
         $(function () {
            $("#chkPassportlb").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassportlb").show();
                } else {
                    $("#dvPassportlb").hide();
                    $("#txtPassportlb").val('');
                }
            });
        });
         $(function () {
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
       $(function () {
          $("#chkPassportl").click(function () {
             if ($(this).is(":checked")) {
                $("#dvPassportl").show();
             } else {
                $("#dvPassportl").hide();
                $("#txtPassportl").val('');
             }
          });
       });
       function getAndSetLabReport(e,id) {
           var getRowName = e.target.name;
           var lookup = parseInt(getRowName.replace ( /[^\d.]/g, '' ));
           console.log(lookup, id);
           if(id >=1 && 6 >= id) {
               $('.result_'+lookup).html('<option value="Positive">Positive</option><option value="Negative">Negative</option>');
           } else if(id >= 7 && 11 >= id) {
               $('.result_'+lookup).html('<option value="Immune">Immune</option><option value="Non Immune">Non Immune</option>');
           } else if(id >= 12 && 14 >= id) {
               $('.result_'+lookup).html('<option value="Positive">Positive</option><option value="Negative">Negative</option>');
           } else {
               $('.result_'+lookup).html('<option value="Completed">Completed</option><option value="Overdue">Overdue</option>');
           }
       }

       function downloadReport(elem) {
          console.log(elem)
       }
    </script>
    
   </body>
</html>