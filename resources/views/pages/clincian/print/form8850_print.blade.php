<!DOCTYPE html>
<html lang="en">
<style>
    @page {
        margin: 15px;
        
    }

    input[type=text] {
        width: auto;
        outline: 0;
        border-width: 0 0 1.5px;
        border-color: rgb(0, 0, 0);
        background-color: whitesmoke;
    }
    input[type=checkbox]{
        margin-bottom: 50px;
    }
    .container {
        font-family: arial;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .box {
        border-bottom: 2px solid black;
    }

    .box:after {
        content: "";
        display: table;
        clear: both;
        border-bottom: 2px solid black;
    }

    #leftbox {
        float: left;
        width: 18%;
        font-size: 9px;

    }

    #middlebox {
        float: left;
        width: 63%;
        text-align: center;
        border-left: 2px solid black;
        border-right: 2px solid black;
    }

    #rightbox {
        float: right;
        width: 18%;
        font-size: 9px;

    }

    h1 {
        text-align: center;
    }
    
    table.tbl, table.tbl tr,table.tbl td{
        border: 1px solid black;
    }
    table{
        border-collapse: collapse;
    }
    .date-applicant{
        font-size: 12px;
        border:none;
    }
    p, li{
        font-size: 12px;
    }
    span{
        border-bottom: 2px solid black;
        width: 100%;
    }
    #arror{
        border: none;
    }
</style>
<head>
    <title>
        Pella Care
    </title>
</head>

<body style="margin: 0; padding: 5px;">
    <div class="container">

        <div class="box">
            <div id="leftbox">
                Form <span id="arror" style="font-size: 30px;font-weight: bold;">8850</span><br>
                (Rev. March 2016)<br>
                Department of the Treasury<br>
                Internal Revenue Service
            </div>

            <div id="middlebox">
                <p style="font-size: 16px;"><b>Pre-Screening Notice and Certification Request for
                    the Work Opportunity Credit</b></p>
                <p style="font-size: 10px;margin-bottom: auto;margin-top: 0px;"><span id="arror" style='font-size: 14px;'>&#9654;</span><b>Information about Form 8850 and its separate
                        instructions is at www.irs.gov/form8850.</b></p>
            </div>

            <div id="rightbox">
                <p>OMB No. 1545-1500</p>
            </div>
        </div>

        <div>
            <h5 style="text-align: center;">Job applicant: Fill in the lines below and check any boxes that apply.
                Complete
                only this side.
            </h5>
        </div>


        <p>Your Name <span style="margin-right: 20px;"> {{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }} </span> Social security number <span id="arror"
                style='font: size 20px;'>&#9654;</span><span>@if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif</span></p>
        <p>Street address where you live <span> {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}},  {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}}, {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}</span> </p>
        <p>City or town, state, and ZIP code &nbsp;&nbsp;<span> @if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                                                        @endif, @if (isset($users->address_detail['address']))
                                                            {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                                                        @endif,  {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}</span> </p>
        <p>Country <span></span> Telephone number <span>  {{ ($users->home_phone) ? $users->home_phone : ''}}</span>
        </p>
        <p>If you are under age 40, enter your date of birth (month, day, year) <span>{{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}</span>
        </p>

        <hr>
        <ul type="none">
            <li><b>1.</b><input type="checkbox">&nbsp;&nbsp; Check here if you received a conditional certification from the state
                workforce
                agency (SWA) or a participating local agency
                for the<br>&emsp;&emsp;&emsp; work opportunity credit.
            </li><br>
            <li><b>2.</b><input type="checkbox">&nbsp;&nbsp; Check here if any of the following statements apply to you.
                <ul style="list-style-type:disc;">
                    <li> I am a member of a family that has received assistance from Temporary Assistance for Needy
                        Families
                        (TANF) for any 9
                        months during the past 18 months.</li>
                    <li> I am a veteran and a member of a family that received Supplemental Nutrition Assistance Program
                        (SNAP) benefits (food
                        stamps) for at least a 3-month period during the past 15 months.</li>
                    <li> I was referred here by a rehabilitation agency approved by the state, an employment network
                        under
                        the Ticket to Work
                        program, or the Department of Veterans Affairs.</li>
                    <li> I am at least age 18 but not age 40 or older and I am a member of a family that:
                        <ol type="a">
                            <li> Received SNAP benefits (food stamps) for the past 6 months; or </li>
                            <li> Received SNAP benefits (food stamps) for at least 3 of the past 5 months, but is no
                                longer
                                eligible to receive them. </li>
                        </ol>
                    </li>
                    <li> During the past year, I was convicted of a felony or released from prison for a felony.</li>
                    <li> I received supplemental security income (SSI) benefits for any month ending during the past 60
                        days.</li>
                    <li> I am a veteran and I was unemployed for a period or periods totaling at least 4 weeks but less
                        than
                        6 months during the
                        past year.</li>
                </ul>
            </li><br>
        
        
            <li><b>3.</b><input type="checkbox"> &nbsp;&nbsp; Check here if you are a veteran and you were unemployed for a period or
                periods
                totaling at least 6 months during the past
                year. </li><br>
            <li><b>4.</b><input type="checkbox"> &nbsp;&nbsp; Check here if you are a veteran entitled to compensation for a
                service-connected disability and you were discharged or
                released from <br>&emsp;&emsp;&emsp;&nbsp;active duty in the U.S. Armed Forces during the past year.</li><br>
            <li><b>5.</b><input type="checkbox"> &nbsp;&nbsp; Check here if you are a veteran entitled to compensation for a
                service-connected disability and you were unemployed for a
                period or<br>&emsp;&emsp;&emsp;&nbsp; periods totaling at least 6 months during the past year.</li><br>
            <li><b>6.</b><input type="checkbox"> &nbsp;&nbsp; Check here if you are a member of a family that:</li><br>
            
                <ul style="list-style-type:disc;">
                    <li>Received TANF payments for at least the past 18 months; or</li>
                    <li> Received TANF payments for any 18 months beginning after August 5, 1997, and the earliest
                        18-month period beginning
                        after August 5, 1997, ended during the past 2 years; or</li>
                    <li>Stopped being eligible for TANF payments during the past 2 years because federal or state
                        law
                        limited the maximum time
                        those payments could be made.</li>
                </ul>
        
        
           <li><b>7.</b><input type="checkbox"> &nbsp;&nbsp; Check here if you are in a period of unemployment that is at least 27
                consecutive weeks and for all or part of that period
                you received <br>&emsp;&emsp;&emsp;&nbsp;unemployment compensation.</li>
        </ul>
        <hr>
        <p style="margin-top:0px;margin-bottom:0px;font-size:10px;text-align: center;"><b>Signature All Applicants Must Sign</b></p>
        <hr>
        <p>Under penalties of perjury, I declare that I gave the above information to the employer on or before the
            day
            I was offered a job, and it is, to the best of my knowledge, true,
            correct, and complete.</p>

        <p><b>Job applicant's signature 
            @if($users->signature_url)  
                <img
                      src="{{ $users->signature_url }}"
                      style="width: 90px; height: auto"
                   />
                @endif
            <span id="arror" style='font: size 20px;margin-right: 35%;'>&#9654;</span> Date <span> {{date('m/d/Y')}}</span></b></p>
        <hr>
        <p><b>For Privacy Act and
            Paperwork Reduction Act Notice, see page 2.</b></p>
        <hr>
        <p style="font-size:15px;text-align: center;page-break-before: always"><b>For Employer's Use Only</b></p>

        <p>Employer's name <span></span> Telephone no. <span></span> EIN <span id="arror" style='font: size 20px;'>&#9654;</span> <span></span></p>
        <p>Street address<span>}</span> </p>
        <p>City or town, state, and ZIP code <span></span> </p>
        <p>Person to contact, if different from above <span>{</span> Telephone
            number <span></span></p>
        <p>Street address <span></span> </p>
        <p>City or town, state, and ZIP code <span></span> </p>
        <p>If, based on the individualâ€™s age and home address, he or she is a member of group 4 or 6 (as
            described under
            Members of
            Targeted Groups in the separate instructions), enter that group number (4 or 6) . . . . . .
            .<span id="arror" style='font: size 20px;'>&#9654;</span> <span>__________________________________</span> </p>
        <p>Date applicant:</p>
        <table class="date-applicant" style="border: none;">
            <tbody>
                <tr>
                    <td style="width:9%">Gave information</td>
                    <td> <span>_______________</span></td>
                    <td style="width:13%">Was offered job</td>
                    <td> <span>_______________</span></td>
                    <td style="width:8%"> Was hired</td>
                    <td> <span>_______________</span></td>
                    <td style="width:8%"> Started hired</td>
                    <td> <span>_______________</span></td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p>Under penalties of perjury, I declare that the applicant provided the information on this form on
            or before
            the day a job was offered to the applicant and that the
            information I have furnished is, to the best of my knowledge, true, correct, and complete. Based
            on the
            information the job applicant furnished on page 1, I
            believe the individual is a member of a targeted group. I hereby request a certification that
            the individual
            is a member of a targeted group.</p>

        <p><b>Employer’s signature<span id="arror" style='font: size 20px;margin-right: 45%;'>&#9654;</span>
            Title <span>_______________</span> Date <span>_______________</span></b> </p>
        <hr>
        <table style="border: none;">
            <tbody>
                <tr>
                    <td style="vertical-align: text-top;width: 33%;">
                        <h2>Privacy Act and Paperwork Reduction Act Notice</h2>
                        <p>Section references are to the Internal Revenue Code.</p>
                        <p>Section 51(d)(13) permits a prospective employer to request the applicant to
                            complete this
                            form and give it to the prospective employer. The information
                            will be used by the employer to complete the employer's federal tax return.
                            Completion of
                            this form is voluntary and may assist members of targeted groups in securing
                            employment.
                            Routine uses of this form include giving it to the state workforce agency (SWA),
                            which will
                            contact appropriate sources to confirm that the applicant is a member of a
                            targeted group.
                            This form
                            may also be given to the Internal Revenue Service for administration of the
                            Internal Revenue
                            laws, to the Department of Justice for civil and</p>
                    </td>
                    <td style="vertical-align: text-top;width: 33%;">
                        <p>criminal litigation, to the Department of
                            Labor for oversight of the certifications
                            performed by the SWA, and to cities,
                            states, and the District of Columbia for
                            use in administering their tax laws. We
                            may also disclose this information to
                            other countries under a tax treaty, to
                            federal and state agencies to enforce
                            federal nontax criminal laws, or to
                            federal law enforcement and intelligence
                            agencies to combat terrorism.</p>
                        <p> You are not required to provide the
                            information requested on a form that is
                            subject to the Paperwork Reduction Act
                            unless the form displays a valid OMB
                            control number. Books or records
                            relating to a form or its instructions must
                            be retained as long as their contents
                            may become material in the
                            administration of any Internal Revenue
                            law. Generally, tax returns and return
                            information are confidential, as required
                            by section 6103. </p>
                    </td>
                    <td style="vertical-align: text-top;width: 33%;">
                        <p>The time needed to complete and file
                            this form will vary depending on
                            individual circumstances. The estimated
                            average time is:</p>
                        <b>Recordkeeping ..... 6hr.,27min.</b>
                        <b>Learning about the law or the form . . . . . . . 24 min.</b>
                        <b>Preparing and sending this form to the SWA . . . . . . . 31 min.</b>
                        <p>If you have comments concerning the
                            accuracy of these time estimates or
                            suggestions for making this form
                            simpler, we would be happy to hear from
                            you. You can send us comments from
                            www.irs.gov/formspubs.Click on “More
                            Information” and then on “Give us
                            feedback.” Or you can send your
                            comments to:</p>
                        <p>Internal Revenue Service
                            Tax Forms and Publications
                            1111 Constitution Ave. NW, IR-6526
                            Washington, DC 20224
                        </p>
                        <p>Do not send this form to this address.
                            Instead, see When and Where To File in
                            the separate instructions.</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <form style="page-break-before: always">
            <table>
                <tbody>
                    <tr >
                        <td style="border: none;width: 33%;">
                            <img src="{{ asset('pdf_logos/Seal_of_the_United_States_Department_of_Labor.svg.png') }}" width="15%" alt="" style="float: left;margin-right: 4px;" srcset="">
                            U.S. Department Labor <br> Employment and Training Administration</td>
                        <td style="border: none;text-align: center;width: 33%;"><h4>Individual Characteristics Form (ICF) <br>
                            Work Opportunity Tax Credit</h4></td>
                        <td style="border: none;text-align: end;width: 33%;">OMB Control No. 1205-0371 <br>
                            Expiration Date: January 31, 2020</td>
                    </tr>
                </tbody>
            </table>
            <table class="tbl" >
                <tbody>
                    
                    <tr>
                        <td>
                            <p style="margin-bottom: 13%;"><b>1.</b> Control No. (For Agency use only)</p>
                        </td>
                        <td style="border-top: none !important;text-align: center;">
                            <h3>APPLICANT INFORMATION<br>
                            (See instructions on reverse)</h3>
                        </td>
                        <td>
                            <p style="margin-bottom: 13%;"><b>2.</b> Date Received (For Agency Use only)</p>
                        </td>
                    </tr>
                    <tr style="background-color: dimgray;">
                        <td colspan="3" style="text-align: center;">
                            <p><b>EMPLOYER INFORMATION</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>3.</b> Employer Name</p>
                            <p> <span></span></p>
                            
                        </td>
                        <td>
                            <p><b>4.</b> Employer Address and Telephone</p>
                            <p>  <span>
                                </span></p>
                            
                        </td>
                        <td>
                            <p><b>5.</b> Employer Federal ID Number (EIN)</p>
                            <p> <span></span></p>
                        </td>
                    </tr>
                    <tr style="background-color: dimgray;">
                        <td colspan="3" style="text-align: center;">
                            <p><b>APPLICANT INFORMATION</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>6.</b> Applicant Name (Last, First, MI)</p>
                            <p> <span> {{ ($users->user) ? $users->user->first_name : '' }} {{ ($users->user) ? $users->user->last_name : '' }}</span></p>
                        </td>
                        <td>
                            <p><b>7.</b> Social Security Number</p>
                            <p> <span>  @if (isset($users->address_detail['info']))
                                                            {{ $users->address_detail['info'] ? getSsn($users->address_detail['info']['ssn']) : '' }}
                                                        @else
                                                            {{ ($users->ssn) ? getSsn($users->ssn) : ''}}
                                                        @endif</span></p>
                        </td>
                        <td>
                            <p> <b>8.</b> Have you worked for this employer
                                before? Yes__ No__</p>
                            <p> If YES, enter last date of
                                employment:<span>____________________</span></p>
                        </td>
                    </tr>
                    <tr style="background-color: dimgray;">
                        <td colspan="3" style="text-align: center;">
                            <p><b>APPLICANT CHARACTERISTICS FOR WOTC TARGET GROUP CERTIFICATION</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><b>9.</b> Employment Start Date</p>
                            <p><span>____________________</span></p>
                        </td>
                        <td>
                            <p><b>10.</b> Starting Wage </p>
                            <p><span>____________________</span></p>
                        </td>
                        <td>
                            <p><b>11.</b> Position</p>
                            <p><span>____________________</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>12.</b> Are you at least age 16, but under age 40? Yes__ No__<br>
                            If YES, enter your date of birth <span> {{ $users->address_detail['info'] ? $users->address_detail['info']['dateOfBirth'] : '' }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>13.</b> Are you a Veteran of the U.S. Armed Forces? Yes__ No__ <br>
                            If NO, go to Box 14.<br>
                            If YES, are you a member of a family that received Supplemental Nutrition Assistance<br>
                            Program (SNAP) benefits (Food Stamps) for at least 3 months during the 15 months before you
                            were hired? Yes__ No__ <br>
                            If YES, enter name of primary recipient <span>____________________</span> and city and state where
                            benefits were received <span>____________________</span> <br>
                            OR, are you a veteran entitled to compensation for a service-connected disability? Yes__
                            No__ <br>
                            If YES, were you discharged or released from active duty within a year before you were
                            hired? Yes__ No__ <br>
                            OR, were you unemployed for a combined period of at least 6 months (whether or not
                            consecutive) during the year before you were hired? Yes__ No__

                        </td>
                    <tr>
                        <td colspan="3">
                            <b>14.</b> Are you a member of a family that received Supplemental Nutrition Assistance Program<br>
                            (SNAP) (formerly Food Stamps) benefits for the 6 months before you were hired? Yes__ No__
                            <br>
                            OR, received SNAP benefits for at least a 3-month period within the last 5 months But you
                            are no longer receiving them? Yes__ No__ <br>
                            If YES to either question, enter name of primary recipient <span>____________________</span> and city And
                            state where benefits were received <span>____________________</span> <br>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>15.</b> Were you referred to an employer by a Vocational Rehabilitation Agency approved by a
                            State? Yes__ No__ <br>
                            OR, by an Employment Network under the Ticket to Work Program? Yes__ No__ <br>
                            OR, by the Department of Veterans Affairs? Yes__ No__
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>16.</b> Are you a member of a family that received TANF assistance for at least the last 18
                            months before you were hired? Yes__ No__ <br>
                            OR, are you a member of a family that received TANF benefits for any 18 months beginning
                            after August 5, 1997, and the earliest 18-month period beginning after August 5, 1997, ended
                            within 2 years before you were hired? Yes__ No__ <br>
                            OR, did your family stop being eligible for TANF assistance within 2 years before you were
                            hired because a Federal or state law limited the maximum time those payments could be made?
                            Yes__ No__ <br>
                            If NO, are you a member of a family that received TANF assistance for any 9 months during
                            the 18-month period before you were hired? Yes__ No__ <br>
                            If YES, to any question, enter name of primary recipient <span>____________________</span> and the city
                            and state where benefits were received <span>____________________</span>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>17.</b> Were you convicted of a felony or released from prison after a felony conviction during
                            the year before you were hired? Yes__ No__ <br>
                            If YES, enter date of conviction <span>____________________</span> and date of release <span>____________________</span>. <br>
                            Was this a Federal <input type="checkbox">&nbsp; or a State conviction <input type="checkbox"> &nbsp;(Check
                            one)

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>18.</b> Do you live in an Empowerment Zone or Rural Renewal County (RRC)? Yes__ No__
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>19.</b> Do you live in an Empowerment Zone and are at least age 16, but not yet 18, on your
                            hiring date? Yes__ No__

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>20.</b> Did you receive Supplemental Security Income (SSI) benefits for any month ending within
                            60 days before you were hired? Yes__ No__

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>21.</b> Are you a veteran unemployed for a combined period of at least 6 months (whether or not
                            consecutive) during the year before you were hired? Yes__ No__

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>22.</b> Are you a veteran unemployed for a combined period of at least 4 weeks but less than 6
                            months (whether or not
                            consecutive) during the year before you were hired? Yes__ No__

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>23.</b> Are you an individual who is or was in a period of unemployment that is at least 27
                            consecutive weeks and for all
                            or part of that period you received unemployment compensation? Yes__ No__ <br>
                            If YES, what state did you receive unemployment compensation in? <span>____________________</span>(Enter
                            state where UI compensation was received)

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>24.</b> Sources used to document eligibility: (Employers/Consultants: List all documentation
                            provided or forthcoming. For
                            SWA Staff: List all documentation used in determining target group eligibility and enter
                            your initials and date when the
                            determination was made. <br>
                            <span>____________________</span>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>
                                I certify that this information is true and correct to the best of my knowledge. I
                                understand that the
                                information above may be subject to verification.
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> 25(a).</b> Signature: (See instructions in Box 25.(b) for who signs this
                            signature block) <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                        </td>
                        <td>
                            <b> 25.(b)</b> Indicate with a mark who signed this form:<br>
                            <input type="checkbox">&nbsp; Employer,<input type="checkbox">&nbsp;Consultant,<input type="checkbox">&nbsp;SWA,
                            <input type="checkbox"> &nbsp;Participating Agency, <input type="checkbox">&nbsp; Applicant, or <input
                                type="checkbox"> &nbsp;Parent/Guardian (if applicant is a
                            minor)
                        </td>
                        <td>
                            Date: <br>
                            <span> {{date('m/d/Y')}}</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>
</body>

</html>