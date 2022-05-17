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
           <!--Employee's Withholding Allowance Certificate Start-->
            <tr>
                <td style="border: 0">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                        <tbody>
                            <tr>
                                <td style="text-align: right; position: relative; border-top: 1px solid;padding-top: 0px; ">
                                    <img src="{{ asset('pdf_logos/new-york-state-of-opportunity-logo.jpg') }}" style="position: absolute;left: 0px; top: 5px; width: 104px;">
                                    <h1 class="text-center " style="font-size: 18px; padding-left:150px;text-align: left; font-weight: bold;"><p style="font-size: 12px; margin: 0px; padding: 0px;">Department of Taxation and Finance</p> Employee's Withholding Allowance Certificate</h1>
                                    <p style="padding-left:150px">New York • New York City • Yonkers</p>
                                    <h1 class="text-center " style="font-size: 18px; text-align: left; font-weight: bold;position: absolute;right: 0px; top: 0">IT-204</h1> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border: 1px solid #000" class="mystyle">
                                        <tr>
                                            <td width="65%" style="border-right: 1px solid #000;padding: 0">
                                                <table>
                                                    <tr>
                                                        <td width="60%"  style="padding: 5px 15px; line-height: 22px; font-weight: bold;border-bottom: 1px solid #000000;">
                                                            First name andmiddle initial <br>
                                                            {{ ($users->user) ? $users->user->first_name : '' }}
                                                        </td>
                                                        <td width="40%" style="line-height: 22px;padding: 5px 15px;font-weight: bold;border-bottom: 1px solid #000000;">
                                                            Last name <br>
                                                            {{ ($users->user) ? $users->user->last_name : '' }}
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td width="60%" style="border-bottom: 1px solid #000;line-height: 22px;padding: 5px 15px;font-weight: bold;">
                                                            Permanent home address (number andstreet or ruralroute)<br>
                                                            {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}, 
                                                        </td>
                                                        <td width="40%" style="border-bottom: 1px solid #000;line-height: 22px;padding: 5px 15px;font-weight: bold;">
                                                            Apartment number<br>
                                                            {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}},
                                                            {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td width="40%" style="padding: 5px 15px;line-height: 22px;">
                                                            City, village, or post office<br>
                                                            <b>
                                                            @if (isset($users->address_detail['address']))
                                                                {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                            @endif
                                                            </b>
                                                        </td>
                                                        <td width="20%" style="padding: 5px 15px;line-height: 22px;">
                                                            State<br>
                                                            <b>
                                                                @if (isset($users->address_detail['address']))
                                                                    {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                                @endif
                                                            </b>
                                                        </td>
                                                        <td width="20%" style="text-align: left;padding: 5px 15px;line-height: 22px;">
                                                            Zipcode<br>
                                                            <b> {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</b>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="35%" valign="top" style="padding: 0;border-bottom: 1px solid #000;">
                                                <table>
                                                    <tr>
                                                        <td style="border-bottom: 1px solid #000;padding: 5px 15px;line-height: 22px;font-weight: bold;">
                                                        Your Social Security Number <br>
                                                        @if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    <tr>                    
                                                        <td style="padding: 5px 15px;line-height: 22px;font-weight: bold;">
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
                                                            <input {{ $Single}} type="checkbox" onclick="return false;">Single Or Married Filling Seperately <br>
                                                            <input {{$Married}} type="checkbox" onclick="return false;">Married Filling Jointly / Qualifying Widow <br>
                                                            <input {{$Head}} type="checkbox" onclick="return false;">Head Of HouseHold <br>
                                                        Note:If married but legally separated, mark anXinthe Single or Head of HouseHold box.
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
                                    <table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;font-weight: bold;" class="mystyle">
                                        <tr>
                                            <td width="75%" style="padding:5px 15px;vertical-align: top;">
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">Are youa resident of New York City?............ <input <?php if($users->address_detail['info']['us_citizen'] == true) { echo "checked"; } ?> type="checkbox" onclick="return false;"> Yes    <input <?php if($users->address_detail['info']['us_citizen'] == false) { echo "checked"; } ?> type="checkbox" onclick="return false;"> No    </label>
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">Are youa resident of Yonkers?........................ <input type="checkbox" onclick="return false;"> Yes    <input type="checkbox" onclick="return false;"> No    </label>
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px;margin-top: 0px; font-weight: bold; margin-bottom: 5px;">Complete theworksheet onpage 4 before makinganyentries.</label>           
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">1 Total number of allowances youare claimingfor New York State andYonkers, if applicable (fromline 20)</label>               
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">2 Total number of allowances for New York City(fromline 35) .....................................................</label>
                                            </td>
                                            <td width="25%" valign="bottom" style="    padding-top: 88px;">
                                                <table border="1" style="border-color: rgba(158,158,158,0.34);border:1px solid #dacaca">
                                                    <tr>
                                                        <td width="10%" style="font-weight: bold;padding: 10px;text-align: center; border:1px solid #dacaca">1</td>
                                                        <td width="90%" style="font-weight: bold;padding: 10px;border:1px solid #dacaca">$</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" style="font-weight: bold;padding: 10px;text-align: center; border:1px solid #dacaca">2</td>
                                                        <td width="90%" style="font-weight: bold;padding: 10px;border:1px solid #dacaca">$</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="75%" style="padding:5px 15px;vertical-align: top" class="label-a" >
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px;font-weight: bold;">Use lines 3, 4, and5 below tohave additionalwithholdingper payperiodunder special agreementwithyour employer</label>
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">3 New York State amount .......................................................................................................................... </label>
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">4 New York Cityamount ............................................................................................................................</label>           
                                                <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">5 Yonkers amount ................................................................</label>
                                            </td>
                                            <td width="25%" valign="bottom" style="padding-top: 30px">
                                                <table border="1" style="border-color: rgba(158,158,158,0.34)">
                                                    <tr>
                                                        <td width="10%" style="font-weight: bold;padding: 10px;text-align: center;border:1px solid #dacaca">3</td>
                                                        <td width="90%" style="font-weight: bold;border:1px solid #dacaca;padding: 10px">$</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" style="font-weight: bold;padding: 10px;text-align: center;border:1px solid #dacaca">4</td>
                                                        <td width="90%" style="font-weight: bold;border:1px solid #dacaca;padding: 10px;">$</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="10%" style="font-weight: bold;padding: 10px;text-align: center;border:1px solid #dacaca">5</td>
                                                        <td width="90%" style="font-weight: bold;padding: 10px;border:1px solid #dacaca">$</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="font-size: 13px;margin: 5px 0">I certifythat I am entitled to the number ofwithholding allowances claimed on this certificate.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="1" style="height: 100px; border:1px solid #000;">
                                        <tr>
                                            <td width="85%" valign="top" style="font-weight: bold;padding: 5px;line-height: 15px;border:1px solid #000;">
                                                Employee's signature <br>
                                                
                                                <img src="{{ asset('pdf_logos/signature.jpg') }}" alt="sign"  style="max-width: 70px;">
                                                @if($users->signature_url)
                                                <img
                                                src="{{ $users->signature_url }}"
                                                style="width: 90px; height: auto"
                                             />
                                             @endif
                                            </td>
                                            <td width="15%" valign="top" style="font-weight: bold;padding: 5px;line-height: 15px;border:1px solid #000;">
                                                Date <br>
                                                {{date('m/d/Y')}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td style="font-weight: normal;width: 100%;border-bottom: 1px solid #000;padding-bottom: 15px;">
                                                    <b style="font-weight: bold;"> Penalty- </b>Apenaltyof $500 maybe imposedfor anyfalse statement youmake that decreases the amount of moneyyouhavewithheldfromyour wages. Youmay
                                                alsobe subject tocriminal penalties. <br><br>
                                                Employee:detachthis page andgive it toyour employer;keepa copyfor your records
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="line-height: 22px;padding-top: 15px; font-size: 14px;line-height: 25px;font-weight: normal;">
                                                <b style="font-weight: bold;">Employer:Keepthis certificatewithyour records.</b> <br>
                                                Mark anXinbox Aand/or box Btoindicatewhyyouare sendinga copyof this formtoNew York State (see instructions):<br>
                                                A Employee claimedmore than14 exemptionallowances for NYS.........A <input type="checkbox" onclick="return false;"><br>
                                                Employee is a new hire or a rehire ...B<input type="checkbox" onclick="return false;"> First date employee performedservices for pay(mm-dd-yyyy) (see instr.):<span></span><br>
                                                Are dependent healthinsurance benefits available for this employee?.................. Yes <input type="checkbox" onclick="return false;">   No <input type="checkbox" onclick="return false;">
                                                <br>
                                                If Yes, enter the date the employee qualifies (mm-dd-yyyy): <b><span></span></b>
                                                <br>
                                                <table border="1" style="border: 1px solid #000;">
                                                    <tr>
                                                        <td valign="top" style="padding: 5px 15px;border: 1px solid #000;font-weight: bold;">
                                                        Employer’s name andaddress (Employer:complete this sectiononlyif youare sendinga copyof this formtothe NYS Tax Department <br>
                                                        
                                                        </td>
                                                        <td valign="top" style="padding: 5px 15px;border: 1px solid #000;font-weight: bold;">
                                                        Employer identification number
                                                        <br> 
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
                                    <table>
                                        <tr>
                                            <td align="center" width="100%" style="font-size: 16px;font-weight: bold;padding: 15px 0;text-align: center;">Instructions</td>
                                        </tr>
                                    </table>
                                    <table width="100%" class="mystylea">    
                                        <tr>
                                            <td align="left" valign="top" width="40%" style="font-weight: bold;line-height: 15px;padding-right: 3%;">
                                                Changes effective for 2021 <br>
                                                <p style="line-height: 15px" class="white-spacenone">Instructions employer for tax year 2021 or later, andyoudonot file FormIT2104, your FormIT-2104 has beenrevisedfor tax year 2021. Theworksheet on  page 4 andthe charts beginningonpage 5, usedtocomputewithholding allowances or toenter anadditional dollar amount online(s) 3, 4, or 5, have been
                                                revised. If youpreviouslyfileda FormIT-2104 andusedtheworksheet or charts,
                                                youshouldcomplete a new 2021 FormIT-2104 andgive it toyour employer.</p>
                                                Whoshouldfile this form<br>
                                                <p style="line-height: 15px"  class="white-spacenone">This certificate, FormIT-2104, is completedbyanemployee andgiventothe
                                                employer toinstruct the employer how muchNew York State (andNew York City
                                                andYonkers) tax towithholdfromthe employee’s pay. The more allowances
                                                claimed, the lower the amount of taxwithheld. If the federal Form W-4 youmost
                                                recentlysubmittedtoyour employer was for tax year 2019 or earlier, andyoudo
                                                not file FormIT-2104, your employer mayuse the same number of allowances
                                                youclaimedonyour federal Form W-4.Due todifferences intax law, this may
                                                result inthewrongamount of taxwithheldfor New York State,New York City,
                                                andYonkers. For tax years 2021 or later,withholdingallowances are nolonger
                                                reportedonfederal Form W-4. Therefore, if yousubmit a federal Form W-4 to your</p>
                                            </td>
                                            <td  valign="top" width="40%" style="font-weight: bold;padding-left: 3%;">
                                                <p style="line-height: 15px" class="white-spacenone">employer for tax year 2021 or later, andyoudonot file FormIT-2104,
                                                your employer mayuse zeroas your number of allowances. This mayresult inthewrongamount of taxwithheldfor New York State,
                                                New York City, andYonkers.
                                                </p>
                                                <p style="line-height: 15px" class="white-spacenone">Complete FormIT-2104 eachyear andfile itwithyour employer if the
                                                number of allowances youmayclaimis different fromfederal Form W-4 or has changed.Commonreasons for completinga new Form
                                                IT-2104 eachyear include the following:</p>

                                                <ul style="font-weight: normal;padding-left: 30px;">
                                                    <li>Youstarteda new job</li>
                                                    <li>Youare nolonger a dependent.</li>
                                                    <li>Your individual circumstances mayhave changed(for
                                                    example, youwere marriedor have anadditional child).</li>
                                                    <li>Youmovedintoor out of NYCor Yonkers.</li>
                                                    <li>Youitemize your deductions onyour personal income tax return</li>
                                                    <li>Youclaimallowances for New York State credits.</li>
                                                    <li>Youowedtax or receiveda large refundwhenyoufiled
                                                    your personal income tax returnfor the past year.</li>
                                                    <li>Your wages have increasedandyouexpect toearn
                                                    $107,650 or more duringthe tax year.</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        <!--Employee's Withholding Allowance Certificate End-->
        </table>
    </body>
</html>