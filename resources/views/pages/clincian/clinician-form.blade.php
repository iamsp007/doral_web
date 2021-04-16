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
            }

            blockquote,q {
                quotes: none;
            }

            blockquote:before,blockquote:after,q:after {
                content: '';
                content: none;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
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

            h4 {
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
        </style>
    </head>
    <body style="padding: 0;margin: 0;">
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
                        <table style="width: 1100px;margin-top: 15px;">
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
                                    <table style="width: 100%; border: 1px solid #a5a5a5;">
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
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; padding: 10px;">1 of these <span style="font-weight: bold; text-decoration: underline;">UNEXPIRED:</span><br>*NYS Driver's License<br>*Passport<br>*Permanent Resident Card<br>*Work Authorization Card</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; vertical-align: middle; vertical-align: middle;">I.D</td>
                                            <td style="width: 20%;text-align: left;text-align: center;vertical-align: middle; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5; font-weight: bold; border-top: 1px solid #a5a5a5;">2</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Social Security (original only)</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; vertical-align: middle; vertical-align: middle;">I.D</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">3</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Professional Reference Letters or Personal Reference <span style="font-weight: bold;">must be completed within 3 months: Dated of thisyear, English language, Valid Phone, NO RELATIVES</span></td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">References</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">2</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;"> 4</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">NYS Nurse certificate</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; "></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">5</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Malpractice Insurance</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; "></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">6</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">CPR</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; "></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">7</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Physical (<span style="font-weight: bold;">completed within 1 year)</span></td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">8</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Forensic Drug Screen (<span style="font-weight: bold;">completed within 6 months</span>) <span style="text-decoration: underline;">LAB REPORT</span>*</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">9</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubella Immunization *<span style="text-decoration: underline;">Lab Report</span>*</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">10</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubeolla/Measles Immunization *<span style="text-decoration: underline;">Lab Report</span>*</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">11</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Annual PPD <span style="text-decoration: underline;">OR</span> Quantiferon results (completed within year)</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">12</td>
                                            <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Flu Vaccination (Flu Shot) For Current Year</td>
                                            <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                            <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">1</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>          
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="display: flex; justify-content: center;">
                        <table style="width: 1100px;margin-top: 15px;">
                            <tr>
                                <td style="width: 10%;text-align: left;">
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
                <tr>
                    <td style="display: flex; justify-content: center;">
                        <table style="width: 1140px;margin-top: 15px;">
                            <tr>
                                <td>
                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">New Employee</h1>
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
                                                                <p>SNN: <span>{{ ($users->user && $users->user->demographic) ? $users->user->ssn : ''}}</span></p>
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
                                                                <p>Home Phone: <span>{{ $users->home_phone }}</span></p>
                                                            </td>
                                                            <td>
                                                                <p>Cell Phone: <span>{{ $users->phone }}</span></p>
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
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <p>State: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['state'] : ''}}</span></p>
                                                            </td>
                                                            <td>
                                                                <p>City: <span>{{ isset($users->address_detail['address']) ? $users->address_detail['address']['city'] : ''}}</span></p>
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
                                                                <p>Prior Address: <span></span></p>
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
                                            </tr>
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
                                                                    <span>{{ ($users->user) ? $users->user->gender_data : '' }}</span>
                                                                </p>
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
                                                                <p>Have you worked for this company in the past
                                                                    <span>
                                                                        <input type="checkbox" checked>Yes
                                                                        <input type="checkbox" >No
                                                                    </span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> -->
                                            <!-- <tr>  
                                                <td>                                         
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <p> Names of friends or relatives who presently work for this company:<span></span></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr> -->

                                            <!-- Reference Section Start -->
                                            <tr>
                                                <td>
                                                    <h4>Reference Detail</h4>
                                                    <div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            @foreach ($users->reference_detail as $reference_detail)
                                                                <tr>
                                                                    <td>
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td>
                                                                                    <p>Name: <span>{{ isset($reference_detail['name']) ? $reference_detail['name'] : '' }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>Phone No: <span>{{ isset($reference_detail['phoneNo']) ? $reference_detail['phoneNo'] : '' }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>Address1: <span>{{ $reference_detail['address_line_1'] }}</span></p>
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
                                                                                    <p>Address2: <span>{{ $reference_detail['address_line_2'] }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>Apt/Building#: <span>{{ $reference_detail['building'] }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>State <span>{{ isset($reference_detail['state_id']) ? $reference_detail['state_id'] : '' }}</span></p>
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
                                                                                    <p>City: <span>{{ isset($reference_detail['city_id']) ? $reference_detail['city_id'] : '' }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>Zip Code: <span>{{ isset($reference_detail['zipcode']) ? $reference_detail['zipcode'] : '' }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>Relationship: <span>{{ isset($reference_detail['relation']) ? $reference_detail['relation'] : '' }}</span></p>
                                                                                </td>
                                                                                <td>
                                                                                    <p>How is this person related to you?: <span>{{ isset($reference_detail['personRelation']) ? $reference_detail['personRelation'] : '' }}</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Reference Section End -->

                                            <!-- <tr>
                                                <td>
                                                    <h4>Employee Contact information</h4>
                                                    <div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td>
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <p>Name: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Home Phone: <span></span></p>
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
                                                                                <p>Address: <span></span></p>
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
                                                                                <p>City: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>State: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Zip: <span></span></p>
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
                                                                                <p>How is the person is related to you: <span></span></p>
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
                                                                                <p>Name: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Home Phone: <span></span></p>
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
                                                                                <p>Address: <span></span></p>
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
                                                                                <p>City: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>State: <span></span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Zip: <span></span></p>
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
                                                                                <p>How is the person is related to you: <span></span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr> -->

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
                                                                                <p>Position: <span>{{ $users->employer_detail['position'] ? $users->employer_detail['position']['position'] : '' }}</span></p>
                                                                            </td>
                                                                            <td>
                                                                                <p>Date you can start work: <span>{{ $users->employer_detail['position'] ? viewDateFormat($users->employer_detail['position']['date']) : '' }}</span></p>
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
                                            @if (isset($users->employer_detail['position']['isAllowContactToEmployer']))
                                                <tr>
                                                    <td>
                                                        <h4>Employment History</h4>
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
                                                            @foreach ($users->employer_detail['employer'] as $employer_detail)
                                                                <tr style="background: #f8f8f8;">
                                                                    <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{ $counter }}</td>
                                                                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['companyName']}}</td>
                                                                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['address']}} </td>
                                                                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['phoneNo']}}</td>
                                                                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $employer_detail['supervisor']}}</td>
                                                                </tr>
                                                                @php $counter++ @endphp
                                                            @endforeach
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endif
                                            <!-- Employment History Section End -->

                                            <!-- Educational Section Start -->
                                            <tr>
                                                <td>
                                                    <h4>Educational Background</h4>
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
                                                                    @foreach ($users->education_detail as $education_detail)
                                                                        <tr style="background: #f8f8f8;">
                                                                            <td style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">{{$counter}}</td>
                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['address'] }}</td>
                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['year'] }}</td>
                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['isGraduate'] }}</td>
                                                                            <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $education_detail['Degree'] }}
                                                                            </td>
                                                                        </tr>
                                                                        @php $counter++ @endphp
                                                                    @endforeach
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
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td>
                                                                                    <p>Skills: <span>{{ $users->language_detail ? $users->language_detail['skill'] : '' }}</span></p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
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
                                                                                                    <input type="checkbox" {{ ($users->security_detail['bond'] === 'true') ? 'checked' : '' }}>Yes
                                                                                                    <input type="checkbox" {{ ($users->security_detail['bond'] === 'false') ? 'checked' : '' }}>No
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
                                                                                                    <input type="checkbox" {{ ($users->security_detail['convict'] === 'true') ? 'checked' : '' }}>Yes
                                                                                                    <input type="checkbox" {{ ($users->security_detail['convict'] === 'false') ? 'checked' : '' }}
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
                                                                                                    <p>Served Start Date:<span>{{ isset($users->military_detail['serve_start_date']) ? $users->military_detail['serve_start_date'] : '' }}</span></p>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <p>Serve End Date:<span>{{ isset($users->military_detail['serve_end_date']) ? $users->military_detail['serve_end_date'] : '' }}</span></p>
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
                                                                                                    <p>If so, explain: <span>{{ isset($users->military_detail['isCommited_explain']) }}</span></p>
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
                                                                                                    <p>REASONABLE ACCOMMODATIONS: In the event you believe you will need reasonable accommodations to assist you inperforming your job,please contact your supervisor or<br> human resources coordinator.</p>
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
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <p>1 certify that the facts contained in this application are true and complete to the best of my knowledge and understand that If employed, falsified statements on this<br> application will be grounds for dismissal.</p>
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
                                                                                                                <p>Employee Signature:<span><img width="100px" height="100px" src="{{ $users->signature_url }}" alt="sign"></span></p>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <p>Date:<span>{{ viewDateFormat(now()) }}</span></p>
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
                                                                                            @foreach ($users->emergency_detail as $emergency_detail)
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
                                                                                                                    <p>Contact Name: <span>{{ isset($emergency_detail['name']) ? $emergency_detail['name'] : ''}}</span></p>
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
                                                                                                                    <p>Relationship to Employee: <span>{{ isset($emergency_detail['relation']) ? $emergency_detail['relation'] : '' }}</span></p>
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
                                                                                                                    <p>Address:  <span>{{ isset($emergency_detail['address_line_1']) ? $emergency_detail['address_line_1'] : '' }}, {{ isset($emergency_detail['address_line_2']) ? $emergency_detail['address_line_2'] : ''}}, {{ isset($emergency_detail['building']) ? $emergency_detail['building'] : '' }}, {{ isset($emergency_detail['state_id']) ? $emergency_detail['state_id'] : '' }}, {{ isset($emergency_detail['city_id']) ? $emergency_detail['city_id'] : '' }}, {{ isset($emergency_detail['zipcode']) ? $emergency_detail['zipcode'] : '' }}</span></p>
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
                                                                                                                    <p>Emergency Contact Phone Home #: <span>{{ isset($emergency_detail['phoneNo']) ? $emergency_detail['phoneNo'] : '' }}</span></p>
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
                                                                                                                <p>EMPLOYEE NAME: <span></span></p>
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
                                                                                                                <p>POSITION:<span></span></p>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <p>DEPARTMENT:<span></span></p>
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
                                                                                                                <p>ADDRESS:<span></span></p>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <p>CITY, STATE, ZIP:<span></span></p>
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
                                                                                                                <p>HOME PHONE<span></span></p>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <p>CELL PHONE:<span></span></p>
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
                                                                                                    <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">NAME, ADDRESS, PHONE NUMBERS AND RELATIONSHIP OF PERSON TO CALL IN CASE OF EMERGENCY:</h1>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
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
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <p>IT IS THE EMPLOYEE'S OBUGATION TO UPDATE THIS FORM AND RE-SUBMIT IT TO THEIR DEPARTMENT HEAD. No EMPLOYEE WILL BEGRANTED A LEAVE OF ABSENCE<br> OF BENEFIT TIME FOR "THE CARE OF THEIR CHILD, PARENT OR SPOUSE WITH A SERIOUS HEALTHCONDITION" IF THE RELATIVE'S NAME DOES NOT APPEAR ON THIS FORM.<br> ALL EMPLOYEES MUST MAINTAIN THEIR OWN COPY OF THIS</p>
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
                                                                                                            <td>
                                                                                                                <p><span></span></p>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>     
                                                                                <tr>
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
                                                                                <tr>
                                                                                    <td>
                                                                                        <h4>Document Verification Detail</h4>
                                                                                        <div>
                                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <p>Upload Documentation. <span></span></p>
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
                                                                                                <th style="width: 20%;">
                                                                                                    <h1 style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">Document</h1>
                                                                                                </th>
                                                                                            </tr>
                                                                                            @php $counter = 1 @endphp
                                                                                            @foreach ($users->documents as $document)
                                                                                                <tr style="background: #f8f8f8;">
                                                                                                    <td style="width: 100%;text-align: left;border-bottom: 1px solid #a5a5a5;"><img style="width: 100%; height: 100%;" src="{{ $document->file_url }}" alt="Welcome to Doral" srcset="{{ $document->file_url }}"></td>
                                                                                                </tr>
                                                                                                @php $counter++ @endphp
                                                                                            @endforeach
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
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
    </body>
</html>