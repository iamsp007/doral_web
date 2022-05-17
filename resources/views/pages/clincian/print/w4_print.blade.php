<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Caregiver Enrollment Form</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-size: 11px;
            }
            @page {
                margin: 15px;
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
                font-size: 16px;
                padding-bottom: 5px;
                text-decoration: underline;
            }
            h2 {
                font-size: 14px;
            }
            p {
                text-align: justify;
                font-size: 11px;
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
            .pad-bottom-10 {
                padding: 0 0 10px 0 !important;
            }
            .pad-bottom-15 {
                padding: 0 0 15px 0 !important;
            }
            .pad-bottom-20 {
                padding: 0 0 20px 0 !important;
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
            .question {
                color: #0073de;
            }
            .page-title {
                display: block;
                width: 97%;
                font-size: 20px;
                font-weight: bold;
                color: #00569a;
                padding: 10px;
                text-align: center;
                border-bottom: 4px double #5fd7ff;
                margin-bottom: 5px;
            }
            .page-break {
                page-break-before: always;
            }
            .common-checkbox {
                color: #0073de;
            }
            /* img {
               display: inline-block; width: 7px; height: 10px; margin: 0 3px 0 0; padding: 0; vertical-align: top;
            } */
        </style>
    </head>
    <body
        style="
        margin: 0;
        padding: 10px;
        font-size: 11px;
        font-family: 'Open Sans', sans-serif;
        "
        >
        <table style="width: 100%; border: 0" cellspacing="0" cellpadding="0">
            <!--W-4 Start-->
            <tr>
                <td style="border: 0">
                   <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                       <tbody>
                         <tr>
                             <td>
                                 <table style="margin-top: 10px;">
                                     <tbody>
                                         <tr>
                                             <td style="width: 18%; border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td>Form <b style="font-size: 35px">W-4</b></td>
                                                         </tr>
                                                         <tr>
                                                             <td style="font-size: 9px;">
                                                                 Department of the Treasury<br> Internal Revenue Service
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                             <td align="center" style="border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                                 <label align="center"><b style="font-size: 16px; margin-left: 25%">Employee's Withholding Certificate </b></label><br>
                                                 &nbsp;<img
                                                        src="{{ asset('pdf_logos/triangle.png') }}"
                                                        style="
                                                           display: inline-block;
                                                           width: 7px;
                                                           height: 10px;
                                                           margin: 2px 0 0 0;
                                                           padding: 0;
                                                           vertical-align: top;
                                                        "
                                                     /><span style="font: bold; font-size: 9.5px;">&nbsp;Complete Form W-4 so that your employer can withhold the correct federal income tax from your pay</span>
                                                 <br>
                                                 <span style="padding-left: 140px;">
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
                                                     <b style="font-size: 11px;">&nbsp;Give Form W-4 to your employer.</b>
                                                 </span>
                                                 <br>
                                                 <span style="padding-left: 115px;">
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
                                                     <b style="font-size: 11px;">&nbsp;Your withholding is subject to review by the IRS.</b>
                                                 </span>
                                             </td>
                                             <td valign="top" style="width: 17%; border-bottom: 1px solid #000;">
                                                 <table cellspacing="0">
                                                     <tbody>
                                                         <tr>
                                                             <td style="border-bottom: 1px solid #000;">OMB No. 1545-0074</td>
                                                         </tr>
                                                         <tr>
                                                             <td style="font-size: 24px;font-weight: bold;">2022</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                     <tbody>
                                         <tr>
                                             <td valign="top" style="width: 5%; border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td style="font-size: 13px;line-height: 22px;font-weight: bold;">
                                                                 Step 1: <br>Enter<br>Personal<br>Information
                                                             </td>
                                                             </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                             <td style="border-bottom: 1px solid #000;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td width="30%" style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                                                 <p>First name and middle initial</p>
                                                                 <label class="">{{ ($users->user) ? $users->user->first_name : '' }}</label>
                                                             </td>
                                                             <td  width="30%" style="border-bottom: 1px solid #000; border-right: 1px solid #000;" align="left">
                                                                 <p>Last name</p>
                                                                 <label class="">{{ ($users->user) ? $users->user->last_name : '' }}</label>
                                                             </td>
                                                             <td width="40%" style="padding: 3px 15px;;font-weight: bold; border-bottom: 1px solid #000;">
                                                                 (b) Social Security Number <br> @if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif
                                                               </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td width="100%" style="border-bottom: 1px solid #000; padding-left: 0px;">
                                                                 <table cellspacing="0">
                                                                     <tbody>
                                                                         <tr>
                                                                             <td width="60%" style="border-right: 1px solid #000;" valign="top">
                                                                                 <table>
                                                                                     <tbody>
                                                                                         <tr>
                                                                                             <td valign="top" style="border-bottom: 1px solid #000; padding-left: 0px;">
                                                                                                 <p style=" font-weight: normal;">Address</p>
                                                                                                 <label class="">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}},{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}},
                                                                                                {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</label>
                                                                                             </td>
                                                                                         </tr>
                                                                                         <tr>
                                                                                             <td style=" padding-left: 0px;">
                                                                                                 <p style="font-weight: normal;">City or town, state, and ZIP code</p>
                                                                                                 <label class="">
                                                                                                     @if (isset($users->address_detail['address']))
                                                                                                    {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                                                                    @endif,
                                                                                                    @if (isset($users->address_detail['address']))
                                                                                                        {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                                                                    @endif,
                                                                                                    {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}
                                                                                                 </label>
                                                                                             </td>
                                                                                         </tr>
                                                                                     </tbody>
                                                                                 </table>
                                                                             </td>
                                                                             <td width="40%" style="padding: 3px 15px;;font-weight: bold;">
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
                                                                                 /> Does your name match the name on 
                                                                                 your social security
                                                                                 card? If not, to ensure 
                                                                                 you get credit for your
                                                                                 earnings, contact SSA
                                                                                 at 800-772-1213 or go
                                                                                 to www.ssa.gov.
                                                                             </td>
                                                                         </tr>
                                                                     </tbody>
                                                                 </table>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                                 <table>     
                                                     <tbody>
                                                         <tr>
                                                             <td style="">
                                                                 <table>
                                                                     <tbody>
                                                                         <tr>
                                                                             <td valign="top" style=" padding-left: 0px; width: 0.5%;">
                                                                                 (C)
                                                                             </td>
                                                                             @php
                                                                                $Single = $Married = $Head = '';
                                                                                if(isset($users->payroll_details['filesyourtax'])):
                                                                                    if($users->payroll_details['filesyourtax'] == 'Single or Married filing separately'):
                                                                                        $Single = 'checked';
                                                                                    elseif($users->payroll_details['filesyourtax'] == 'Married filling jointly or Qualifying widow(er)'):
                                                                                        $Married = 'checked';
                                                                                    elseif($users->payroll_details['filesyourtax'] == 'Head of Household (Check only if you’re unmarried and pay more than half the costs of the keeping up a home for yourself and a qualifying individual)'):
                                                                                        $Head = 'checked';
                                                                                    endif;
                                                                                endif;
                                                                            @endphp
                                                                             <td>
                                                                                 <div>
                                                                                     <span style="width: 100%; border:0px;display: block;"> 
                                                                                         <input {{ $Single}} type="checkbox"  onclick="return false;">
                                                                                         <b>Single</b> or <b>Married filing separately</b>
                                                                                     </span>
                                                                                     <span style="width: 100%;display: block;  border:0px; ">
                                                                                         <input {{$Married}} type="checkbox" onclick="return false;">
                                                                                             <b>Married filing jointly</b> or <b>Qualifying widow(er)</b>
                                                                                         </span>
                                                                                     <span style="width: 100%; border:0px;display: block;">
                                                                                         <input type="checkbox" {{$Head}} onclick="return false;">
                                                                                         <b style="" >Head of household</b><span style="font-size: 9.5px;"> (Check only if you're unmarried and pay more than half the costs of keeping up a home for yourself and a qualifying individual.</span>
                                                                                     </span>
                                                                                 </div>
                                                                             </td>
                                                                         </tr>
                                                                     </tbody>
                                                                 </table>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <table cellspacing="0" cellpadding="0" width="100%" align="center" style="margin-top: -8px; border-bottom: 1px solid #000; ">
                                     <tbody>
                                         <tr class="border-bottom">
                                             <td style="font-size: 16px">
                                                 <b>Complete Steps 2-4 ONLY if they apply to you; otherwise, skip to Step 5.</b> See page 2 for more information on each step, who can claim exemption from withholding, when to use the online estimator, and privacy.
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td> 
                         </tr>
                         <tr>
                             <td>
                                 <table cellspacing="0" cellpadding="0" width="100%" align="center" style="margin-top: -8px;">
                                     <tbody>
                                         <tr>
                                             <td>
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td width="15%" valign="top" style="font-size: 14px; line-height: 22px;font-weight: bold;">
                                                                 Step 2: <br>Multiple Jobs<br>or Spouse<br>Works
                                                             </td>
                                                             <td width="85%" style="padding: 10px 15px 5px 15px; font-size: 12px; ">
                                                                 Complete this step if you (1) hold more than one job at a time, or (2) are married filing jointly and your spouse also works. The correct amount of withholding depends on income earned from all of these jobs.
                                                                 <br>
                                                                 Do only one of the following.
                                                                 <ol type="a" style="list-style: none;">
                                                                     <li><b>(a)</b> Use the estimator at www.irs.gov/W4App for most accurate withholding for this step (and Steps 3-4); or</li>
                                                                     <li><b>(b)</b> Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate withholding; or</li>
                                                                     <li value="option3"><b>(c)</b> If there are only two jobs total, you may check this box. Do the same on Form W-4 for the other job. This option is accurate for jobs with similar pay; otherwise, more tax than necessary may be withheld......................... <input class="" type="checkbox" onclick="return false;"></li>
                                                                 </ol>
                                                                 TIP: To be accurate, submit a 2021 Form W-4 for all other jobs. If you (or your spouse) have self-employment income, including as an independent contractor, use the estimator
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="font-size: 14px">
                                                 <b>Complete Steps 3–4(b) on Form W-4 for only ONE of these jobs.</b> Leave those steps blank for the other jobs. (Your withholding will be most accurate if you complete Steps 3–4(b) on the Form W-4 for the highest paying job.)
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td> 
                         </tr>
                         <tr>
                             <td>
                                 <table>
                                     <tbody>
                                         <tr>
                                             <td width="15%" valign="top" style="font-size: 14px;line-height: 22px; font-weight: bold;border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                                 Step 3: <br>Claim <br>Dependents
                                             </td>
                                             <td width="60%" valign="top" style="padding: 10px 0 15px 0; border-right: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" >
                                                 <label style="font-size: 14px; font-weight: normal;">
                                                     If your income will be $200,000 or less ($400,000 or less if married filing jointly):
                                                 </label>
                                                 <ul>
                                                     <li style="list-style-type: none; font-weight: normal;">
                                                         Multiply the number of qualifying children under age 17 by $2,000: &nbsp;<img
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
                                                     </li>
                                                     <li style="list-style-type: none; font-weight: normal;">
                                                         Multiply the number of other dependents by $500......&nbsp;<img
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
                                                     </li>
                                                 </ul>
                                                 <label  style="font-size: 14px; font-weight: normal;">Add the amounts above and enter the total here............ </label>
                                             </td>
                                             <td width="5%" valign="top" style="border-right: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td align="right" style="padding: 5px 10px; font-weight: bold;">3</td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                             <td width="20%" valign="top" style="border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td style="padding: 5px 10px;font-weight: bold;"><span class="">$ {{ isset($users->payroll_details['totalClaimAmount']) ? $users->payroll_details['totalClaimAmount'] : '' }}</span></td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <table>
                                     <tbody>
                                         <tr>
                                             <td width="15%" valign="top" style="font-size: 14px;line-height: 22px; font-weight: bold;">
                                                 Step 4: <br>(optional):<br>Other<br>Adjustments
                                             </td>
                                             <td width="60%" style=" font-weight: normal;">
                                                 <table>
                                                     <tbody>
                                                         <tr>
                                                             <td style="padding-bottom: 8px">
                                                                 <b> (a) Other income (not from jobs).</b> If you want tax withheld for other
                                                             income you expect this year that won’t have withholding, enter the
                                                             amount of other income here. This may include interest, dividends,
                                                             and retirement income
                                                             </td>
                                                         </tr>
                                                         <tr>
                                                             <td style="padding-bottom: 8px">
                                                                 <b> (b) Deductions.</b> If you expect to claim deductions other than the
                                                             standard deduction and want to reduce your withholding, use the
                                                             Deductions Worksheet on page 3 and enter the result here . . . . . . . .
                                                             . . . . . . . . . . . . .
                                                             </td>
                                                         </tr>
                                                         <tr>
                                                             <td>  
                                                                 <b>   (c) Extra withholding.</b>  Enter any additional tax you want withheld
                                                             each pay period
                                                             </td>
                                                         </tr>                                  
                                                     </tbody>
                                                 </table>
                                             </td>
                                             <td width="25%" valign="top">
                                                 <table border="0" cellspacing="0" cellpadding="0">
                                                     <tbody>
                                                         <tr>
                                                             <td width="5%" valign="top">
                                                                 <table border="1" style="border-right: none;border-top: none;" cellspacing="0" cellpadding="0">
                                                                     <tbody>
                                                                         <tr>
                                                                             <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(a)</td>
                                                                         </tr>
                                                                         <tr>
                                                                             <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(b)</td>
                                                                         </tr>
                                                                         <tr>
                                                                             <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(c)</td>
                                                                         </tr>
                                                                     </tbody>
                                                                 </table>
                                                             </td>
                                                             <td width="20%" valign="top">
                                                                 <table border="1" cellspacing="0" cellpadding="0" style="border-top: none;">
                                                                     <tbody>
                                                                         <tr>
                                                                             <td class="" style="padding: 15px;text-align: left; border:1px solid #000;border-top: none;"></td>
                                                                         </tr>
                                                                         <tr>
                                                                             <td class="" style="padding: 15px;text-align: left; border:1px solid #000;"></td>
                                                                         </tr>
                                                                         <tr>
                                                                             <td class="" style="padding: 15px;text-align: left; border:1px solid #000;"></td>
                                                                         </tr>
                                                                     </tbody>
                                                                 </table>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <table style="border-top: 1px solid #000;">
                                     <tbody>
                                         <tr>
                                             <td width="10.5%" valign="top" style="font-size: 14px;line-height: 22px; font-weight: bold;border-bottom: 1px solid #000;">
                                                 Step 5: <br>
                                                 Sign<br>
                                                 Here
                                             </td>
                                             <td width="85%" valign="top" style="border-bottom: 1px solid #000; font-weight: bold;border-left: 1px solid #000">
                                                 <label style="font-size:12px; font-weight: normal; ">Under penalties of perjury, I declare that this certificate, to the best of my knowledge and belief, is true, correct, and complete.</label>
                                                 <div class="Sigdate">
                                                     <div class="Sign">
                                                         <span>
                                                              
                                                         @if($users->signature_url)
                                                             <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                        @endif
                                                         </span><br><br>
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
                                                             /> Employee’s signature (This form is not valid
                                                         unless you sign it.)
                                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img
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
                                                         Date :  {{date('m/d/Y')}}
                                                     </div>
                                                 </div>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <table style="margin-top: -8px;">
                                     <tbody>
                                         <tr>
                                             <td width="5%" valign="top" style="font-size: 14px;line-height: 22px; font-weight: bold;border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                 Employers <br>
                                                 Only
                                             </td>
                                             <td class="" width="35%" valign="top" style="font-size: 10px;line-height: 22px;  border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                 Employer's name and address <br>{{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}
                                             </td>
                                             <td width="20%" valign="top" style="font-size: 10px;line-height: 22px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                 First date of 
                                                 employment
                                             </td>
                                             <td width="30%" valign="top" style="font-size: 10px;line-height: 22px; border-bottom: 1px solid #000;">
                                                 Employer
                                                 identification
                                                 number (EIN)
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                     </tbody>
                   </table>
                </td>
            </tr>
        <!--W-4 End-->
        </table>
    </body>
</html>
