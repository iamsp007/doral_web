<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Employment Eligibility Verification Form I-9</title>
      <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
         }
         @page {
            margin: 25px;
         }
         table,
         tr,
         td {
            border: 0;
            margin: 0;
            padding: 0; /* Apply cell padding */
            border-collapse: collapse;
            border-spacing: 0; /* Apply cell spacing */
         }
         table {
            width: 100%;
            border: 0;
         }
         td,
         th {
            text-align: left;
            padding: 3px 5px;
            vertical-align: top;
         }
         img {
            display: inline-block;
            vertical-align: sub;
         }

         ul,
         ol {
            margin: 10px;
            padding: 0;
         }
         h1 {
            font-size: 18px;
            padding-bottom: 5px;
         }
         h2 {
            font-size: 16px;
         }

         .table-border,
         .table-border th,
         .table-border td {
            border: 1px solid #8b8181;
         }

         .border {
            border: 1px solid #8b8181;
         }

         .no-border {
            border: 0 !important;
         }
         .sectionBackColor{
             background-color: #d2cfcf;
         }
         .sectionSecondBackColor{
             background-color: #E7E6E6;
         }
         .no-padding {
            padding: 0 !important;
         }

         .times-font {
            font-family: "Times New Roman", Times, serif;
         }

         .openSans {
            font-family: "Open Sans", sans-serif;
         }

         .text-left {
            text-align: left;
         }
         .text-center {
            text-align: center;
         }
         .text-right {
            text-align: right;
         }
         .text-justify {
            text-align: justify;
         }
         .para {
            text-align: justify;
            font-size: 12px;
         }
         .mr-top-10px {
            margin-top: 10px;
         }
         .mr-bottom-10px {
            margin-bottom: 10px;
         }
         .pad-left-10 {
            padding-left: 10px;
         }
         .pad-left-20 {
            padding-left: 20px;
         }
         .pad-bottom-5 {
            padding: 0 0 5px 0 !important;
         }
         .border-left {
            border-left: 1px solid #e0e0e0 !important;
         }
         .border-right {
            border-right: 1px solid #e0e0e0 !important;
         }
         .sign {
            display: inline-block;
            height: 50px;
            width: auto;
            vertical-align: top;
            border: 1px solid #ddd;
            margin-left: 5px;
         }
         .common-checkbox {
             color: #0073de;
         }

         
         input[type="text"],
         input[type="email"],
         input[type="password"],
         input[type="number"],
         input[type="tel"],
         input[type="date"],
         input[type="time"],
         input[type="month"],
         input[type="file"],
         select {
            display: inline-block;
            width: 90%;
            height:10px;
            padding: 5px;
            font-size: 16px;
            font-weight: 400;
            line-height: normal;
            color: #333;
            background-color: #fff;
            /* border: 0; */
            border: 1px solid #d1d1d1;
         }
         /* img {
            display: inline-block; width: 7px; height: 10px; margin: 0 3px 0 0; padding: 0; vertical-align: top;
         } */
      </style>
   </head>
   <body
      style="
         margin: 0;
         padding: 20px 15px;
         font-size: 11px;
         font-family: 'Open Sans', sans-serif;
      "
   >
      <table style="width: 100%;" cellspacing="0" cellpadding="0">
         <tr>
            <td style="border: 0">
               <table
                  style="width: 100%; border-bottom: 5px solid #000"
                  cellspacing="0"
                  cellpadding="0"
               >
                  <tr>
                     <td
                        class="times-font text-left"
                        style="
                           width: 150px;
                           vertical-align: middle;
                           padding-bottom: 10px;
                        "
                     >
                     
                        <img
                           src="{{ asset('pdf_logos/united-states-department-of-homeland-security-dhs-logo.svg') }}"
                           style="width: 80px; height: auto"
                        />
                     </td>
                     <td
                        class="times-font text-center"
                        style="vertical-align: middle"
                     >
                        <h1>Employment Eligibility Verification</h1>
                        <h2 style="font-weight: normal">
                           <b>Department of Homeland Security</b><br />
                           U.S. Citizenship and Immigration Services
                        </h2>
                     </td>
                     <td
                        class="times-font text-center"
                        style="width: 150px; vertical-align: middle"
                     >
                        <h2 style="font-weight: normal">
                           <b>USCIS<br />Form I-9<br /></b>
                           <span style="font-size: 10.5px;">OMB No. 1615-0047</span><br />
                               <span style="font-size: 10.5px;">Expires 10/31/2022</span>
                        </h2>
                     </td>
                  </tr>
               </table>

               <table>
                  <tr>
                      <td class="para">
                        <img
                           src="{{ asset('pdf_logos/triangle.png') }}"
                           style="
                              display: inline-block;
                              width: 7px;
                              height: 10px;
                              margin: 2px 0 0 0;
                              padding: 0;
                              vertical-align: top;
                           "
                        />
                        <span style="font: bold;">START HERE:</span><span style="font-size: 10.5px; font: bold;">Read instructions carefully before
                        completing this form. The instructions must be available, either in paper or electronically,
                        during completion of this form. Employers are liable for errors in the completion of this form.</span><br>
                        <span style="font: bold;">ANTI-DISCRIMINATION NOTICE:</span><span style="font-size: 10.5px;"> It is illegal to
                        discriminate against work-authorized individuals.
                        Employers <b>CANNOT</b> specify which document(s) an employee may present to establish employment authorization and identify. The refusal to hire or continue to employ an individual because the documentation presented has a future expiration date may also constitute illegal discrimination.</span>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <table>
                           <tr>
                              <td class="no-border pad-bottom-5">
                                 <table class="table-border">
                                     <tr class="sectionBackColor">
                                        <td class="para" colspan="5">
                                          <b>Section 1. Employee Information
                                             and Attestation</b>
                                          <em>(Employees must complete and sign
                                             Section 1 of Form I-9 no later than
                                             the <b>first day of employment</b>, but
                                             not before accepting a job
                                             offer.)</em>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 27%;">
                                          <b>Last Name</b> <em>(Family Name)</em
                                          ><br /><span class="">{{ ($users->user) ? $users->user->last_name : '' }}</span>
                                       </td>
                                       <td class="para" style="width: 22%;">
                                          <b>First Name</b> <em>(Given Name)</em
                                          ><br /><span class="">{{ ($users->user) ? $users->user->first_name : '' }}</span>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Address</b>
                                            <em>(Street Number and Name)</em
                                            ><br />
                                            <span class="">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}</span>
                                         </td>
                                         <td><b>Apt. Number</b><br /><span class="">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}
                                          {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></td>
                                         <td>
                                            <b>City or Town</b><br /><span class="">@if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                        @endif</span>
                                         </td>
                                         <td><b>State</b><br /><span class=""> @if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                        @endif</span></td>
                                         <td><b>Zip Code</b><br /><span class="">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <b>Date of birth</b>
                                           <em>(mm/dd/yyyy)</em><br />
                                           <span class="">{{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}</span>
                                        </td>
                                        <td>
                                           <b>U.S. Social Security Number</b
                                           ><br /><span class="">@if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif</span>
                                        </td>
                                        <td>
                                           <b>Employee's E-mail Address</b
                                           ><br /><span class="">{{$users->email}}</span>
                                        </td>
                                        <td colspan="2">
                                           <b>Employee's Telephone Number</b><br />
                                           <span class=""> {{ ($users->phone) ? $users->phone : ''}}</span>
                                        </td>
                                     </tr>
                                 </table>
                              </td>
                           </tr>
                           
                        </table>
                     </td>
                  </tr>
               </table>

               <table>
                  <tr>
                      <td colspan="2" style="font: bold; font-size: 12.5px;">
                        I am aware that federal law provides for imprisonment
                        and/or fines for false statements or use of false
                        documents in connection with the completion of this
                        form.
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2" style="font: bold; font-size: 12.5px;">
                        I attest, under penalty of perjury, that I am (check one
                        of the following boxes):
                     </td>
                  </tr>
                  </table>
                  <table class="table-border">
                  <tr class="para">
                     <td colspan="2">
                        
                        <input <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == true) { echo "checked"; } ?>
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                        />
                        <span>1. A citizen of the United States</span>
                     </td>
                  </tr>
                  <tr class="para">
                     <td colspan="2">
                        <input <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == false) { echo "checked"; } ?>
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                           />
                        <span>2. A noncitizen national of the United States
                        <em>(See instructions)</em></span>
                     </td>
                  </tr>
                  <tr class="para">
                     <td colspan="2">
                        <input <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == false) { echo "checked"; } ?>
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                           />
                        <span>3. A lawful permanent resident
                        <em>(Alien Registration Number/USCIS Number):</em></span>
                        
                        <br>
                        
                     </td>
                  </tr>
                  <tr class="para">
                      <td colspan="2">
                        <input
                            type="checkbox"
                            style="vertical-align: top; margin: 0"
                         />
                         <span>4. An alien authorized to work until (expiration date, if
                             applicable, mm/dd/yyyy)________________.
                         <br />
                         &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Some aliens may write "N/A" in the expiration date field.
                         <em>(See instruction)</em></span><br><br>
                         <em
                             >aliens authorized to work must provide only one of the following document numbers to complete Form I-9 :<br>
                             An Alien Registration Number/USCIS Number OR
                             Form I-94 Admission Number OR Foreign Passport Number.</em
                         ><br> 
                     </td>
                  </tr>
                  <tr>
                    <td>
                        <table class="no-border">
                          <tr>
                             <td>
                                1. Alien Registration Number/USCIS
                                Number : <span class=""> </span>
                                <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR</b>
                                <br>
                                2. Form I-94 Admission Number :
                                <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR</b>
                                <br>
                                3. Foreign Passport Number :
                                <br>
                                &nbsp;&nbsp;&nbsp;Country Of Issuance :
                                <br>
                             </td>
                          </tr>
                       </table>
                    </td>
                    <td
                       class="border text-center"
                       style="width: 200px"
                    >
                       QR Code - Section 1<br />
                       Do Not Write In This Space
                    </td>
                 </tr>
               </table>

               <table class="table-border" style="margin-top: 10px">
                  <tr>
                     <td style="width: 140px" class="no-border">
                        Signature of Employee:
                     </td>
                     <td class="no-border">
                        @if($users->signature_url)
                        <img style="height: 20px;"
                            src="{{ $users->signature_url }}"
                           alt="Signature"
                           class="sign"
                        />
                        @endif
                       
                     </td>
                     <td>
                        Today's Date <em>(mm/dd/yyyy)</em><br />
                        <span class="">{{date('m/d/Y')}}</span>
                     </td>
                  </tr>
               </table>

                <table class="table-border mr-top-10px sectionBackColor">
                  <tr>
                     <td>
                         <b style="font-size: 12.5px;">Preparer and/or Translator Certification (check one) :</b><br>
                         <input style="height: 17px;" type="checkbox"> I did not use a preparer or translator.&nbsp;&nbsp;&nbsp; <input style="height: 17px;" type="checkbox"> A preparer(s) and/or translator(s) assisted 
                             the employee in completing Section 1.<br>
                         <span style="font-size: 12px;">(Fields below must be completed and signed when preparers and/or translators assist an employee in completing Section1.) (See original 1-9)</span>
                     </td>
                  </tr>
               </table>

                <p style="font: bold; font-size: 12.5px;"> I attest, under penalty of perjury, that I have assisted
                        in the completion of Section1 of this form and that to the best of my knowledge the information is true and correct.  (See original 1-9)</p>

               <table class="mr-top-10px">
                  <tr>
                     <td class="no-border pad-bottom-5">
                        <table class="table-border">
                           <tr>
                              <td style="width: 220px" class="no-border">
                                 Signature of Preparer or Translator:
                              </td>
                              <td class="no-border">
<!--                                 <img
                                    src="./pdf_logos/signature.jpg"
                                    alt="Signature"
                                    class="sign"
                                 />-->
                              </td>
                              <td colspan="2">
                                 Today's Date <em>(mm/dd/yyyy)</em><br />
                                 01/01/2021
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Last Name</b> <em>(Family Name)</em><br />
                                 {{ ($users->user) ? $users->user->last_name : '' }}
                              </td>
                              <td colspan="3">
                                 First Name <em>(Given Name)</em><br />
                                 {{ ($users->user) ? $users->user->first_name : '' }}
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Address <em>(Street Number and Name)</em
                                 ><br />
                                 Address
                              </td>
                              <td>City or Town<br />City name</td>
                              <td>State<br />State name</td>
                              <td>Zip Code<br />10001</td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>

               <table class="mr-top-10px">
                  <tr>
                     <td style="text-align: right">
                        <img
                           src="{{ asset('pdf_logos/stop.png') }}"
                           style="
                              display: inline-block;
                              width: 20px;
                              height: 20px;
                              margin: 0;
                              padding: 0;
                              vertical-align: top;
                           "
                        />
                     </td>
                     <td
                        style="
                           width: 260px;
                           text-align: center;
                           font-size: 14px;
                           font-style: italic;
                           vertical-align: middle;
                        "
                     >
                         <span class="sectionBackColor">Employer Completes Next Page</span>
                        <br>
                        <br>
                        <br>
                     </td>
                     <td>
                        <img
                           src="{{ asset('pdf_logos/stop.png') }}"
                           style="
                              display: inline-block;
                              width: 20px;
                              height: 20px;
                              margin: 0;
                              padding: 0;
                              vertical-align: top;
                           "
                        />
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td>
                <table
                  style="width: 100%; border-bottom: 5px solid #000"
                  cellspacing="0"
                  cellpadding="0"
               >
                  <tr>
                     <td
                        class="times-font text-left"
                        style="
                           width: 150px;
                           vertical-align: middle;
                           padding-bottom: 10px;
                        "
                     >
                        <img
                           src="{{ asset('pdf_logos/united-states-department-of-homeland-security-dhs-logo.svg') }}"
                           style="width: 80px; height: auto"
                        />
                     </td>
                     <td
                        class="times-font text-center"
                        style="vertical-align: middle"
                     >
                        <h1>Employment Eligibility Verification</h1>
                        <h2 style="font-weight: normal">
                           <b>Department of Homeland Security</b><br />
                           U.S. Citizenship and Immigration Services
                        </h2>
                     </td>
                     <td
                        class="times-font text-center"
                        style="width: 150px; vertical-align: middle"
                     >
                        <h2 style="font-weight: normal">
                           <b>USCIS<br />Form I-9<br /></b>
                           <span style="font-size: 10.5px;">OMB No. 1615-0047</span><br />
                               <span style="font-size: 10.5px;">Expires 10/31/2022</span>
                        </h2>
                     </td>
                  </tr>
               </table>
               <table class="table-border">
                   <tr class="sectionBackColor">
                       <td colspan="5">
                        <b style="font-size: 14px"
                           >Section 2. Employer or Authorized Representative
                           Review and Verification</b
                        ><br />
                        <em>
                           (Employer or their authorized representative must
                           complete and sign Section2 within 3 business days of
                           the employee's first day of employment. You must
                           physically examine one document from List A OR
                           a combination of one document from List B and
                           one document from List C as listed on the "Lists of
                           Acceptable Documents.")
                        </em>
                     </td>
                  </tr>
                   <tr>
                       <td style="width: 25%">
                        <b>Employee Info from Section 1</b><br />
                                 Applicant
                     </td>
                     <td>Last Name (Family Name)<br />
                     {{ ($users->user) ? $users->user->last_name : '' }}
                     </td>
                     <td>First Name (Given Name)<br />
                     {{ ($users->user) ? $users->user->first_name : '' }}
                     
                     </td>
                     <td style="width: 5%">M.I.<br />
                         
                     
                     </td>
                     <td>Citizenship/Immigration Status<br />
                     <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == true) { echo "Yes"; } else { echo 'No'; }?>
                     </td>
                  </tr>
               </table>
                <table class="no-border">
                    <tr>
                        <td style="width: 32%;">
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List A<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Identify and Employment Authorization</b>
                        </td>
                        <td style="width: 2%;">
                            <b>OR</b>
                        </td>
                        <td style="width: 30%;">
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List B<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Identify</b>
                        </td>
                        <td style="width: 2%;">
                           <b>AND</b>
                        </td>
                        <td>
                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List C<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employment Authorization</b>
                        </td>
                  </tr>
                </table>
            </td>
         </tr>
        
      </table>
   </body>
</html>
