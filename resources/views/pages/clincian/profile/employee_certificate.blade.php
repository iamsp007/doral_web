<!-- page 8 start-->
<div class="break"></div>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
    <tbody>
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
                <table style="margin-top: 30px;">
                    <tbody>
                        <tr>
                            <td style="border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0 15px 10px">Form <b style="font-size: 15px">W-4</b></td>
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
                                            <td style="border-bottom: 1px solid #000;padding: 10px 15px">OMB No. 1545-0074</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 24px;font-weight: bold;padding: 10px 15px">2021</td>
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
                                                                                <label>
                                                                                    @if (isset($users->address_detail['address']))
                                                                                        {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }},
                                                                                    @endif
                                                                                    @if (isset($users->address_detail['address']))
                                                                                        {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }},
                                                                                    @endif
                                                                                    {{ isset($users->address_detail['address']) ? $users->address_detail['address']['zipcode'] : ''}}
                                                                                </label>
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
                            <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-top: 1px solid #000;border-bottom: 1px solid #000;">
                                Step 3: <br>Claim <br>Dependents
                            </td>
                            <td width="60%" valign="top" style="padding: 10px 0 15px 0; border-right: 1px solid #000;border-top: 1px solid #000;border-bottom: 1px solid #000;" >
                                <label style="font-size: 14px; font-weight: normal;">
                                    If your income will be $200,000 or less ($400,000 or less if married filing jointly):
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
                                                            <td style="padding: 15px;text-align: left; border:1px solid #000;border-top: none;">$</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 15px;text-align: left; border:1px solid #000;">$</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 15px;text-align: left; border:1px solid #000;">$</td>
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
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td width="15%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                Employers <br>
                                Only
                            </td>
                            <td width="50%" valign="top" style="font-size: 16px;line-height: 22px; font-weight: bold;padding: 5px 15px 15px; border-right: 1px solid #000;border-bottom: 1px solid #000;">
                                {{ ($users->user) ? $users->user->full_name : ''}} <br>
                                {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address1']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['address2']  : ''}} {{ isset($users->address_detail['address']) ? $users->address_detail['address']['building']  : ''}}
                            @if (isset($users->address_detail['address']))
                                {{ isset($users->address_detail['address']['city_id']) ? \App\Models\City::find($users->address_detail['address']['city_id'])->city : '' }}
                            @endif
                            @if (isset($users->address_detail['address']))
                                {{ isset($users->address_detail['address']['state_id']) ? \App\Models\State::find($users->address_detail['address']['state_id'])->state : '' }}
                            @endif 
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
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- page 8 end-->

<!-- page 9 start-->
<div class="break"></div>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
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
        <td style="text-align: right; position: relative; border-top: 1px solid;padding-top: 0px; ">
            <image src="{{ asset('assets/img/pdf-ico.png') }}" style="position: absolute;left: 13px;top: 5px;">
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
                        Employee's signature <br>@if($users->signature_url)<img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">@endif
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
                    <td style="line-height: 22px;padding-top: 15px; font-size: 14px;line-height: 25px;font-weight: normal;">
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
</table>
<!-- page 9 end-->

<!-- page 10 start-->
<div class="break"></div>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
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
<!-- page 10 end-->

<!-- page 11 start-->
<div class="break"></div>
<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
    <tbody>
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
                <table>
                    <tbody>
                        <tr>
                            <td width="21%" style="border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0 20px 10px">Form <b style="font-size: 18px">W-11</b></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0 20px">(Rev. June 2010) <br>
                                            Department of the Treasury <br>
                                            InternalRevenue Service</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td align="center" style="padding: 0px 20px 0px 20px;border-bottom: 1px solid #000;border-right: 1px solid #000;">
                                <label align="center"><b style="font-size: 18px">Hiring Incentives to Restore Employment(HIRE) Act <br>Employee Affidavit </b></label>
                                <ul align="left" style="padding-top: 20px;">
                                    <li>Donot sendthis formtothe IRS.Keepthis formfor your records</li>
                                </ul>
                            </td>
                            <td width="21%" valign="top" style="border-bottom: 1px solid #000; vertical-align: middle;">
                                <table cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 0px 20px 10px 20px;">OMBNo. 1545-217</td>
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
                            <td style="padding-top: 10px;"><b style="font-weight: bold;">To be completed by new employee. Affidavit is not valid unless employee signs it.</b> <br>I certify that I have been unemployed or have not worked for anyone for more than 40 hours during the 60-day period ending on the date I began employment with this employer.</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 15px;padding-bottom: 5px;">
                <table>
                    <tbody>
                        <tr>
                            <td width="50%" style="padding-bottom: 5px;">Your name: <span>{{ ($users->user) ? $users->user->full_name : '' }}</span></td>
                            <td>Social security number <span>{{ ($users->ssn) ? $users->ssn : '' }}</span></td>
                        </tr>
                        <tr>
                            <td width="50%">First date of employment</td>
                            <td>Name of employer <span></span></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;">Under penalties of perjury, I declare that I have examined this affidavit and, to the best of my knowledge and belief, it is true, correct, andcomplete.      </td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;border-bottom: 2px solid #000000;">
                <table>
                    <tbody>
                        <tr>
                            <td align="left" valign="middle">Employee's&nbsp;signature </td>
                            <td width="60%" align="left" valign="middle" style="padding-left: 20px;"> @if($users->signature_url)<img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">@endif</td>
                            <td width="25%" align="left" valign="middle">Date {{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid #000000;">
                <table class="mystylea">
                    <tbody>
                        <tr>
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
                                    <tr>
                                        <td>
                                            <p style="margin-bottom: 5px; align-items: flex-start; margin-right: 5px;"><img src="{{asset('assets/img/icon.png') }}" width="25" />Do not send this form to the IRS.
                                            Keep it with your other payroll and
                                            income tax records.
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <table>  
                                    <tr>
                                        <td>
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
                                            </p>
                                        </td>
                                    </tr>
                                </table>
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
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- page 11 end-->

<!-- page 12 start-->
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
                HEPATITIS B VACCINE DECLINATION
            </h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p class="white-spacenone">I am declining the Hepatitis B Vaccination</p>
                        <p style="font-weight: normal; white-space: normal;">
                            I understand that due to my occupational exposure to blood or other potential infectious materials, I may be at risk of acquiring Hepatitis B Virus (HEW) infection. I have been given the opportunity to be vaccinated with the Hepatitis B Vaccine. I have also been asked if I have questions regarding this information and ill had questions, they were fully answered to my satisfaction. I have been offered the  opportunity to be vaccinated with the Hepatitis B Vaccine at no charge to myself.
                        </p>
                        <p style="font-weight: normal; white-space: normal;">
                            I decline Hepatitis B vaccine at this time. I understand that by declining this vaccine, Icontinue to be at risk of acquiring Hepatitis B, a serious disease. If, in the future, while employed by Doral Health and wellness I continue to have occupational exposure to blood orother potentially infectious materials and I want to be vaccinated with Hepatitis B vaccine, I can receive the vaccination series at no charge to me.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td>
                            <p>Name (Please Print)<span>{{ ($users->user) ? $users->user->full_name : ''}}</span></p>
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
                            <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">@endif</span></p>
                        </td>
                        <td>
                            <p>Date<span></span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
<!-- page 12 end-->

<!-- page 13 start-->
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
                        <td style="width: 50%;">
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
                        <td style="width: 50%;">
                            <p>DOE:<span>
                            {{ ($users->user) ? $users->user->dob : ''}} </span>
                            </p>
                        </td>
                        <td>
                            <p>Document Proof:<span></span></p>
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
                        <td style="width: 50%;">
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
                        <td style="width: 50%;">
                            <p>Witness Signature:<span></span></p>
                        </td>
                        <td>
                            <p>Date:<span></span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
<!-- page 13 end-->

    <!-- page 14 start-->
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
<!-- page 14 end-->