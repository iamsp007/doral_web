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
                border: 1px solid #000;
            }

            .border {
                border: 1px solid #000;
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

            .page-break {
                page-break-before: always !important;
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
            <!--Notice and Acknowledgment of Pay Rate and Payday Start-->
            <tr>
               <td style="border: 0">
                  <table align="center">
                     <tr>
                         <td width="100%" align="center" style="padding-bottom: 15px;font-size: 16px; font-weight: bold; position: relative; border-top: 1px solid; padding-top: 15px; text-align: center; ">
                             <img src="{{ asset('pdf_logos/new-york-state-of-opportunity-logo.jpg') }}" style="position: absolute;left: 0px; top: 5px; width: 104px;">
                             Notice and Acknowledgment of Pay Rate and Payday <br>
                             Under Section 195.1 of the New York State Labor Law <br>
                             Notice for Employees Paid a Weekly Rate or a Salary for a Fixed Numebr of hours(40 or Fewer in a week)
                         </td>       
                     </tr>
                 </table>
                 <table width="100%">    
                       <tr>
                           <td width="32%" valign="top" style="display: inline-block;font-weight: bold;padding: 0;line-height: 15px" class="mystyle">
                               <div style="margin-bottom: 30px">
                                   8. Employee Acknowledgment:
                                   on this day i have been notified of my
                                   pay rate, overtime rate(if eligible),
                                   allowances, and designed pay day on
                                   the date given below. I told my
                                   employer what my primary language is.<br><br>
                                   Check One:<br>
                                   <input checked="" class="common-checkbox" type="checkbox" onclick="return false;"> I have been given this pay notice in
                                   English because it is primary language.<br>
                                   <input type="checkbox" onclick="return false;"> My primary language is<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> API HAS
                                   LANGUAGE ID I have been given this
                                   pay notice in English only, because the
                                   department of Labor does not yet offer
                                   a pay notice from in my primary
                                   language.
                               </div>
                               <div style="display: block;width: 100%;margin-bottom: 15px">
                                   <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;"> {{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}</label>
                                   <p style="font-weight: normal;">Print Employee Name</p>
                               </div>
                               <div style="display: block;width: 100%;margin-bottom: 15px">
                                   <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;"> 
                                    @if($users->signature_url)
                                       <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                        @endif
                                   </label>
                                   <p style="font-weight: normal;">Employee Signature</p>
                               </div>
                               <div style="display: block;width: 100%;margin-bottom: 15px">
                                   <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;">{{date('m/d/Y')}}</label>
                                   <p style="font-weight: normal;">Date</p>
                               </div>
                               <div style="display: block;width: 100%;margin-bottom: 15px">
                                   <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;"></label>
                                   <p style="font-weight: normal;">Preparer's Name and Title</p>
                               </div>
                               <p style="font-weight: normal; flex-direction: column;">
                                   <b style="font-weight: bold;" >The Employee must receive a signed
                                       copy of this form. The employer must
                                       keep the original for 6 years.</b><br>
                                   <b style="font-weight: bold;" >    Please Note:</b> it is unlaeful for an employee
                                   to be paid less then an employee of the
                                   opposite sex for equal work. Employers also
                                   may not prohibit employees from discussing
                                   wages with their co-workers.</p>
                           </td>
                           <td width="30%" valign="top"  style="display: inline-block;font-weight: bold;padding: 0 10px 0 20px; vertical-align:top;line-height: 15px">
                               <div style="margin-bottom: 10px">
                                   3. Employee's rate of pay:<br>
                                   &nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for<span style="text-decoration: underline;">&nbsp;&nbsp;</span>
                                   <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for<span style="text-decoration: underline;">&nbsp;&nbsp;</span>
                                   <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for<span style="text-decoration: underline;">&nbsp;&nbsp;</span>
                                   <br><br><span><b>&nbsp;&nbsp;&nbsp;<u> 3a. Wage Parity Rates:</u></b></span>
                                   
                                   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b style="text-decoration: underline;">Rate 1:</b></span>
                                   <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for regular wage
                                   <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for additional wage
                                   <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for supplemental wages*
                                   <br>
                                   
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b style="text-decoration: underline;">Rate 2:</b></span>
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for regular wage
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for additional wage
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for supplemental wages*
                                   
                                   <br>
                                  
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b style="text-decoration: underline;">Rate 3:</b></span>
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for regular wage
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for additional wage
                                    <br>&nbsp;&nbsp;&nbsp; $ _<span style="text-decoration: underline;"></span> per hour for supplemental wages*
                                   
                               </div>
                               <div style="margin-bottom: 10px; line-height: 20px;">
                                   4. Allowances taken:<br>
                                   &nbsp;&nbsp;&nbsp; None<br>
                                   &nbsp;&nbsp;&nbsp; Tips &nbsp;&nbsp;<span style="text-decoration: underline;">$ per hour</span><br>
                                   &nbsp;&nbsp;&nbsp; Meals &nbsp;&nbsp;<span style="text-decoration: underline;">$ per hour</span><br>
                                   &nbsp;&nbsp;&nbsp; Lodging &nbsp;&nbsp;<span style="text-decoration: underline;">$ per hour</span><br>
                                   &nbsp;&nbsp;&nbsp; Other &nbsp;&nbsp;<span style="text-decoration: underline;">$per hour</span><br>
                               </div>
                               <div style="margin-bottom: 10px">
                                   5. Regular payday:  <span style="text-decoration: underline;"></span><br>
                               </div>
                               <div style="margin-bottom: 10px; line-height: 20px;">
                                   6. Pay is:<br/>
                                   <input type="checkbox" onclick="return false;"checked="checked"> Weekly<br>
                                   <input type="checkbox" onclick="return false;"> Bi-Weekly<br>
                                   <input type="checkbox" onclick="return false;"> Other
                               </div>
                               <div>
                                   7. Overtime Pay Rate:<br>
                                   &nbsp;&nbsp;&nbsp;&nbsp;$ per hour (This must be at least<br>
                                   &nbsp;&nbsp;&nbsp;&nbsp;1/2 times thew worker's regular rate<br>
                                   &nbsp;&nbsp;&nbsp;&nbsp;withfew exceptions.)
                               </div>
                           </td>
                           <td width="28%" style="display: inline-block; vertical-align:top;">
                               <table>
                                   <tr>
                                       <td width="100%" style="border: 1px solid #000; line-height: 22px;padding: 10px;font-weight: bold;">
                                           1. Employer Information <br>
                                           Name: {{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}<br><br>
                                           Doing Business As (DBA) Name(s):<br>
                                           <br><br>
                                           FEIN(Optional):<br>
                                           <br><br>
                                           physical Address:<br>
                                           <br>
                                           <br><br>
                                           Malling Address:<br>
                                           <br>
                                           <br><br>
                                           Phone: 
                                       </td>
                                   </tr>
                                   <tr>
                                       <td style="line-height: 15px;padding: 10px 0;font-weight: bold; line-height: 20px;">
                                           2. Notice Given <br>
                                           <input type="checkbox" class="common-checkbox" checked="checked" onclick="return false;"> At hiring <br>
                                           <input type="checkbox" onclick="return false;"> Before a change in pay rate(s),
                                           allowances claimed or payday
                                       </td>
                                   </tr>
                               </table>
                           </td>
                       </tr>
                   </table>
               </td>
            </tr>

            <tr>
                <td><div class="page-break"></div></td>
            </tr>

            <tr>
                <td
                    style="
                    text-align: center;
                    font-size: 17px;
                    font-weight: bold;
                    padding: 10px;
                    "
                >
                    LS 62 Notice to Wage Parity Home Care Aides - (cont’d)<br />
                    Benefit Portion of Minimum Rate of Home Care Aide Total Compensation
                </td>
            </tr>
            <tr>
                <td>
                    <table
                    cellspacing="0"
                    cellpadding="0"
                    class="table-border"
                    style="padding: 0"
                    >
                    <tr>
                        <th></th>
                        <th style="text-align: center">
                            <b>Hourly<br />Rate</b>
                        </th>
                        <th style="text-align: center">
                            <b>Type of<br />Supplement</b>
                        </th>
                        <th style="text-align: center">
                            <b>Name & Address<br />of Provider</b>
                        </th>
                        <th style="text-align: center">
                            <b>Agreement/<br />Plan Information</b>
                        </th>
                    </tr>
                    <tr>
                        <td
                            style="
                                text-align: center;
                                font-style: italic;
                                vertical-align: middle;
                            "
                        >
                            Supplement<br />Number
                        </td>
                        <td
                            style="
                                text-align: center;
                                font-style: italic;
                                vertical-align: middle;
                            "
                        >
                            $ XXX
                        </td>
                        <td
                            style="
                                text-align: center;
                                font-style: italic;
                                vertical-align: middle;
                            "
                        >
                            (Pension, Welfare, or Other)
                        </td>
                        <td
                            style="
                                text-align: center;
                                font-style: italic;
                                vertical-align: middle;
                            "
                        >
                            Insert Name and Address of Company or Organization
                            Providing Benefit
                        </td>
                        <td
                            style="
                                text-align: center;
                                font-style: italic;
                                vertical-align: middle;
                            "
                        >
                            Identify plan or agreement that creates the benefit, e.g.,
                            Union Local No. 1 Collective Bargaining Agreement or
                            Insurance Company X Benefit Plan
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        >
                            Supplement<br />Number 1
                        </td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                    </tr>
                    <tr>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        >
                            Supplement<br />Number 2
                        </td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                    </tr>
                    <tr>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        >
                            Supplement<br />Number 3
                        </td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                        <td
                            style="
                                text-align: center;
                                vertical-align: middle;
                            "
                        ></td>
                    </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font-style: italic;">*If wage supplements are paid as a single payment owed to multiple Taft-Hartley multiemployer plans, list only the following: (1) the total paid for the supplement or benefit package; (2) the types of benefits included in the package, e.g., pension, health and welfare, or other; (3) the name and address of the entity to whom payment is sent; and (4) the relevant CBA or letter of assent as the agreement.</td>
            </tr>
            <tr>
                <td style="font-size: 14px; padding: 5px;">List any additional benefits and attach listing to this document.</td>
            </tr>
            <tr>
                <td style="font-size: 14px; padding: 5px 5px 20px; border-bottom: 1px solid #000;">Copies of the above listed agreements or summaries may be obtained by:</td>
            </tr>

            <tr>
                <td style="padding:20px 5px;">
                    <b>Employee Acknowledgement:</b><br/>
                    On this day I have been notified of my pay rate, overtime rate, allowances, supplements/benefits, and<br/> designated payday provided on this form (LS 62) attached and this addendum on the date given below.
                </td>
            </tr>

            <tr>
                <td style="padding: 5px;">My primary language is <span style="border-bottom: 1px solid #000;">English</span>. I have been given this notice in my primary language
                    <input checked="" type="checkbox" style="vertical-align: middle;"/> Yes  <input type="checkbox" style="vertical-align: middle;"/> No.</td>
            </tr>

            <tr>
                <td style="padding: 5px;">Employee Name (Print): <span style="border-bottom: 1px solid #000;">{{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}</span></td>
            </tr>

            <tr>
                <td style="padding: 5px;">Employee Signature: <span style="border-bottom: 1px solid #000; margin-right: 10px;">@if($users->signature_url)
                                       <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                        @endif</span>
                Date Signed:<span style="border-bottom: 1px solid #000;"> {{date('m/d/Y')}}</span></td>
            </tr>

            <tr>
                <td style="padding: 5px;">Preparer’s Name and Title: <span style="border-bottom: 1px solid #000;"></span></td>
            </tr>
            


        <!--Notice and Acknowledgment of Pay Rate and Payday End-->
        </table>
    </body>
</html>