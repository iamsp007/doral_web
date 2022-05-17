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
            border: 1px solid #e0e0e0;
         }

         .border {
            border: 1px solid #e0e0e0;
         }

         .no-border {
            border: 0 !important;
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
         
         .submitBtn {
            margin-top: 31px;
            margin-left: 50%;
            margin-bottom: 20px;
            background-color: blue;
            color: white;
            border-radius: 3px;
            width: 5%;
            height: 37px;
            cursor: pointer;
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
            height:28px;
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
      <table style="width: 100%; border: 1px solid #e0e0e0;" cellspacing="0" cellpadding="0">
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
                           OMB No. 1615-0047<br />
                           Expires 03/31/2016
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
                        <b>START HERE.</b> Read instructions carefully before
                        completing this form. The instructions must be available
                        during completion of this form.
                        <b>ANTI-DISCRIMINATION NOTICE:</b> It is illegal to
                        discriminate against work-authorized individuals.
                        Employers <b>CANNOT</b> specify which document(s) they
                        will accept from an employee. The refusal to hire an
                        individual because the documentation presented has a
                        future expiration date may also constitute illegal
                        discrimination.
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <table>
                           <tr>
                              <td class="no-border pad-bottom-5">
                                 <table class="table-border">
                                    <tr>
                                       <td class="para">
                                          <b
                                             >Section 1. Employee Information
                                             and Attestation</b
                                          >
                                          <em
                                             >(Employees must complete and sign
                                             Section 1 of Form I-9 no later than
                                             the first day of employment, but
                                             not before accepting a job
                                             offer.)</em
                                          >
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="no-border pad-bottom-5">
                                 <table class="table-border">
                                    <tr>
                                       <td class="no-border">
                                          <b>Last Name</b> <em>(Family Name)</em
                                          ><br /><span class="common-checkbox">{{ ($users->user) ? $users->user->last_name : '' }}</span>
                                       </td>
                                       <td class="no-border">
                                          <b>First Name</b> <em>(Given Name)</em
                                          ><br /><span class="common-checkbox">{{ ($users->user) ? $users->user->first_name : '' }}</span>
                                       </td>
                                       <td class="no-border">
                                          <b>Middle Initial</b><br /><span class="common-checkbox"></span>
                                       </td>
                                       <td>
                                          <b>Other Names Used</b>
                                          <em>(if any)</em><br />
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="no-border pad-bottom-5">
                                 <table class="table-border">
                                    <tr>
                                       <td>
                                          <b>Address</b>
                                          <em>(Street Number and Name)</em
                                          ><br />
                                          <span class="common-checkbox">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}</span>
                                       </td>
                                       <td><b>Apt. Number</b><br /><span class="common-checkbox">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}
                                          {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></td>
                                       <td>
                                          <b>City of Town</b><br /><span class="common-checkbox">@if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                        @endif</span>
                                       </td>
                                       <td><b>State</b><br /><span class="common-checkbox">@if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                        @endif</span></td>
                                       <td><b>Zip Code</b><br /><span class="common-checkbox">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td class="no-border pad-bottom-5">
                                 <table class="table-border">
                                    <tr>
                                       <td>
                                          <b>Date of Birthday</b>
                                          <em>(mm/dd/yyyy)</em><br />
                                          <span class="common-checkbox">{{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}</span>
                                       </td>
                                       <td>
                                          <b>U.S. Social Security Number</b
                                          ><br /><span class="common-checkbox">@if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif</span>
                                       </td>
                                       <td>
                                          <b>E-mail Address</b
                                          ><br /><span class="common-checkbox">{{ ($users->user) ? $users->user->email : '' }}</span>
                                       </td>
                                       <td>
                                          <b>Telephone Number</b><br />
                                          <span class="common-checkbox">{{ ($users->phone) ? $users->phone : ''}}</span>
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
                     <td colspan="2">
                        I am aware that federal law provides for imprisonment
                        and/or fines for false statements or use of false
                        documents in connection with the completion of this
                        form.
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        I arrest, under penalty of perjury, that I am (check one
                        of the following):
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 10px; padding-top: 0">
                        <input 
                           <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == true) { echo "checked"; } ?>
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                        />
                     </td>
                     <td>A citizen of the United States</td>
                  </tr>
                  <tr>
                     <td style="width: 10px; padding-top: 0">
                        <input
                           <?php if(isset($users->address_detail['info']['us_citizen']) && $users->address_detail['info']['us_citizen'] == false) { echo "checked"; } ?>
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                        />
                     </td>
                     <td>
                        A noncitizen national of the United States
                        <em>(See instruction)</em>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 10px; padding-top: 0">
                        <input
                           type="checkbox"
                           style="vertical-align: top; margin: 0"
                        />
                     </td>
                     <td>
                        An alien authorized to work until (expiration date, if
                        applicable, mm/dd/yyyy)_____.<br />
                        Some aliens may write "N/A" in this field.
                        <em>(See instruction)</em>
                        <table>
                           <tr>
                              <td colspan="2" style="padding-bottom: 10px">
                                 <em
                                    >For aliens authorized to work, provide your
                                    Alien Registration Number/USCIS Number OR
                                    Form I-94 Admission Number.</em
                                 >
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table>
                                    <tr>
                                       <td>
                                          1. Alien Registration Number/USCIS
                                          Number : <span class="common-checkbox">{{ isset($users->address_detail['info']['immigration_id']) ? $users->address_detail['info']['immigration_id'] : null }}</span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td><b>OR</b></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          2. Form I-94 Admission Numner
                                          : <span class="common-checkbox"></span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="pad-left-20">
                                          If you obtained your admission number
                                          from CBP in connection with your
                                          arrival in the United States, include
                                          the following :
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="pad-left-20">
                                          Foreign Passport Number
                                          :<span class="common-checkbox"></span>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="pad-left-20">
                                          Country of Issuance
                                          :__________________
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="pad-left-20">
                                          Some aliens may write "N/A" on the
                                          Foreign Passport Number and Country of
                                          Issuance fields.
                                          <em>(See instructions)</em>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td
                                 class="border text-center"
                                 style="width: 200px"
                              >
                                 3-D Barcode<br />
                                 Do Not Write In This Space
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>

               <table class="table-border" style="margin-top: 10px">
                  <tr>
                     <td style="width: 140px" class="no-border">
                        <b>Signature of Employee:</b>
                     </td>
                     <td class="no-border">
                     @if($users->signature_url)
                        <img
                            src="{{ $users->signature_url }}"
                           alt="Signature"
                           class="sign"
                        />
                        @endif
                     </td>
                     <td>
                        <b>Date</b> <em>(mm/dd/yyyy)</em><br />
                        <span class="common-checkbox">{{date('m/d/Y')}}</span>
                     </td>
                  </tr>
               </table>

               <table class="table-border mr-top-10px">
                  <tr>
                     <td>
                        <b>Preparer and/or Translator Certification </b>
                        <em
                           >(To be completed and signed if Section 1 is prepared
                           by a person other than the employee.)</em
                        >
                     </td>
                  </tr>
               </table>

               <table class="mr-top-10px">
                  <tr>
                     <td>
                        I attest, under penalty of perjury, that I have assisted
                        in the completion of this form and that to the best of
                        my knowledge the information is true and correct.
                     </td>
                  </tr>
               </table>

               <table class="mr-top-10px">
                  <tr>
                     <td class="no-border pad-bottom-5">
                        <table class="table-border">
                           <tr>
                              <td style="width: 220px" class="no-border">
                                 <b>Signature of Preparer or Translator:</b>
                              </td>
                              <td class="no-border">
                                 <img
                                    src=""
                                    alt="Signature"
                                    class="sign"
                                 />
                              </td>
                              <td>
                                 <b>Date</b> <em>(mm/dd/yyyy)</em><br />
                                 01/01/2021
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td class="no-border pad-bottom-5">
                        <table class="table-border">
                           <tr>
                              <td class="no-border">
                                 <b>Last Name</b> <em>(Family Name)</em><br />
                                 {{ ($users->user) ? $users->user->last_name : '' }}
                              </td>
                              <td class="no-border">
                                 <b>First Name</b> <em>(Given Name)</em><br />
                                 {{ ($users->user) ? $users->user->first_name : '' }}
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td class="no-border pad-bottom-5">
                        <table class="table-border">
                           <tr>
                              <td>
                                 <b>Address</b> <em>(Street Number and Name)</em
                                 ><br />
                                 {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}
                              </td>
                              <td><b>City of Town</b><br />@if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                        @endif</td>
                              <td><b>State</b><br />@if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                        @endif</td>
                              <td><b>Zip Code</b><br />{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</td>
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
                           font-weight: bold;
                        "
                     >
                        Employer Completes Next Page
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
            <td style="height: 30px"></td>
         </tr>
         @php
            $doc_title_1 = $issuing_authority_1 = $document_number_1 = $expiration_date_1 = $doc_title_2 = $issuing_authority_2 = $document_number_2 = $expiration_date_2 = $doc_title_3 = $issuing_authority_3 = $document_number_3 = $expiration_date_3 = $doc_title_4 = $issuing_authority_4 = $document_number_4 = $expiration_date_4 = $doc_title_5 = $issuing_authority_5 = $document_number_5 = $expiration_date_5 =  $certification_date = $signature_date = $lname = $fname = $sec3_newname = $sec3_lname = $sec3_fname = $sec3_middle = $sec3_rehire_date = $sec3_title = $sec3_docnumber = $sec3_expiration_date = $seclast_date = $seclast_name = $addition_info = '';
            
            if ($users->employer_verify):
               $doc_title_1 = $users->employer_verify['doc_title_1'];
               $issuing_authority_1 = $users->employer_verify['issuing_authority_1'];
               $document_number_1 = $users->employer_verify['document_number_1'];
               $expiration_date_1 = $users->employer_verify['expiration_date_1'];
               $doc_title_2 = $users->employer_verify['doc_title_2'];
               $issuing_authority_2 = $users->employer_verify['issuing_authority_2'];
               $document_number_2 = $users->employer_verify['document_number_2'];
               $expiration_date_2 = $users->employer_verify['expiration_date_2'];
               $doc_title_3 = $users->employer_verify['doc_title_3'];
               $issuing_authority_3 = $users->employer_verify['issuing_authority_3'];
               $document_number_3 = $users->employer_verify['document_number_3'];
               $expiration_date_3 = $users->employer_verify['expiration_date_3'];
               $doc_title_4 = $users->employer_verify['doc_title_4'];
               $issuing_authority_4 = $users->employer_verify['issuing_authority_4'];
               $document_number_4 = $users->employer_verify['document_number_4'];
               $expiration_date_4 = $users->employer_verify['expiration_date_4'];
               $doc_title_5 = $users->employer_verify['doc_title_5'];
               $issuing_authority_5 = $users->employer_verify['issuing_authority_5'];
               $document_number_5 = $users->employer_verify['document_number_5'];
               $expiration_date_5 = $users->employer_verify['expiration_date_5'];
               $certification_date = $users->employer_verify['certification_date'];
               $signature_date = $users->employer_verify['signature_date'];
               $lname = $users->employer_verify['lname'];
               $fname = $users->employer_verify['fname'];
               $sec3_newname = $users->employer_verify['sec3_newname'];
               $sec3_lname = $users->employer_verify['sec3_lname'];
               $sec3_fname = $users->employer_verify['sec3_fname'];
               $sec3_middle = $users->employer_verify['sec3_middle'];
               $sec3_rehire_date = $users->employer_verify['sec3_rehire_date'];
               $sec3_title = $users->employer_verify['sec3_title'];
               $sec3_docnumber = $users->employer_verify['sec3_docnumber'];
               $sec3_expiration_date = $users->employer_verify['sec3_expiration_date'];
               $seclast_date = $users->employer_verify['seclast_date'];
               $seclast_name = $users->employer_verify['seclast_name'];
               $addition_info = isset($users->employer_verify['addition_info']) ? $users->employer_verify['addition_info'] : '';
            endif;
         @endphp
         <form class="add_patient_form">
         @csrf
            <tr>
               <td>
                  <input type="hidden" name="user_id" value="{{ $users->user_id }}">
                  <table class="table-border">
                     <tr>
                        <td>
                           <b style="font-size: 14px"
                              >Section 2. Employer or Authorized Representative
                              Review and Verification</b
                           ><br />
                           <em>
                              (Employer or their authorized representative must
                              complete and sign Section2 within 3 business days of
                              the employee's first day of employment. You must
                              physically examine one document from List A OR
                              examine a combination of one document from List B and
                              one document from List C as listed on the "Lists of
                              Acceptable Documents" on the next page of this form.
                              For each document you review, record the following
                              information: document title, issuing authority,
                              document number, and expiration date, if any.)
                           </em>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td>
                  <table class="table-border">
                     <tr>
                        <td>
                           Employee Last Name, First Name and Middle Initial from
                           <b>Section 1:</b>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td>
                  <table>
                     <tr>
                        <td class="text-center">
                           <b>List A<br />Identify and Employment Authorization</b
                           ><br />
                           <table class="table-border mr-top-10px mr-bottom-5px">
                              <tr>
                                 <td>
                                    <b>Document Title :</b><br />
                                    <input name="employer_verify[doc_title_1]" type="text" value="{{ $doc_title_1 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Issuing Authority :</b><br />
                                    <input name="employer_verify[issuing_authority_1]" type="text" value="{{ $issuing_authority_1 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Document Number :</b><br />
                                    <input name="employer_verify[document_number_1]" type="text" value="{{ $document_number_1 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b
                                       >Expiration Date <em>(if any)</em
                                       ><em>(mm/dd/yyyy)</em> :</b
                                    ><br />
                                    <input name="employer_verify[expiration_date_1]" type="text" value="{{ $expiration_date_1 }}"/>
                                 </td>
                              </tr>
                           </table>
                           <table class="table-border mr-bottom-5px">
                              <tr>
                                 <td>
                                    <b>Document Title :</b><br />
                                    <input name="employer_verify[doc_title_2]" type="text" value="{{ $doc_title_2 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Issuing Authority :</b><br />
                                    <input name="employer_verify[issuing_authority_2]" type="text" value="{{ $issuing_authority_2 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Document Number :</b><br />
                                    <input name="employer_verify[document_number_2]" type="text" value="{{ $document_number_2 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b
                                       >Expiration Date <em>(if any)</em
                                       ><em>(mm/dd/yyyy)</em> :</b
                                    ><br />
                                    <input name="employer_verify[expiration_date_2]" type="text" value="{{ $expiration_date_2 }}"/>
                                 </td>
                              </tr>
                           </table>
                           <table class="table-border mr-bottom-5px">
                              <tr>
                                 <td>
                                    <b>Document Title :</b><br />
                                    <input name="employer_verify[doc_title_3]" type="text" value="{{ $doc_title_3 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Issuing Authority :</b><br />
                                    <input name="employer_verify[issuing_authority_3]" type="text" value="{{ $issuing_authority_3 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Document Number :</b><br />
                                    <input name="employer_verify[document_number_3]" type="text" value="{{ $document_number_3 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b
                                       >Expiration Date <em>(if any)</em
                                       ><em>(mm/dd/yyyy)</em> :</b
                                    ><br />
                                    <input name="employer_verify[expiration_date_3]" type="text" value="{{ $expiration_date_3 }}"/>
                                 </td>
                              </tr>
                           </table>
                        </td>
                        <td
                           class="text-center"
                           style="width: 20px; padding: 3px 0"
                        >
                           <b>OR</b>
                        </td>
                        <td class="text-center">
                           <b>List B<br />Identify</b><br />
                           <table class="table-border mr-top-10px mr-bottom-10px">
                              <tr>
                                 <td>
                                    <b>Document Title :</b><br />
                                    <input name="employer_verify[doc_title_4]" type="text" value="{{ $doc_title_4 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Issuing Authority :</b><br />
                                    <input name="employer_verify[issuing_authority_4]" type="text" value="{{ $issuing_authority_4 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Document Number :</b><br />
                                    <input name="employer_verify[document_number_4]" type="text" value="{{ $document_number_4 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b
                                       >Expiration Date <em>(if any)</em
                                       ><em>(mm/dd/yyyy)</em> :</b
                                    ><br />
                                    <input name="employer_verify[expiration_date_4]" type="text" value="{{ $expiration_date_4 }}"/>
                                 </td>
                              </tr>
                           </table>
                           <table class="table-border" style="margin-top: 40px">
                           <tr>
                              <td
                                 class="border text-center"
                                 style="height: 184px;"
                              >
                                 Additional Information
                                 <input name="employer_verify[addition_info]" type="text" value="{{ $addition_info }}"/>
                              </td>
                           </tr>
                        </table>
                        </td>
                        <td
                           class="text-center"
                           style="width: 30px; padding: 3px 0"
                        >
                           <b>AND</b>
                        </td>
                        <td class="text-center">
                           <b>List C<br />Employment Authorization</b><br />
                           <table class="table-border mr-top-10px mr-bottom-10px">
                              <tr>
                                 <td>
                                    <b>Document Title :</b><br />
                                    <input name="employer_verify[doc_title_5]" type="text" value="{{ $doc_title_5 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Issuing Authority :</b><br />
                                    <input name="employer_verify[issuing_authority_5]" type="text" value="{{ $issuing_authority_5 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Document Number :</b><br />
                                    <input name="employer_verify[document_number_5]" type="text" value="{{ $document_number_5 }}"/>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b
                                       >Expiration Date <em>(if any)</em
                                       ><em>(mm/dd/yyyy)</em> :</b
                                    ><br />
                                    <input name="employer_verify[expiration_date_5]" type="text" value="{{ $expiration_date_5 }}"/>
                                 </td>
                              </tr>
                           </table>

                           <table class="table-border" style="margin-top: 40px">
                              <tr>
                                 <td
                                    class="border text-center"
                                    style="height: 200px"
                                 >
                                    3-D Barcode<br />
                                    Do Not Write In This Space
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td>
                  <h2>Certification</h2>
                  <br />
                  I attest, under penalty of perjury, that (1) I have examined the
                  document(s) presented by the above-named employee, (2) the
                  above-listed document(s) appear to be genuine and to relate to
                  the employee named, and (3) to the best of my knowledge the
                  employee is authorized to work in the United States.<br /><br />
                  The employee’s first day of employment
                  <em>(mm/dd/yyyy)</em>:<input type="text" name="employer_verify[certification_date]" value="{{ $certification_date }}"> (See instruction for
                  exemptions.)
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border mr-top-10px">
                     <tr>
                        <td class="no-border" style="width: 200px">
                           <b
                              >Signature of Employer or Authorized
                              Representative</b
                           >
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
                           <b>Date</b> <em>(mm/dd/yyyy)</em><br />
                           <input type="text" name="employer_verify[signature_date]" value="{{ $signature_date }}">
                        </td>
                        <td style="width: 200px">
                           <b>Title of Employer or Authorized Representative</b
                           ><br />
                           Human Resources
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tbody>
                        <tr>
                           <td class="no-border">
                              <b>Last Name</b> <em>(Family Name)</em><br /><input type="text" name="employer_verify[lname]" value="{{ $lname }}">
                           </td>
                           <td class="no-border">
                              <b>First Name</b> <em>(Given Name)</em><br /><input type="text" name="employer_verify[fname]" value="{{ $fname }}">
                           </td>
                           <td>
                              <b>Employer's Business or Organization Name</b><br />
                              @if(isset($users->professional_detail) && isset( $users->professional_detail['npiOrgName']))
                           {{ $users->professional_detail['npiOrgName'] }} @endif
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tbody>
                        <tr>
                           <td>
                              <b>Employer's Business or Organization Address</b>
                              <em>(Street Number and Name)</em><br />
                              @if (isset($users->professional_detail['npa_address1']))
                              {{ $users->professional_detail['npa_address1'] }}
                           @endif
                           @if (isset($users->professional_detail['npa_address2']))
                              {{ $users->professional_detail['npa_address2'] }}
                           @endif
                           {{ isset($users->professional_detail['npa_building']) ? $users->professional_detail['npa_building'] : '' }}
                           </td>
                           <td><b>City of Town</b><br /> @if (isset($users->professional_detail['npa_cityId']))
                              {{ \App\Models\City::find($users->professional_detail['npa_cityId'])->city }}
                           @elseif(isset($users->professional_detail['npa_city'] ))
                              {{ $users->professional_detail['npa_city'] }}
                           @endif</td>
                           <td><b>State</b><br /> @if (isset($users->professional_detail['npa_stateId']))
                                {{ \App\Models\State::find($users->professional_detail['npa_stateId'])->state }}
                              @elseif(isset($users->professional_detail['npa_state'] ))
                                 {{ $users->professional_detail['npa_state'] }}
                              @endif</td>
                           <td><b>Zip Code</b><br />{{ isset($users->professional_detail['npa_zipCode']) ? $users->professional_detail['npa_zipCode'] : '' }}</td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tr>
                        <td class="para">
                           <b>Section 3. Reverification and Rehires</b>
                           <em
                              >(To be completed and signed by employer or
                              authorized representative.)</em
                           >
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tr>
                        <td class="no-border" style="width: 20px">
                           <b>A.</b>
                        </td>
                        <td class="no-border">
                           <b>New Name</b> <em>(if applicable)</em><br /><input type="text" name="employer_verify[sec3_newname]" value="{{ $sec3_newname }}">
                        </td>
                        <td class="no-border">
                           <b>Last Name</b> <em>(Family Name)</em><br /><input type="text" name="employer_verify[sec3_lname]" value="{{ $sec3_lname }}">
                        </td>
                        <td class="no-border">
                           <b>First Name</b> <em>(Given Name)</em><br /><input type="text" name="employer_verify[sec3_fname]" value="{{ $sec3_fname }}">
                        </td>
                        <td class="no-border">
                           <b>Middle Initial</b><br /><input type="text" name="employer_verify[sec3_middle]" value="{{ $sec3_middle }}">
                        </td>
                        <td class="no-border border-left" style="width: 20px">
                           <b>B.</b>
                        </td>
                        <td class="no-border">
                           <b>Date of Rehire </b>
                           <em>(if applicable) (mm/dd/yyyy)</em><br /><input type="text" name="employer_verify[sec3_rehire_date]" value="{{ $sec3_rehire_date }}">
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tr>
                        <td class="no-border" style="width: 20px">
                           <b>C.</b>
                        </td>
                        <td class="no-border">
                           If employee’s previous grant of employment authorization
                           has expired, provide the information for the document
                           from List A or List C the employee presented that
                           establishes current employment authorization in the
                           space provided below.
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tr>
                        <td>
                           <b>Document Title</b><br />
                           <input type="text" name="employer_verify[sec3_title]" value="{{ $sec3_title }}">
                        </td>
                        <td>
                           <b>Document Number</b><br />
                           <input type="text" name="employer_verify[sec3_docnumber]" value="{{ $sec3_docnumber }}">
                        </td>
                        <td>
                           <b>Expiration Date</b>
                           <em>(if any) (mm/dd/yyyy)</em><br />
                           <input type="text" name="employer_verify[sec3_expiration_date]" value="{{ $sec3_expiration_date }}">
                        </td>
                     </tr>
                  </table>
               </td> 
            </tr>
            <tr>
               <td>
                  I attest, under penalty of perjury, that to the best of my
                  knowledge, this employee is authorized to work in the United
                  States, and if the employee presented document(s), the
                  document(s) I have examined appear to be genuine and to relate to
                  the individual.
               </td>
            </tr>
            <tr>
               <td class="no-border pad-bottom-5">
                  <table class="table-border">
                     <tr>
                        <td class="no-border" style="width: 200px">
                           <b>Signature of Employer of Authorized Representative</b>
                        </td>
                        <td class="no-border">
                        @if($users->signature_url)
                           <img style="margin: 10px 0"
                            src="{{ $users->signature_url }}"
                           alt="Signature"
                           class="sign"
                        />
                      
                        @endif
                          
                        </td>
                        <td>
                           <b>Date</b><em>(mm/dd/yyyy)</em><br />
                           <input type="text" name="employer_verify[seclast_date]" value="{{ $seclast_date }}">
                        </td>
                        <td style="width: 200px">
                           <b>Print Name of Employer of Authorized Representative</b><br />
                           <input type="text" name="employer_verify[seclast_name]" value="{{ $seclast_name }}">
                        </td>
                     </tr>
                  </table>
                   <!-- <button type="submit" class="submitBtn" name="submit" value="Submit">Submit</button> -->
                   <input type="submit" value="Submit" id="add_note" class="submitBtn">
               </td>
            </tr>
         </form>
      </table>
   </body>
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script>
         /*@ Store / Update admin */
         $(document).on('click','.submitBtn',function(event) {
            event.preventDefault();

            var url = "{{ Route('store.i9form_verify') }}";
            var fdata = new FormData($(".add_patient_form")[0]);
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
                        $('.add_patient_form')[0].reset();
                  }
                  $("#loader-wrapper").hide();
               },
               error: function() {
                  alertText("Server Timeout! Please try again",'warning');
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
   </script>
</html>
