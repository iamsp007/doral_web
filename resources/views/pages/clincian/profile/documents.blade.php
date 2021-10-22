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
        <!-- <div class="break"></div> -->
    </tbody>
</table>