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
                                    <td style="width: 20%;text-align: left;text-align: center;vertical-align: middle; border-top: 1px solid #a5a5a5; ">{{ $users->idProof_count }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5; font-weight: bold; border-top: 1px solid #a5a5a5;">2</td>
                                    <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Social Security (original only)</td>
                                    <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; vertical-align: middle; vertical-align: middle;">I.D.</td>
                                    <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->socialSecurity_count }}</td>
                                </tr>
                                
                                @if ($users->user->designation_id == '2')
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">3</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Professional Reference Letters or Personal Reference <span style="font-weight: bold;border-bottom: 0px;">must be completed within 3 months: Dated of this year, English language, Valid Phone, NO RELATIVES.</span></td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">References</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->professionalReferrance_count }} </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;"> 4</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">NYS Nurse certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->nycNurseCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">5</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Mal Practice Insurance</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->malpracticeInsurance_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">6</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">CPR</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->CPR_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">7</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Physical (<span style="font-weight: bold;border-bottom: 0px;">completed within 1 year)</span></td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->physical_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">8</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Forensic Drug Screen (<span style="font-weight: bold;border-bottom: 0px;">completed within 6 months</span>) </br> *<span>LAB REPORT</span>*</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">(Pre-employment)</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->forensicDrugScreen_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">9</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubella Immunization *<span >Lab Report</span>*</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->RubellaImmunization_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">10</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Rubeolla/Measles Immunization *<span>Lab Report</span>*</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->RubellaMeasiesImmunization_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">11</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Annual PPD <span>OR</span> Quantiferon results (completed within 1 year)</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->annualPPD_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">12</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Chest X-Ray</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->chestXRay_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">13</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Flu Vaccination (Flu Shot) For Current Year</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Medical</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->flu_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">14</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Flu Vaccination (Flu Shot) For Current Year</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Annual Tube Screening</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->annualTubeScreening_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">15</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Flu Vaccination (Flu Shot) For Current Year</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; ">Annual Tube Screening</td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->w4document_count }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">3</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Degree Proof</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->degreeProof_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">4</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Medical Report</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->medicalReport_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">5</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Malpractice Insurance</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->insuranceReport_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">6</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Picture Identification</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->pictureIdentification_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">7</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Current CV</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->currentCV_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">8</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Professional License</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->ProfessionalLicense_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">9</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">State Registration Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->StateRegistrationCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">10</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">DEA License</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->DEALicense_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">11</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Controlled Substance State License</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->ControlledSubstanceStateLicense_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">12</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Mal Practice Certificate Of Insurance</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->MalpracticeCertificateOfInsurance_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">13</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Explanation Of All Mal Practice</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->ExplanationOfAllMalpractice_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">14</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Medical School Diploma</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->MedicalSchoolDiploma_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">15</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Residency Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->ResidencyCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">16</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Fellowship Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->FellowshipCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">17</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Intership Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->IntershipCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">18</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">ECFMG Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->ECFMGCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">19</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Board Certificate</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->BoardCertificate_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">20</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Hospital Affiliation Letter</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->HospitalAffiliationLetter_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">21</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Sanctions Queries</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->SanctionsQueries_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">22</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Medical Welcome Letter</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->MedicalWelcomeLetter_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">23</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Signed W9</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->SignedW9_count }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;text-align: left;padding: 15px; border-right: 1px solid #a5a5a5;font-weight: bold; border-top: 1px solid #a5a5a5;">24</td>
                                        <td style="width: 45%;text-align: left; padding-left: 10px; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5;">Signed E-Signature Form</td>
                                        <td style="width: 25%;text-align: left; text-align: center; border-right: 1px solid #a5a5a5;border-top: 1px solid #a5a5a5; "></td>
                                        <td style="width: 20%;text-align: left;text-align: center; border-top: 1px solid #a5a5a5; ">{{ $users->SignedESignatureForm_count }}</td>
                                    </tr>
                                @endif
                                
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