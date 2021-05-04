<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ ($users->user) ? $users->user->full_name : ''}}</title>
        <style>
            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }

            /* HTML5 display-role reset for older browsers */
            article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
                display: block;
            }

            body {
                line-height: 1;
            }

            ol,ul {
                list-style: none;
                font-size: 14px;
            }

            blockquote,q {
                quotes: none;
            }
            
            blockquote:before,blockquote:after,q:before,q:after {
                content: '';
                content: none;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
            }

            label-a label{
                font-weight: normal;
            }

            body {
                margin: 0;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
            }

            table {
                border-collapse: separate;
                border-spacing: 0;
            }
            h4{
                background: #07737a;
                color: #FFF;
                font-size: 18px;
                margin: 10px 0px;
                padding: 10px;
            }

            p {
                white-space: nowrap;
                font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none; display:inline-flex
            }

            span {
                width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;    font-weight: normal;
                font-weight: normal;
                padding-left: 10px;
            }

            .break{
                page-break-before: always;
            }

            body {
                margin: 0px auto;
                font-family: Arial, Helvetica, sans-serif;
            }

            .Page{
                width: 100%;
                height: 100%;
                border-color: #000;
                margin: 30px auto;
            }

            table{
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
            }

            ul, ol{
                list-style-type:square;
                margin: 8px 0;
            }

            ul li{
                margin-bottom: 5px
            }

            ul li:last-child {
                margin-bottom: 0px;
            }

            td {
                font-size: 13px   ;
                border-collapse: collapse;
            }

            p {
                margin: 0 0 5px 0;
                font-size: 14px;
            }

            label {
                font-weight: bold;
                font-size: 16px;
            }

            .Sigdate {
                display: block;width: 100%;
            }

            .Sigdate div {
                display: inline-block;
                width: 40%;
                float: left;
                line-height: 15px;
                font-weight: bold;
            }

            .Sigdate div.Sign span {
                display: block;
                padding-bottom: 5px;
                margin-bottom: 5px;
                height: 100px;
                border-bottom: 2px solid #000;
                position: relative;
            }

            .Sigdate div.Sign span img {
                position: absolute;
                bottom: 5px;
            }
            .Sigdate div.Date p {
                padding-bottom: 5px;
                margin-bottom: 5px;
                border-bottom: 2px solid #000;
            }

            .Sigdate div.Date {
                margin-left: 15px;
                margin-top: 80px;
            }

            .pagebreakavoid {
                page-break-inside: avoid;
            }

            .mystyle p{
                white-space: normal;
                word-break: break-all;
            }

            .mystyle label{
                font-weight: normal;
                padding: 8px 0px;
            }

            .mystylea p, .mystylea li{
                white-space: normal;
                word-break: break-all;
                font-weight: normal;
                font-size: 12px;
            }

            .white-spacenone{
                white-space: normal;
                word-break: break-all;
            }

            b{
                font-weight: bold;
            }

            input{
                margin-right: 10px;
            }

            .myspan span { padding-left:0px} 
        </style>
    </head>
    <body style="padding: 0;margin: 0;">
        <div style="max-width: 900px; margin: 0 auto; display: block;" >
            <table width="100%">    
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                <tr>
                                    <td>
                                        <a href="index.html" title="Welcome to Doral">
                                            <img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                                        </a>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="display: flex; justify-content: center;">
                                        <table style="width: 100%;margin-top: 15px;">
                                            <tr>
                                                <td>
                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Registration Requirements for Employment</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height: 15px;"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="myspan" style="width: 100%; border: 1px solid #a5a5a5;">
                                                        <tr>
                                                            <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 10%;text-align: left;  border-collapse: collapse; border-right: 1px solid #a5a5a5;">#</th>
                                                            <th style="width: 45%;">
                                                                <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: center;  border-right: 1px solid #a5a5a5;">Name of Document</h1>
                                                            </th>
                                                            <th style="width: 25%;">
                                                                <h1 style="font-weight: 800;font-size: 16px;text-align: center; color: #000;padding: 15px 0 15px 0; border-right: 1px solid #a5a5a5;">Type of Amount Document</h1>
                                                            </th>
                                                            <th style="width: 20%;">
                                                                <h1 style="font-weight: 800;font-size: 16px;text-align: center; color: #000;padding: 15px 0 15px 0;">Amount Required</h1>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5; font-weight: bold; border-top: 1px solid #a5a5a5;">1</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; padding: 10px;">1 of these <span style="font-weight: bold; ">UNEXPIRED:</span><br>*NYS Driver's License<br>*Passport<br>*Permanent Resident Card<br>*Work Authorization Card</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; vertical-align: middle; vertical-align: middle;">I.D.</td>
                                                            <td style="width: 20%;text-align: left;text-align: center;vertical-align: middle; border-top: 1px solid #a5a5a5; ">{{ $idProof }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5; font-weight: bold; border-top: 1px solid #a5a5a5;">2</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Social Security (original only)</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; vertical-align: middle; vertical-align: middle;">I.D.</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $socialSecurity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">3</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Professional Reference Letters or Personal Reference <span style="font-weight: bold;border-bottom: 0px;">must be completed within 3 months: Dated of this year, English language, Valid Phone, NO RELATIVES.</span></td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">References</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $professionalReferrance }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;"> 4</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">NYS Nurse certificate</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $nycNurseCertificate }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">5</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Malpractice Insurance</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $insuranceReport }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">6</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">CPR</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $cpr }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">7</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Physical (<span style="font-weight: bold;border-bottom: 0px;">completed within 1 year)</span></td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $physical }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">8</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Forensic Drug Screen (<span style="font-weight: bold;border-bottom: 0px;">completed within 6 months</span>) </br> *<span>LAB REPORT</span>*</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $forensicDrugScreen }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">9</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubella Immunization *<span >Lab Report</span>*</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $rubellaImmunization }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">10</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubeolla/Measles Immunization *<span>Lab Report</span>*</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $rubellaMeasiesImmunization }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">11</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Annual PPD <span>OR</span> Quantiferon results (completed within 1 year)</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $annualPPD }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">12</td>
                                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Flu Vaccination (Flu Shot) For Current Year</td>
                                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $flu }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>          
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="display: flex; justify-content: center;">
                                        <table style="width: 100%;margin-top: 15px;">
                                            <tr>
                                                <td style="width: 10%;text-align: left; text-decoration: underline;">
                                                    * If PPD RESUTLTS are positive you must have:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10%;text-align: left; padding-left: 30px;">
                                                    1. Report of Chest X-Ray
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10%;text-align: left; padding-left: 30px;">
                                                    2. Annual Tuberculosis Screening Questionnaire Form
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10%;text-align: left;">
                                                    If your test result is negative: Please provide the date & result information on the physical form.
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <div class="break"></div>
                                <!-- page 2 -->
                                
                                <tr>
                                    <td style="display: flex; justify-content: center;">
                                        <table style="width: 100%;margin-top: 15px;">
                                            <tr>
                                                <td>
                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">New Employee Information</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>Employee Data</h4>
                                                    <div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Name: <span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>SNN: <span>{{ ($users->ssn) ? $users->ssn : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Home Phone: <span>{{ $users->home_phone }}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Cell Phone: <span>{{ $users->phone }}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>
                                                                    <p style="font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none;">Current Address: <span  value="Shashikant"
                                                                    style="display: block;width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Address line 1: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Address line 2: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Apt/Building#: <span> {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>City: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>State: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}}</span></p>
                                                                            </td>
                                                                        
                                                                            <td>
                                                                                <p>Zip: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Phone: <span>{{ ($users->user) ? $users->user->phone : ''}}</span>
                                                                            </td>
                                                                            <td>
                                                                                <p>How long have you resided at current address? <span>{{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p style="font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none;">Prior Address: <span  value="Shashikant"
                                                                                style="display: block;width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address1']  : ''}} {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address2']  : ''}} {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['building']  : ''}}</span>
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Prior Address line 1: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address1']  : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Prior Address line 2: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['address2']  : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Apt/Building#: <span> {{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['building']  : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr> -->
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>City: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['city'] : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>State: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['state'] : ''}}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Zip: <span>{{ isset($users->address_detail['prior']) ? $users->address_detail['prior']['zipcode'] : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Phone: <span></span>
                                                                            </td>
                                                                            <td>
                                                                                <p>How long have you resided at current address? <span>{{ isset($users->address_detail['address']['how_long_resident']) ? $users->address_detail['address']['how_long_resident'] : ''}}</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Are you over 18 years of age?: 
                                                                                    <span>
                                                                                        <input type="checkbox" {{ ($users->user && $users->user->age == 'Yes') ? 'checked' : '' }}>Yes
                                                                                        <input type="checkbox" {{ ($users->user && $users->user->age == 'No') ? 'checked' : '' }}>No
                                                                                    </span>
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Sex: 
                                                                                    <span>
                                                                                        <input type="checkbox" {{ ($users->user) && $users->user->gender === '1' ? 'checked' : '' }} >Male
                                                                                        <input type="checkbox" {{ ($users->user) && $users->user->gender === '2' ? 'checked' : '' }}>Female
                                                                                        <input type="checkbox" {{ ($users->user) && $users->user->gender === '3' ? 'checked' : '' }}>Other
                                                                                    </span>
                                                                                </p>
                                                                            </td>  

                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Have you worked for this company in the past
                                                                                    <span>
                                                                                        <input type="checkbox">Yes
                                                                                        <input type="checkbox" >No
                                                                                    </span>
                                                                                    <span>If so,when?</span>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>  
                                                                <td>                                         
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p> Names of friends or relatives who presently work for this company:<span></span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>

                                                            <!-- Emergency contact section start -->
                                                            <tr>
                                                                <td>
                                                                    <h4>Emergency Contact information</h4>
                                                                    <div>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            @if (isset($users->emergency_detail))
                                                                            @foreach ($users->emergency_detail as $emergency_detail)
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>Name: <span>{{ isset($emergency_detail['name']) ? $emergency_detail['name'] : ''}}</span></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>Home Phone: <span>{{ isset($emergency_detail['phoneNo']) ? $emergency_detail['phoneNo'] : '' }}</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr> 
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>Address: <span>{{ isset($emergency_detail['address_line_1']) ? $emergency_detail['address_line_1'] : '' }} {{ isset($emergency_detail['address_line_2']) ? $emergency_detail['address_line_2'] : ''}} {{ isset($emergency_detail['building']) ? $emergency_detail['building'] : '' }} </span></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>Work Phone: <span></span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>City: <span> {{ isset($emergency_detail['city_id']) ? \App\Models\City::find($emergency_detail['city_id'])->city : '' }}</span></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>State: <span>{{ isset($emergency_detail['state_id']) ? \App\Models\State::find($emergency_detail['state_id'])->state : '' }}</span></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>Zip: <span>{{ isset($emergency_detail['zipcode']) ? $emergency_detail['zipcode'] : '' }}</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>How is the person is related to you: <span>{{ isset($emergency_detail['relation']) ? $emergency_detail['relation'] : '' }}</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                            @endif
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!--  Emergency contact section end -->

                                                            <!-- Position desired section start -->
                                                            <tr>
                                                                <td>
                                                                    <h4>Position desired</h4>
                                                                    <div>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>Position: <span>{{ isset($users->employer_detail['position']) ? $users->employer_detail['position']['position'] : '' }}</span></p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>Date you can start work: <span>{{ isset($users->employer_detail['position']) ? viewDateFormat($users->employer_detail['position']['date']) : '' }}</span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>Are you currently employed? 
                                                                                                    <span>
                                                                                                        <input type="checkbox" {{ isset($users->employer_detail['position']['isCurrentEmployee']) ? 'checked' : '' }}>Yes
                                                                                                        <input type="checkbox" {{ isset($users->employer_detail['position']['isCurrentEmployee']) ? '' : 'checked' }}>No
                                                                                                    </span>
                                                                                                </p>
                                                                                            </td>
                                                                                            <td>
                                                                                                <p>If so, may we contact your current employer?
                                                                                                    <span>
                                                                                                        <input type="checkbox" {{ isset($users->employer_detail['position']['isAllowContactToEmployer']) ? 'checked' : '' }}>Yes
                                                                                                        <input type="checkbox" {{ isset($users->employer_detail['position']['isAllowContactToEmployer']) ? '' : 'checked' }}>No
                                                                                                    </span>
                                                                                                </p>
                                                                                            </td>  
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Position desired section End -->

                                                        
                                                            <!-- Employment History Section Start -->
                                                        
                                                                <tr>
                                                                    <td>
                                                                        <h4>Employment History and Educational Background</h4>
                                                                        <div>
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <p>List your past three (3) employers, beginning with the most recent: <span></span></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
                                                                            <tr>
                                                                                <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;">#
                                                                                </th>
                                                                                <th style="width: 20%;">
                                                                                    <h1  style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;"> Company</h1>
                                                                                </th>
                                                                                <th style="width: 20%;">
                                                                                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Address</h1>
                                                                                </th>
                                                                                <th style="width: 20%;">
                                                                                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Phone</h1>
                                                                                </th>
                                                                                <th style="width: 20%;">
                                                                                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Supervisor</h1>
                                                                                </th>
                                                                            </tr>
                                                                            @php $counter = 1 @endphp
                                                                            @if (isset($users->employer_detail) && count($users->employer_detail['employer']) > 0)
                                                                                @foreach ($users->employer_detail['employer'] as $employer_detail)
                                                                                    <tr style="background: #f8f8f8;">
                                                                                        <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{ $counter }}</td>
                                                                                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                                                                        @if (isset($employer_detail['company']))
                                                                                            {{ $employer_detail['company']}}

                                                                                        @elseif (isset($employer_detail['companyName']))
                                                                                            {{ $employer_detail['companyName']}}
                                                                                        @endif
                                                                                      </td>
                                                                                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['address']}} </td>
                                                                                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['phoneNo']}}</td>
                                                                                        <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['supervisor']}}</td>
                                                                                    </tr>
                                                                                    @php $counter++ @endphp
                                                                                @endforeach
                                                                            @else 
                                                                                <tr style="background: #f8f8f8;">
                                                                                    <td colspan="5" style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">Record(s) Not Found</td>
                                                                                </tr>                                                          
                                                                            @endif
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            
                                                            <!-- Employment History Section End -->

                                                            <!-- Educational Section Start -->
                                                            <tr>
                                                                <td>
                                                                    <!-- <h4>Educational Background</h4> -->
                                                                    <div>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td>
                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <p>List your past three (3) schools you attended, beginning with the most recent. <span></span></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <tr>
                                                                            <td>
                                                                                <table style="width: 100%;border: 1px solid #a5a5a5;margin-top: 20px;">
                                                                                    <tr>
                                                                                        <th style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;"> #
                                                                                        </th>
                                                                                        <th style="width: 20%;">
                                                                                            <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Name and address</h1>
                                                                                        </th>
                                                                                        <th style="width: 20%;">
                                                                                            <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Years completed</h1>
                                                                                        </th>
                                                                                        <th style="width: 20%;">
                                                                                            <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Did you graduate?</h1>
                                                                                        </th>
                                                                                        <th style="width: 20%;">
                                                                                            <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;"> Major/Degree</h1>
                                                                                        </th>
                                                                                    </tr>
                                                                                    @php $counter = 1 @endphp
                                                                                    @if (isset($users->education_detail) && count($users->education_detail) > 0)
                                                                                    @foreach ($users->education_detail as $education_detail)
                                                                                        <tr style="background: #f8f8f8;">
                                                                                            <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{$counter}}</td>
                                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['address'] }}</td>
                                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['year'] }}</td>
                                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['isGraduate'] }}</td>
                                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['Degree'] }}</td>
                                                                                        </tr>
                                                                                        @php $counter++ @endphp
                                                                                    @endforeach
                                                                                    @else 
                                                                                        <tr style="background: #f8f8f8;">
                                                                                            <td colspan="5" style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">Record(s) Not Found</td>
                                                                                        </tr>      
                                                                                    @endif
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <h4>General</h4>
                                                                    <div>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <!-- Skill and language detail section start -->
                                                                                <tr>
                                                                                    <td>
                                                                                        <p>List any foreign languages you speak and check your level of fluency. </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <p>Skills: <span>{{ $users->language_detail ? $users->language_detail['skill'] : '' }}</span></p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr> -->
                                                                                @if(isset($users->language_detail['language']))
                                                                                @foreach ($users->language_detail['language'] as $language_detail)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <p><span>{{ $language_detail['name'] }}</span></p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p><input type="checkbox" {{ ($language_detail['minimal']) ? 'checked' : '' }}>Minimal</p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p><input type="checkbox" {{ ($language_detail['fluent']) ? 'checked' : '' }}>Fluent</p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p><input type="checkbox" {{ ($language_detail['read']) ? 'checked' : '' }}>Read</p>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <p><input type="checkbox" {{ ($language_detail['write']) ? 'checked' : '' }}>Write</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                @else 
                                                                                    <tr>
                                                                                        <td>
                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            Record(s) Not Found
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                                <tr>
                                                                                    <td>
                                                                                        <p>List any special skills/abilitys you have that can be applied to this position. <span>{{ $users->language_detail ? $users->language_detail['skill'] : '' }}</span></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- Skill and language detail section end -->

                                                                                <!-- Security detail section start -->
                                                                                <tr>
                                                                                    <td>
                                                                                        <h4>Security</h4>
                                                                                        <div>
                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <p>Have you ever been bonded? 
                                                                                                                <span>
                                                                                                                    <input type="checkbox" {{ ($users->security_detail && $users->security_detail['bond']) ? 'checked' : '' }}>Yes
                                                                                                                    <input type="checkbox" {{ ($users->security_detail && $users->security_detail['bond']) ? '' : 'checked' }} }}>No
                                                                                                                </span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <p>If so, explain:<span>{{ $users->security_detail ? $users->security_detail['bond_explain'] : '' }}</span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <p>Have you been convicted of a felony within the past 5 years?     
                                                                                                                <span>
                                                                                                                    <input type="checkbox" {{ ($users->security_detail && $users->security_detail['convict']) ? 'checked' : '' }}>Yes
                                                                                                                    <input type="checkbox" {{ ($users->security_detail && $users->security_detail['convict']) ? '' : 'checked' }}>No
                                                                                                                </span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <p>If so, explain (this will not necessarily exclude you from consideration:<span>{{ $users->security_detail ? $users->security_detail['convict_explain'] : '' }}</span></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- Security detail section end -->
                                                                                <tr>
                                                                                    <td>
                                                                                        <h4>Military</h4>
                                                                                        <div>
                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">   
                                                                                                <!-- Military detail section start -->   
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Have you served in the military?
                                                                                                                        <span>
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isMilitary']) ? 'checked' : '' }}>Yes
                                                                                                                            <input type="checkbox"{{ isset($users->military_detail['isMilitary']) ? '' : 'checked' }}>No
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p>Branch: <span>{{ isset($users->military_detail['branch']) ? $users->military_detail['branch'] : '' }}</span></p>
                                                                                                                </td>  
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Served Served from:<span>{{ isset($users->military_detail['serve_start_date']) ? $users->military_detail['serve_start_date'] : '' }} to {{ isset($users->military_detail['serve_end_date']) ? $users->military_detail['serve_end_date'] : '' }}</span></p>
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <p>Rank:<span></span></p>
                                                                                                                </td>     
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Do you have any military commitment, including National Guard service that would influence your work schedule?  
                                                                                                                        <span>
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isCommited']) ? 'checked' : '' }}>Yes
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isCommited']) ? '' : 'checked' }}>No
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </td> 
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>If so, explain: <span>{{ isset($users->military_detail['isCommited_explain']) ? $users->military_detail['isCommited_explain'] : ''}}</span></p>
                                                                                                                </td> 
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Are you a Vietnam veteran?  
                                                                                                                        <span>
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isVietnam']) ? 'checked' : '' }}>Yes
                                                                                                                            <input type="checkbox"{{ isset($users->military_detail['isVietnam']) ? '' : 'checked' }}>No
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </td> 
                                                                                                                <td>
                                                                                                                    <p>Are you a disabled veteran? 
                                                                                                                        <span>
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isDisableVetran']) ? 'checked' : '' }}>Yes
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isDisableVetran']) ? '' : 'checked' }}>No
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </td> 
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Are you a special disabled veteran?
                                                                                                                        <span>
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isSpecialDisableVereran']) ? 'checked' : '' }}>Yes
                                                                                                                            <input type="checkbox" {{ isset($users->military_detail['isSpecialDisableVereran']) ? '' : 'checked' }}>No
                                                                                                                        </span>
                                                                                                                    </p>
                                                                                                                </td> 
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>   
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p style="white-space:normal">REASONABLE ACCOMMODATIONS: In the event you believe you will need reasonable accommodations to assist you inperforming your job,please contact your supervisor or<br> human resources coordinator.</p>
                                                                                                                </td> 
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <!-- Military detail section end -->  


                                                                                                <!-- Authentication Detail Section start -->
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <h4>Authorization</h4>
                                                                                                        <div>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myStyle">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p style="white-space:normal;">I certify that the facts contained in this application are true and complete to the best of my knowledge and understand that If employed, falsified statements on this<br> application will be grounds for dismissal.</p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>Employee Signature:<span>
                                                                                                                                    @if($users->signature_url)
                                                                                                                                    <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                                                                                                    @endif
                                                                                                                                </span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>Date:<span>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <!-- Authentication Detail Section End -->

                                                                                                <table style="width: 100%;">
                                                                                                    <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <a href="index.html" title="Welcome to Doral"><img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}"></a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                </table> 
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>Employee Name: <span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            @php $number=1; @endphp
                                                                                                            @if (isset($users->reference_detail) && count($users->reference_detail) > 0)
                                                                                                        
                                                                                                            @foreach ($users->reference_detail as $reference_detail)
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Contact Information {{ $number}} </h1>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Contact Name: <span>{{ isset($reference_detail['name']) ? $reference_detail['name'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Relationship to Employee: <span>{{ isset($reference_detail['personRelation']) ? $reference_detail['personRelation'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Address:  <span>{{ $reference_detail['address_line_1'] }} {{ $reference_detail['address_line_2'] }} {{ $reference_detail['building'] }} {{ isset($reference_detail['city_id']) ? \App\Models\City::find($reference_detail['city_id'])->city : '' }} {{ isset($reference_detail['zipcode']) ? $reference_detail['zipcode'] : '' }} </span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Emergency Contact Phone Home #: <span>{{ isset($reference_detail['phoneNo']) ? $reference_detail['phoneNo'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Emergency Contact Cell Phone #: <span></span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @php $number++; @endphp
                                                                                                            @endforeach
                                                                                                            @else
                                                                                                                
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Record(s) not found <span></span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endif
                                                                                                            <table style="width: 100%;">
                                                                                                                <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                            <a href="index.html" title="Welcome to Doral">
                                                                                                                                <img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                                                                                                                            </a>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </thead>
                                                                                                            </table>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">FAMILY INFORMATION SHEET</h1>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>EMPLOYEE NAME: <span>{{ ($users->user) ? $users->user->full_name : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>POSITION:<span>{{ isset($users->employer_detail['position']) ? $users->employer_detail['position']['position'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>DEPARTMENT:<span>{{ ($users->user && $users->user->designation) ? $users->user->designation->name : '' }}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>ADDRESS:<span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>CITY, STATE, ZIP:<span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>HOME PHONE<span>{{ $users->home_phone }}</span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>CELL PHONE:<span>{{ $users->phone }}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>(HOME AND CELL PHONE NUMBER ARE MANDATED BY THIS NEW YORK STATE DEPARTMENT OF HEALTH)</p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">INFORMATION NEEDED FOR FMLA AND BEREAVEMENT LEAVE:</h1>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>SPOUSE'S NAME:<span>{{ ($users->family_detail) ? $users->family_detail['spouse_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>MOTHER'S NAME:<span>{{ ($users->family_detail) ? $users->family_detail['mother_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>FATHER'S NAME:<span>{{ ($users->family_detail) ? $users->family_detail['father_name'] : '' }}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>MOTHER-IN-LAW'S NAME:<span>{{ ($users->family_detail) ? $users->family_detail['mother_in_low_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                            <td>
                                                                                                                                <p>FATHER-IN-LAW'S NAME:<span>{{ ($users->family_detail) ? $users->family_detail['father_in_low_name'] : '' }}</span></p>
                                                                                                                            </td>   
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>SIBLINGS: <span>{{ ($users->family_detail) ? $users->family_detail['siblings_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>GRANDPARENTS:<span>{{ ($users->family_detail) ? $users->family_detail['parents_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>CHILDREN: <span>{{ ($users->family_detail) ? $users->family_detail['children_name'] : '' }}</span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; white-space:normal;word-break:break-all">NAME, ADDRESS, PHONE NUMBERS AND RELATIONSHIP OF PERSON TO CALL IN CASE OF EMERGENCY:</h1>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p><span></span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p><span></span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p><span></span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p><span></span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mystyle">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p class="white-spacenone">IT IS THE EMPLOYEE'S OBUGATION TO UPDATE THIS FORM AND RE-SUBMIT IT TO THEIR DEPARTMENT HEAD. No EMPLOYEE WILL BEGRANTED A LEAVE OF ABSENCE<br> OF BENEFIT TIME FOR "THE CARE OF THEIR CHILD, PARENT OR SPOUSE WITH A SERIOUS HEALTHCONDITION" IF THE RELATIVE'S NAME DOES NOT APPEAR ON THIS FORM.<br> ALL EMPLOYEES MUST MAINTAIN THEIR OWN COPY OF THIS FORM, COMPLETED WITH UP TO DATE INFORMATION.</p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                        <tr>
                                                                                                                            <td>
                                                                                                                                <p>Date Completed:<span>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span></p>
                                                                                                                            </td>   
                                                                                                                            <td>
                                                                                                                                <p>Employee Signature:<span>
                                                                                                                                    @if($users->signature_url)
                                                                                                                                    <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                                                                                                    @endif
                                                                                                                                </span></p>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>     
                                                                                                <!-- <tr>
                                                                                                    <td>
                                                                                                        <h4>Payroll Detail</h4>
                                                                                                        <div>
                                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>How many dependents?: <span>{{ isset($users->payroll_details['dependents']) ? $users->payroll_details['dependents'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <p>Name of Account: <span>{{ isset($users->payroll_details['nameOfAccount']) ? $users->payroll_details['nameOfAccount'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <p>Type of Account: <span>{{ isset($users->payroll_details['typeOfAccount']) ? $users->payroll_details['typeOfAccount'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                            <tr>
                                                                                                                                <td>
                                                                                                                                    <p>Account Routing Number: <span>{{ isset($users->payroll_details['routingNumber']) ? $users->payroll_details['routingNumber'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                                <td>
                                                                                                                                    <p>Account Number: <span>{{ isset($users->payroll_details['accountNumber']) ? $users->payroll_details['accountNumber'] : '' }}</span></p>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr> -->
                                                                                                                                                                                            
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>                     
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- page 7 -->
                        <div class="break"></div>
                        <table width="100%">
                            <tr>
                                <td>
                                    <table style="width: 100%;">
                                        <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                            <tr>
                                                <td>
                                                    <a href="index.html" title="Welcome to Doral"><img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}"></a>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">EMPLOYMENT VERIFICATION</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p>Name of Applicant:<span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                                                </td>
                                                <td>
                                                    <p>SSN:<span>{{ ($users->ssn) ? $users->ssn : ''}}</span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Name of Company:<span>
                                                    @if(isset($users->employer_detail['employer'][0]))
                                                        @if (isset($users->employer_detail['employer'][0]['company']))
                                                            {{ $users->employer_detail['employer'][0]['company']}}

                                                        @elseif (isset($users->employer_detail['employer'][0]['companyName']))
                                                            {{ $users->employer_detail['employer'][0]['companyName']}}
                                                        @endif
                                                    @endif
                                                    </span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p>Phone:<span></span></p>
                                                </td>
                                                <td>
                                                    <p>Fax:<span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Address:<span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>City,State,Zip:<span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="display: inline-block; font-weight: normal;" class="white-spacenone"><b>APPLICANT'S AUTHORIZATION RELEASE: </b>I hereby authorize the release of any information requested by House Calls HC concerning my employment in your company.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p>Applicant's Signature:<span>@if($users->signature_url)
                                                    <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                        @endif</span></p>
                                                </td>
                                                <td>
                                                    <p>Date:<span>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span></p>
                                                </td>
                                            </tr>
                                        </tbody>  

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">DO NOT WRITE BELOW THIS BOX — TO BE COMPLETED BY EMPLOYER ONLY</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="font-weight: normal;" class="white-spacenone">Dear Sir/Madam,<br>The person listed has given your name as a source of reference and has also signed a statement authorizing the inquiry. We would appreciate a statement of your experiences with this person, and an assessment of his/her potential in your opinion. Any information released will be held in strict confidence.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">PLEASE COMPLETE THIS SECTION:</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Position Held:<span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="
                                                    width: 50%;
                                                    ">
                                                    <p>Date Employment Began:<span></span></p>
                                                </td>
                                                <td>
                                                    <p>Date Employment Ended:<span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Reason for Leaving:<span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p>Overall Job Performance:</p>
                                            </td>
                                            <td>
                                                <p>Excellent <input type="checkbox"></p>
                                            </td>
                                            <td>
                                                <p>Good <input type="checkbox"></p>
                                            </td>
                                            <td>
                                                <p>Average <input type="checkbox"></p>
                                            </td>
                                            <td>
                                                <p>Poor <input type="checkbox"></p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Attendance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>Excellent <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Good <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Average <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Poor <input type="checkbox"></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Punctuality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>Excellent <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Good <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Average <input type="checkbox"></p>
                                                </td>
                                                <td>
                                                    <p>Poor <input type="checkbox"></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Eligible for Rehire:  
                                                        <input type="checkbox">Yes
                                                        <input type="checkbox">No    
                                                    </p>
                                                    <p> If No, Please Explain:<span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Additional Comments: <span></span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Reference Given By: <span></span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>Title: <span></span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>Date: <span></span>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Thank you for your cooperation.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>Sincerely,<br></p>
                                                    <p style="text-decoration: underline;">Human Resources</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- page 8 -->
                        <div class="break"></div>
                            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                <!-- Page 13 -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style="margin-top: 30px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="padding: 0 15px 10px">
                                                                            Form <b style="font-size: 15px">W-4</b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 0 15px">
                                                                            Department of the Treasury<br> Internal Revenue Service
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td align="center" style="padding: 10px 30px 10px 30px;border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                                            <label align="center"><b style="font-size: 16px">Employee's Withholding Certificate </b></label>
                                                            <ul align="left">
                                                                <li>Complete Form W-4 so that your employer can withhold the correct federal income tax from your pay</li>
                                                                <li>Give Form W-4 to your employer.</li>
                                                                <li>Your withholding is subject to review by the IRS.</li>
                                                            </ul>
                                                        </td>
                                                        <td valign="top" style="border-bottom: 1px solid #000;">
                                                            <table cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="border-bottom: 1px solid #000;padding: 10px 15px">
                                                                            OMB No. 1545-0074
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-size: 24px;font-weight: bold;padding: 10px 15px">
                                                                            2021
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
                                            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" style="border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="font-size: 16px;line-height: 22px;font-weight: bold;padding: 3px  15px 15px">
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
                                                                        <td style="padding: 3px 15px; width: calc(40% - 40px);display: inline-block;border-bottom: 1px solid #000; ">
                                                                            <p>First name and middle initial</p>
                                                                            <label>{{ ($users->user) ? $users->user->first_name : ''}}</label>
                                                                        </td>
                                                                        <td style="padding: 3px 15px;width: calc(20% - 19px);display: inline-block;border-bottom: 1px solid #000;border-right: 1px solid #000;" align="left">
                                                                            <p>Last name</p>
                                                                            <label>{{ ($users->user) ? $users->user->last_name : ''}}</label>
                                                                        </td>
                                                                        <td style="padding: 3px 15px;width: calc(40% - 40px);display: inline-block;border-bottom: 1px solid #000;">
                                                                            <p style="font-weight: normal;">Your Social Security number</p>
                                                                            <label>{{ ($users->ssn) ? $users->ssn : ''}}</label>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="100%" style="border-bottom: 1px solid #000;">
                                                                            <table cellspacing="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="60%" style="border-right: 1px solid #000;" valign="top">
                                                                                            <table>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td valign="top" style="padding: 3px 15px;border-bottom: 1px solid #000;">
                                                                                                            <p style=" font-weight: normal;">Address</p>
                                                                                                            <label>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="padding: 3px 15px;">
                                                                                                            <p style="font-weight: normal;">City or town, state, and ZIP code</p>
                                                                                                            <label>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        <td width="40%" style="padding: 3px 15px;;font-weight: bold;">
                                                                                            &bull; Does your name match the name on 
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
                                                                        <td style="padding: 3px 15px;">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            (C)
                                                                                        </td>
                                                                                        <td>
                                                                                            <div>
                                                                                                <span style="width: 100%; border:0px;display: block;"> 
                                                                                                    <input type="checkbox">
                                                                                                        Single or Married filing separately
                                                                                                </span>
                                                                                                <span style="width: 100%;display: block;  border:0px;">
                                                                                                    <input type="checkbox">
                                                                                                        Married filing jointly (or Qualifying widow(err))
                                                                                                    </span>
                                                                                                <span style="width: 100%; border:0px;display: block;">
                                                                                                    <input type="checkbox">
                                                                                                    Head of household (Check only if you're unmarried and pay more than half the costs of keeping up a home for yourself and a qualifying individual.
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
                                            <table cellspacing="0" cellpadding="0" width="100%" align="center" style="padding: 5px 0">
                                                <tbody>
                                                    <tr>
                                                        <td style="padding: 5px 0 2px 0;font-size: 16px">
                                                            <b>Complete Steps 2-4 ONLY if they apply to you; otherwise, skip to Step 5.</b> See page 2 for more information on each step, who can claim exemption from withholding, when to use the online estimator, and privacy.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="15%" valign="top" style="font-size: 16px; line-height: 22px;font-weight: bold;padding: 5px 0 15px 15px;">
                                                                            Step 2: <br>Multiple Jobs<br>or Spouse<br>Works
                                                                        </td>
                                                                        <td width="85%" style="padding: 10px 15px 5px 15px; font-size: 12px; ">
                                                                            Complete this step if you (1) hold more than one job at a time, or (2) are married filing jointly and your spouse also works. The correct amount of withholding depends on income earned from all of these jobs.
                                                                            <br>
                                                                            Do only one of the following.
                                                                            <ol type="a" style="list-style: none;">
                                                                                <li><b>(a)</b> Use the estimator at www.irs.gov/W4App for most accurate withholding for this step (and Steps 3-4); or</li>
                                                                                <li><b>(b)</b> Use the Multiple Jobs Worksheet on page 3 and enter the result in Step 4(c) below for roughly accurate withholding; or</li>
                                                                                <li value="option3"><b>(c)</b> If there are only two jobs total, you may check this box. Do the same on Form W-4 for the other job. This option is accurate for jobs with similar pay; otherwise, more tax than necessary may be withheld......................... <input type="checkbox"></li>
                                                                            </ol>
                                                                            TIP: To be accurate, submit a 2021 Form W-4 for all other jobs. If you (or your spouse) have self-employment income, including as an independent contractor, use the estimator
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 5px 0; font-size: 14px">
                                                            <b>Complete Steps 3–4(b) on Form W-4 for only ONE of these jobs.</b> Leave those steps blank for the other jobs. (Your withholding will be most
                                                            accurate if you complete Steps 3–4(b) on the Form W-4 for the highest paying job.)
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
                                                        <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                                            Step 3: <br>Claim <br>Dependents
                                                        </td>
                                                        <td width="60%" valign="top" style="padding: 10px 0 15px 0; border-right: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" >
                                                            <label style="font-size: 14px; font-weight: normal;">
                                                                If your income will be $200,000 or less ($400,000 or less if married
                                                                filing jointly):
                                                            </label>
                                                            <ul>
                                                                <li style="list-style-type: none; font-weight: normal;">
                                                                    Multiply the number of qualifying children under age 17 by $2,000: $ <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                </li>
                                                                <li style="list-style-type: none; font-weight: normal;">
                                                                    Multiply the number of other dependents by $500......... $<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                </li>
                                                            </ul>
                                                            <label style="font-size: 14px; font-weight: normal;">Add the amounts above and enter the total here . . . . . . . . .</label>
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
                                                                        <td style="padding: 5px 10px;font-weight: bold;">$</td>
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
                                                        <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px;">
                                                            Step 4: <br>(optional):<br>Other<br>Adjustments
                                                        </td>
                                                        <td width="60%" style=" font-weight: normal;padding: 10px 0 10px 0;">
                                                            <table>
                                                                <tbody><tr>
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
                                                        </tbody></table>
                                                    </td>
                                            <td width="25%" valign="top">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tbody><tr>
                                                        <td width="5%" valign="top">
                                                        <table border="1" style="border-right: none;border-top: none;" cellspacing="0" cellpadding="0">
                                                            <tbody><tr>
                                                                <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(a)</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(b)</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 15px 0;text-align: center; border:1px solid #000;border-right: none;border-top: none;">4(c)</td>
                                                            </tr>
                                                        </tbody></table>
                                                        </td>
                                                        <td width="20%" valign="top">
                                                        <table border="1" cellspacing="0" cellpadding="0" style="border-top: none;">
                                                            <tbody><tr>
                                                                <td style="padding: 15px;text-align: left; border:1px solid #000;border-top: none;">$</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 15px;text-align: left; border:1px solid #000;">$</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 15px;text-align: left; border:1px solid #000;">$</td>
                                                            </tr>
                                                        </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                        <table style="border-top: 1px solid #000;">
                                            <tbody><tr>
                                            <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-bottom: 1px solid #000;">
                                                Step 5: <br>
                                                Sign<br>
                                                Here
                                            </td>
                                            <td width="85%" valign="top" style="border-bottom: 1px solid #000; font-weight: bold;padding: 10px 0 10px 15px;border-left: 1px solid #000">
                                                <label style="font-size:14px; font-weight: normal; ">Under penalties of perjury, I declare that this certificate, to the best of my knowledge and belief, is true, correct, and complete.</label>

                                                <div class="Sigdate">
                                                    <div class="Sign">
                                                        <span> 
                                                            @if($users->signature_url)
                                                            <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                            @endif
                                                        </span>
                                                        Signature <br>
                                                        Employee’s signature (This form is not valid<br>
                                                        unless you sign it.)
                                                    </div>
                                                    <div class="Date">
                                                        <p>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</p>
                                                        Date
                                                    </div>
                                                </div>
                                            </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <table>
                                            <tbody><tr>
                                            <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                                Employers <br>
                                                Only
                                            </td>
           <td width="50%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
              {{ ($users->user) ? $users->user->full_name : ''}} <br>
              {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}
           </td>
           <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
              First date of<br>
              employment
           </td>
           <td width="20%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-bottom: 1px solid #000;">
              Employer<br>
              identification<br>
              number (EIN)
           </td>
        </tr>
     </tbody></table>
  </td>
  </tr>
</tbody></table>
  <!-- page 9 -->
       <div class="break"></div>
       <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
  <!-- Page 14 -->
<tr>
<td style="text-align: right; position: relative; border-top: 1px solid;padding-top: 0px; ">
              <image src="{{ asset('assets/img/pdf-ico.png') }}" style="    position: absolute;
   left: 13px;
   top: 5px;
">

              <h1 class="text-center " style="font-size: 18px; padding-left:150px;text-align: left; font-weight: bold;"><p style="font-size: 12px; margin: 0px; padding: 0px;">Department of Taxation and Finance</p> Employee's Withholding Allowance Certificate
</h1>
<p style="padding-left:150px">New York • New York City • Yonkers</p>
<h1 class="text-center " style="font-size: 18px; text-align: left; font-weight: bold;position: absolute;right: 0px; top: 0">IT-204
</h1> 
           </td>
</tr>
  <tr><td>

     <table style="border: 1px solid #000" class="mystyle">
        <tr>
           <td width="65%" style="border-right: 1px solid #000;padding: 0">
              <table>
                 <tr>
                 <td width="60%"  style="padding: 5px 15px; line-height: 22px; font-weight: bold;border-bottom: 1px solid #000000;">
                    First name andmiddle initial <br>
                    {{ ($users->user) ? $users->user->first_name : ''}}
                 </td>
                 <td width="40%" style="line-height: 22px;padding: 5px 15px;font-weight: bold;border-bottom: 1px solid #000000;">
                    Last name <br>
                    {{ ($users->user) ? $users->user->last_name : ''}}
                 </td>
              </tr>
              </table>
              <table>
              <tr>
                 <td width="60%" style="border-bottom: 1px solid #000;line-height: 22px;padding: 5px 15px;font-weight: bold;">
                    Permanent home address (number andstreet or ruralroute)<br>
                    {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}
                 </td>
                 <td width="40%" style="border-bottom: 1px solid #000;line-height: 22px;padding: 5px 15px;font-weight: bold;">
                    Apartment number<br>
                    {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}
                 </td>
              </tr>
              </table>
              <table>
              <tr>
                 <td width="40%" style="padding: 5px 15px;line-height: 22px;">
                    City, village, or post office<br>
                    <b>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}}</b>
                 </td>
                 <td width="20%" style="padding: 5px 15px;line-height: 22px;">
                    State<br>
                    <b>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}}</b>
                 </td>
                 <td width="20%" style="text-align: left;padding: 5px 15px;line-height: 22px;">
                    ZIPcode<br>
                    <b>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</b>
                 </td>
              </tr>
              </table>
           </td>
           <td width="35%" valign="top" style="padding: 0;border-bottom: 1px solid #000;">
              <table>
                 <tr>
                    <td style="border-bottom: 1px solid #000;padding: 5px 15px;line-height: 22px;font-weight: bold;">
                       Your Social Securitynumber <br>
                       {{ ($users->ssn) ? $users->ssn : ''}}
                    </td>
                 </tr>
                 <tr>                    
                    <td style="padding: 5px 15px;line-height: 22px;font-weight: bold;">
                       Single or Headof householdhold <input type="checkbox"> Married <input type="checkbox">, butwithholdat higher single rate <input type="checkbox"> <br>
                       Note:If marriedbut legally separated,mark anXinthe Single or Headof householdbox.
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
              <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">Are youa resident of New York City?............ <input type="checkbox"> Yes    <input type="checkbox"> No    </label>
              <label style="width: 100%;display: block;font-size: 14px;line-height: 15px">Are youa resident of Yonkers?........................ <input type="checkbox"> Yes    <input type="checkbox"> No    </label>
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
              Employee's signature <br>@if($users->signature_url)
                                <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                            @endif
           </td>
           <td width="15%" valign="top" style="font-weight: bold;padding: 5px;line-height: 15px;border:1px solid #000;">
              Date <br>
              {{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}
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
           <td style="line-height: 22px;padding-top: 15px; font-size: 14px;
   line-height: 25px;font-weight: normal;">
             <b style="font-weight: bold;">Employer:Keepthis certificatewithyour records.</b> <br>
              Mark anXinbox Aand/or box Btoindicatewhyyouare sendinga copyof this formtoNew York State (see instructions):<br>
              A Employee claimedmore than14 exemptionallowances for NYS.........A <input type="checkbox"><br>
              Employee is a new hire or a rehire ...B<input type="checkbox"> First date employee performedservices for pay(mm-dd-yyyy) (see instr.):<span></span><br>
              Are dependent healthinsurance benefits available for this employee?.................. Yes <input type="checkbox">   No <input type="checkbox">
              <br>
              If Yes, enter the date the employee qualifies (mm-dd-yyyy): <b><span></span></b>
              <br>
              <table border="1" style="border: 1px solid #000;">
                 <tr>
                    <td valign="top" style="padding: 5px 15px;border: 1px solid #000;font-weight: bold;">
                       Employer’s name andaddress (Employer:complete this sectiononlyif youare sendinga copyof this formtothe NYS Tax Department <br>
                       HouseCalls Home Care Palnpur 380015
                    </td>
                    <td valign="top" style="padding: 5px 15px;border: 1px solid #000;font-weight: bold;">
                       Employer identificationnumber
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
              reportedonfederal Form W-4. Therefore, if yousubmit a federal Form W-4 to
              your</p>

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
  </td>
  </tr>
</table>
     <!-- page 10 -->
   <div class="break"></div>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
  <!-- Page 15 -->
  <tr>
     <table align="center">
        <tr>
           <td width="100%" align="center" style="padding-bottom: 15px;font-size: 16px; font-weight: bold; position: relative; border-top: 1px solid;padding-top: 15px; ">
              <image src="{{ asset('assets/img/pdf-ico.png') }}" style="position: absolute;left: 0px; top: 0">
              Notice and Acknowledgment of Pay Rate and Payday <br>
              Under Section 195.1 of the New York State Labor Law <br>
           Notice for Employees Paid a Weekly Rate or a Salary for a Fixed Numebr of hours(40 or Fewer in a week)
           </td>       
        </tr>
      </table>
      <table width="100%">    
        <tr>
           <td width="28%" style="display: inline-block; vertical-align:top;">
              <table>
                 <tr>
                    <td width="100%" style="border: 1px solid #000; line-height: 22px;padding: 10px;font-weight: bold;">
                       1. Employer Information <br>
                       Name: Doral Investors Group LLC<br><br>
                       Doing Business As (DBA) Name(s):<br>
                       HouseCalls Home Care<br><br>
                       FEIN(Optional):<br>
                       270381133<br><br>
                       physical Address:<br>
                       2440 Fulton Street<br>
                       Brooklyn NY 11233<br><br>
                       Malling Address:<br>
                       2440 Fulton Street<br>
                       Brooklyn NY 11233<br><br>
                       Phone: 718-9200-9200
                    </td>
                 </tr>
                 <tr>
                    <td style="line-height: 15px;padding: 10px 0;font-weight: bold;">
                       2. Notice Given <br>
                       <input type="checkbox" checked="checked"> At hiring <br>
                       <input type="checkbox"> Before a change in pay rate(s),
                       allowances claimed or payday
                    </td>
                 </tr>
              </table>
           </td>
           <td width="30%" valign="top"  style="display: inline-block;font-weight: bold;padding: 0 0 0 30px; vertical-align:top;line-height: 15px">
              <div style="margin-bottom: 10px">
                 3. Employee's rate of pay:<br>
                 &nbsp;&nbsp;&nbsp; $ <span>&nbsp;&nbsp;</span>per<span>&nbsp;&nbsp;</span>
              </div>
              <div style="margin-bottom: 10px">
                 4. Allowances taken:<br>
                 <input type="checkbox" checked="checked">None<br>
                 <input type="checkbox">Tips<span>&nbsp;&nbsp;</span>per hour<br>
                 <input type="checkbox">Meals<span>&nbsp;&nbsp;</span>per hour<br>
                 <input type="checkbox">Lodging<span>&nbsp;&nbsp;</span><br>
                 <input type="checkbox">Other<span>&nbsp;&nbsp;</span>
              </div>
              
              <div style="margin-bottom: 10px">
                 5. Regular payday: <span>Tuesday</span><br>
              </div>
              <div style="margin-bottom: 10px">
                 6. Pay is:
                 <input type="checkbox" checked="checked">Weekly<br>
                 <input type="checkbox">Bi-Weekly<br>
                 <input type="checkbox">Other
              </div>
              <div>
                 7. Overtime Pay Rate:<br>
                 &nbsp;&nbsp;&nbsp;&nbsp;$ <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> per hour (This must be at least<br>
                 &nbsp;&nbsp;&nbsp;&nbsp;1/2 times thew worker's regular rate<br>
                 &nbsp;&nbsp;&nbsp;&nbsp;withfew exceptions.)
              </div>
           </td>
           <td width="32%" valign="top" style="display: inline-block;font-weight: bold;padding: 0;line-height: 15px" class="mystyle">
              <div style="margin-bottom: 30px">
                 8. Employee Acknowledgment:
                 on this day i have been notified of my
                 pay rate, overtime rate(if eligible),
                 allowances, and designed pay day on
                 the date given below. I told my
                 employer what my primary language is.<br><br>
                 Check One:<br>
                 <input type="checkbox"> I have been given this pay notice in
                 English because it is primary language.<br>
                 <input type="checkbox"> My primary language is<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> API HAS
                 LANGUAGE ID I have been given this
                 pay notice in English only, because the
                 department of Labor does not yet offer
                 a pay notice from in my primary
                 language.
              </div>
              <div style="display: block;width: 100%;margin-bottom: 15px">
                 <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;">{{ ($users->user) ? $users->user->full_name : ''}}</label>
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
                 <label style="border-bottom: 1px solid #000;display: block;padding-bottom: 5px;margin-bottom: 5px;">{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</label>
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
        </tr>
     </table>
  </tr>
</table>
       <div class="break"></div>
   <!-- page 11 -->
     <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center" class="mystyle" style="page-break-inside: avoid;">
  
  <tbody><tr>
     <td>
        <table>
           <tbody>
              <tr>
              <td width="21%" style="border-bottom: 1px solid #000;border-right: 1px solid #000;">
                 <table>
                    <tbody><tr><td style="padding: 0 20px 10px">Form <b style="font-size: 18px">W-11</b></td>
                    </tr>
                    <tr><td style="padding: 0 20px">(Rev. June 2010) <br>
                       Department of the Treasury <br>
                       InternalRevenue Service</td>
                    </tr>
                 </tbody></table>
              </td>
              <td align="center" style="padding: 0px 20px 0px 20px;border-bottom: 1px solid #000;border-right: 1px solid #000;">
                 <label align="center"><b style="font-size: 18px">Hiring Incentives to Restore Employment(HIRE) Act <br>Employee Affidavit </b></label>
                 <ul align="left" style="padding-top: 20px;">
                    <li>Donot sendthis formtothe IRS.Keepthis formfor your records</li>
                 </ul>
              </td>
              <td width="21%" valign="top" style="border-bottom: 1px solid #000; vertical-align: middle;">
                 <table cellspacing="0">
                    <tbody><tr><td style="padding: 0px 20px 10px 20px;">OMBNo. 1545-217</td>
                    </tr>
                    
                 </tbody></table>
              </td>
           </tr>
        </tbody></table>
     </td>
  </tr>
  <tr>
     <td>
        <table>
           <tbody><tr>
              <td style="padding-top: 10px;"><b style="font-weight: bold;">To be completed by new employee. Affidavit is not valid unless employee signs it.</b> <br>I certify that I have been unemployed or have not worked for anyone for more than 40 hours during the 60-day period ending on the date I began employment with this employer.</td>
           </tr>
        </tbody></table>
     </td>
  </tr>
  <tr>
     <td style="padding-top: 15px;padding-bottom: 5px;">
        <table>
           <tbody><tr>
              <td width="50%" style="padding-bottom: 5px;">Your name: <span>{{ ($users->user) ? $users->user->full_name : '' }}</span></td>
              <td>Social security number <span>{{ ($users->ssn) ? $users->ssn : '' }}</span></td>
           </tr>
           <tr>
              <td width="50%">First date of employment</td>
              <td>Name of employer <span></span></td>
           </tr>
        </tbody></table>
     </td>
  </tr>
  <tr>
     <td style="padding-bottom: 20px;">Under penalties of perjury, I declare that I have examined this affidavit and, to the best of my knowledge and belief, it is true, correct, andcomplete.      </td>
  </tr>
  <tr>
     <td style="padding-bottom: 20px;border-bottom: 2px solid #000000;">
        <table>
           <tbody><tr>
              <td align="left" valign="middle">Employee's&nbsp;signature </td>
              <td width="60%" align="left" valign="middle" style="padding-left: 20px;"> @if($users->signature_url)
                        <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                    @endif</td>
              <td width="25%" align="left" valign="middle">Date {{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</td>
           </tr>
        </tbody></table>
     </td>
  </tr>
  <tr>
     <td style="border-bottom: 2px solid #000000;">
        <table class="mystylea">
           <tbody><tr>
              <td width="28%" style="padding: 20px 15px; font-size: 12px;">
                 <p style="font-size: 22px; font-weight: bold;">Instructions to the <br>Employer</p>
                 <p>Section references are to the Internal Revenue
                 Code.</p>
                       <p style="font-size: 22px; font-weight: bold;">Purpose of Form</p>
                 <p>
                 Use Form W-11 to confirm that an employee is
                 a qualified employee under the HIRE Act. You
                 can use another similar statement if it contains
                 the information above and the employee signs
                 it under penalties of perjury.</p>
                 <p>Only employees who meet all the requirements
                 of a qualified employee may complete this
                 affidavit or similar statement. You cannot claim
                 the HIRE Act benefits, including the payroll tax
                 exemption or the new hire retention credit,
                 unless the employee completes and signs this
                 affidavit or similar statement under penalties
                 of perjury and is otherwise a qualified
                 employee.</p>
                 <p>A “qualified employee” is an employee who:</p>
                 <ul style="list-style-type: disc;">
                    <li>begins employment with you after
                    February 3, 2010, and before January 1,
                    2011;</li>
                    <li>certifies by signed affidavit, or similar
                       statement under penalties of perjury,
                       that he or she has not been employed
                       for more than 40 hours during the 60-
                       day period ending on the date the
                       employee begins employment with you;</li>
                    <li>is not employed by you to replace another employee unless the other employee separated from employment voluntarily or for cause (including downsizing);and</li>
                 </ul>
              </td>
              <td width="28%" style="padding: 20px 15px;" >
                 <ul style="list-style-type: disc; page-break-inside: avoid;">
                    <li>Is not related to you.An employee is
                       related to you if he or she is your childor a
                       descendants of your child, your sibling or
                       step sibling, your parent or an ancestor of
                       your parent, your stepparent, your niece or
                       nephew, your aunt or uncle, or your in-law.
                       An employee also is related to you if he or
                       she is related to anyone who owns more
                       than 50% of your outstanding stock or
                       capital and profits interest or is your
                       dependent or a dependent of anyone who
                       owns more than 50% of your outstanding
                       stock or capital and profits interest.</li>
                 </ul>
                 <p >If you are an estate or trust, see section
                    51(i)(1) and section 152(d)(2) for more
                    details.</p>
                    <table>  
                       <tr><td>
                      <p style="margin-bottom: 5px; align-items: flex-start; margin-right: 5px;"><img src="{{asset('assets/img/icon.png') }}" width="25" />Do not send this form to the IRS.
                    Keep it with your other payroll and
                    income tax records.
                    </p>   </td></tr></table>
                
                  
              <table>  
                       <tr><td>
                       <p style="margin-top: 5px; font-size: 12px; border-top: 1px solid #000; padding-top: 10px; vertical-align: top; white-space: normal; word-break: break-all;">Paperwork Reduction Act Notice. The Paperwork
                    Reduction Act of 1980 requires that when we ask
                    you for information we must first tell you our legal
                    right to ask for the information, why we are
                    asking for it, and how it will be used. We must
                    also tell you what could happen if we do not
                    receive it and whether your response is voluntary,
                    required to obtain a benefit, or mandatory under
                    the law. You are not required to provide the
                    information requested on a form that is subject to
                    the Paperwork Reduction Act unless the form
                    displays a valid OMB control number.Books or
                    records relating to a form or its instructions must
                    be retained as longas their contents may
                    become material in the administration of any
                    Internal Revenue law.Generally, tax returns and
                    return information are confidential, as stated in
                    Code section 6103.
                    </p>  </td></tr></table>
              </td>
              <td width="28%" style="padding: 20px 15px;">
                 <p>Our legal right to ask for information is Internal
                    Revenue Code section 6001 and the purpose of
                    the form is stated in the instructions. This
                    collection of the information is required to obtain
                    certain tax benefits.
                    </p>
                 <p>If you do not retain this recordor give fraudulent
                    information,we may have to disallow certain
                    exemptions and credits, and you also may be
                    charged penalties and be subject to criminal
                    prosecution. This could make the tax higher or
                    delay any refund. Interest may also be charged.
                    </p>
                 <p>The time needed to complete this form will vary
                    depending on individual circumstances. The
                    estimated average time is:</p>
                 <p>Record keeping. . . . . . 1 hr. 25 min <br>
                    Preparing the form. . . . . .25 min<br>
                    Learning about the<br>
                    law or the form. . . . . .24 min</p>
                 <p>If you have comments regarding the accuracy of
                    this time estimate or you have suggestions for making this form simpler,wewould be happy to
                    hear from you. You can write to the Internal Revenue
                    Service, Tax Products Coordinating Committee,
                    SE:W:CAR:MP:T:T:SP, 1111 Constitution Ave.NW, IR6526, Washington,DC20224.Do not send the form
                    to this address</p>
                 <p>Please keep this notice with your records. It may
                    help you if we ask you footer information. If you have
                    any questions about the rules for filing and giving
                    information, please call or visit anlnternal Revenue
                    Service office.</p>
              </td>
           </tr>
        </tbody></table>
     </td>
  </tr>
</tbody>
</table>


       <div class="break"></div>
     <!-- page 12 -->
   <table width="100%">   
     <tr>
                          <td>
                             <table style="width: 100%;" class="break">
                                <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                   <tr>
                                      <td>
                                         <a href="index.html" title="Welcome to Doral">
                                         <img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                                         </a>
                                      </td>
                                   </tr>
                                </thead>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                                HEPATITIS B VACCINE DECLINATION
                             </h1>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td>
                                         <p  class="white-spacenone">I am declining the Hepatitis B Vaccination
                                            </p>
                                            <p style="font-weight: normal; white-space: normal;">
                                            I understand that due to my occupational exposure to blood or other potential infectious materials, I may be at risk of acquiring Hepatitis B Virus (HEW) infection. I have been given the opportunity to be vaccinated with the Hepatitis B Vaccine. I have also been asked if I have questions regarding this information and ill had questions, they were fully answered to my satisfaction. I have been offered the  opportunity to be vaccinated with the Hepatitis B Vaccine at no charge to myself.
                                         </p>
                                            <b style="font-weight: bold;">I decline Hepatitis B vaccine at this time.</b> I understand that by declining this vaccine, Icontinue to be at risk of acquiring Hepatitis B, a serious disease. If, in the future,
                                            while employed by <b style="font-weight: bold;">Doral Health and wellness </b>, I continue to have occupational exposure to blood orother potentially infectious materials and I want to be vaccinated with Hepatitis B vaccine, I can receive the vaccination series at no charge to me.
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td>
                                         <p>Name (Please Print)<span>{{ ($users->user) ? $users->user->full_name : ''}}
                                            </span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td>
                                         <p>Signature<span>  @if($users->signature_url)
                                         <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                            @endif
                                            </span>
                                         </p>
                                      </td>
                                      <td>
                                         <p>Date<span>
                                            </span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr></table>
  <!-- page 13 -->
       <div class="break"></div>
   <table width="100%"> 

       <tr>
                          <td>
                             <table style="width: 100%;" class="break">
                                <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                   <tr>
                                      <td>
                                         <a href="index.html" title="Welcome to Doral">
                                         <img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                                         </a>
                                      </td>
                                   </tr>
                                </thead>
                             </table>
                          </td>
                       </tr>
     <tr>
                          <td>
                             <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                                REBEOLA IMMUNITY
                             </h1>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td style="
                                         width: 50%;
                                         ">
                                         <p>Name:<span>
                                         {{ ($users->user) ? $users->user->full_name : ''}} </span>
                                         </p>
                                      </td>
                                      <td>
                                         <p>SSN:<span>
                                         {{ ($users->ssn) ? $users->ssn : ''}}</span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td style="
                                         width: 50%;
                                         ">
                                         <p>DOE:<span>
                                         {{ ($users->user) ? $users->user->dob : ''}} </span>
                                         </p>
                                      </td>
                                      <td>
                                         <p>Document Proof:<span>
                                            </span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td>
                                         <p style="font-weight: normal;">Rubeola Immunity titer/vaccination is not required for this employee as he/she was born prior to January 1, 1957.</p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td style="
                                         width: 50%;
                                         ">
                                         <p>Employee Signature:<span>
                                            @if($users->signature_url)
                                            <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                            @endif
                                        </span>
                                         </p>
                                      </td>
                                      <td>
                                         <p>Date:<span>
                                         {{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr>
                          <td>
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                   <tr>
                                      <td style="
                                         width: 50%;
                                         ">
                                         <p>Witness Signature:<span>
                                            </span>
                                         </p>
                                      </td>
                                      <td>
                                         <p>Date:<span>
                                            </span>
                                         </p>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr></table>
            <!-- page 14 -->
                        <div class="break"></div>
                        <table width="100%">     
                            <tr>
                                <td>
                                    <table style="width: 100%;" class="break">
                                        <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                                            <tr>
                                                <td>
                                                    <a href="index.html" title="Welcome to Doral"><img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}"></a>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">DECLINATION FORM FOR SEASONAL INFLUENZA VACCINE</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <p>Name: <span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
                                                </td>
                                                <td>
                                                    <p>DOB: <span>{{ ($users->user) ? $users->user->dob : ''}}</span></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mystyle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p style="font-weight: normal; font-style: italic;">Facility: This facility has recommended that I receive influenza vaccination in order to protect myself and the patients serve.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">I DO NOT WANT A FLU SHOT:</h1>
                                </td>
                            </tr>    
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mystyle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>I acknowledge that I am aware of the following facts:</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mystyle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <ul style=" padding-left: 25px;">
                                                        <li>Influenza iss-a serious respiratory disease; on average, 36,000 Americans die every year from influenza-relatedcauses.</li>
                                                        <li> Influenza virus may be shed for up to 24 hours before symptoms begin, increasing the risk of transmission toothers.</li>
                                                        <li> Some people with influenza have no symptoms, increasing the risk of transmission to others.</li>
                                                        <li> Influenza virus changes often, making annual vaccination necessary. Immunity following vaccination is strongestfor 2 to 6 months. [In California, influenza usually begins circulating in early January and continues throughFebruary or March.]</li>
                                                        <li> I understand that the influenza vaccine cannot transmit influenza and it does not prevent all disease.</li>
                                                        <li> I have declined to receive the influenza vaccine for the 2019-2021 season. I acknowledge that influenzavaccination is recommended by the Centers for Disease Control and Prevention for all healthcare workers in orderto prevent infection from and transmission of influenza and its complications, including death, to patients, mycoworkers, my family, and my community.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mystyle">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p>Knowing these facts, I choose to decline vaccination at this time.<div style="font-weight: normal; font-size: 14px; display: inline-block;">I may change my mind and accept vaccination later,if vaccine is available_ I have read and fully understand the information on this declination form. I am declining due to thefollowing reasons (check all that apply):</div></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-weight: normal;">
                                                        <tbody>
                                                            <tr style="font-weight: normal;">
                                                                <td>
                                                                    <input type="checkbox">I believe I will get influenza if I get the vaccine.
                                                                </td>
                                                            </tr>
                                                            <tr style="font-weight: normal;">
                                                                <td>
                                                                    <input type="checkbox">I do not like needles.
                                                                </td>
                                                            </tr>
                                                            <tr style="font-weight: normal;">
                                                                <td>
                                                                    <input type="checkbox">My philosophical or religious beliefs prohibit vaccination
                                                                </td>
                                                            </tr>
                                                            <tr style="font-weight: normal;">
                                                                <td>
                                                                    <input type="checkbox">I have an allergy or medical contraindication to receiving the vaccine.
                                                                </td>
                                                            </tr>
                                                            <tr style="font-weight: normal;">
                                                                <td>
                                                                    <p style="font-weight: normal; white-space: nowrap; font-size: 13px;">
                                                                    <input type="checkbox">Other reason — please tell us:<span>&nbsp; &nbsp; &nbsp;</span></p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <ul style=" padding-left: 25px;">
                                                                        <li> I understand that if I choose to decline the influenza vaccine, and my job duties may cause me to infect patients or to becomeinfected, I will be required to wear a surgical mask or respirator, as appropriate, within 6 feet of patients or in designatedareas during influenza season.</li>
                                                                        <li> I understand that I may change my mind at any time and accept influenza vaccination, if vaccine is available.</li>
                                                                        <li> I have read and fully understand the information on this declination form</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">
                                                                    <p style="white-space: nowrap">Employee Signature:
                                                                        <span>
                                                                            @if($users->signature_url)
                                                                                <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                                                                            @endif
                                                                        </span>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p style="white-space: nowrap;">Date:
                                                                        <span>
                                                                            {{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }} 
                                                                        </span>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%">
                                                                    <p style="white-space: nowrap;">Administrative Signature:<span></span></p>
                                                                </td>
                                                                <td>
                                                                    <p style="white-space: nowrap;">Date:<span></span></p>
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
                        </table>

                        <div class="break"></div>
                        <table width="100%">     
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">Upload Documentation.</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            @php $counter = 1 @endphp
                                            @foreach ($users->documents as $document)
                                                <tr style="background: #f8f8f8;">
                                                    <td style="width: 100%;text-align: left;border-bottom: 1px solid #a5a5a5;"><img style="width: 100%; height: 100%;" src="{{ $document->file_url }}" alt="Welcome to Doral" srcset="{{ $document->file_url }}"></td>
                                                </tr>
                                                @php $counter++ @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>