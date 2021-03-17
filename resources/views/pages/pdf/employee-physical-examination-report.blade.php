<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <title>Welcome to Doral</title>
   <style>
      @page {
            footer: page-footer;
            header: page-header;
				margin: 15px;
				margin-footer: 18pt;
            marks: crop cross;
            size: A4 landscape;
      }
      @font-face {
            font-family: 'robotoblack';
            src: url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.eot')}}");
            src: url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.eot?#iefix')}}") format('embedded-opentype'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.woff2')}}") format('woff2'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.woff')}}") format('woff'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.ttf')}}") format('truetype'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.svg#robotoblack')}}") format('svg');
            font-weight: normal;
            font-style: normal;
      }
      body {
				margin: 0;
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
				font-size: 12pt;
			}
         table, tr, td {
				border-collapse: separate;
            border-spacing: 0;
			}
			table { width: 100%; }
			td { vertical-align: middle; }
			.page-break { page-break-before: always; }
         #tblfirst td {padding: 35px 0 0 0;text-align:center}
   </style>
</head>
<body
    style='padding: 0;margin: 0;margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;'>
  <!-- Header Start Here -->
<table style="width: 100%;" id="tblfirst">
    <thead style="background-color: #07737A;padding:0;margin: 0 auto;justify-content: center;align-items: center;">
        <tr>
            <td>
                <a href="index.html" title="Welcome to Doral">
                    <img style="width:150px;height:92.28px;"
                        src="https://doralhealthconnect.com/appointment/assets/img/green_logo.jpg"
                        alt="Welcome to Doral">
                </a>
            </td>
        </tr>
    </thead>
</table>
<!-- Header End Here -->
<!-- EMPLOYEE PHYSICAL EXAMINATION REPORT Start Here -->
<table style="width: 100%;margin-top:15px;" cellpadding="15">
    <tr>
        <td
            style="text-align:center;border:1px solid #006C76;font-size:20px;font-weight:600;color: #006C76;font-family: '-apple-system,system-ui,BlinkMacSystemFont,'Segoe UI,Roboto'">
            EMPLOYEE PHYSICAL EXAMINATION REPORT</td>
    </tr>
</table>
<!-- EMPLOYEE PHYSICAL EXAMINATION REPORT End Here -->
<!-- 4 checkbox section start here -->
<table cellpadding="5"
    style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;margin-top:15px">
    <tr>
        <td style="width: 40%;vertical-align: text-top;">
            <input type="radio" style="vertical-align: middle;" id="customRadio4" name="example1" {{ ($report['physical_assessment'] == 'Pre-Employment Physical Assessment') ? 'checked' : '' }}>
            <label for="customRadio4" style="vertical-align: middle;">Pre-Employment Physical
                Assessment</label>
        </td>
        <td style="width: 25%;vertical-align: top;">
            <input type="radio" style="vertical-align: middle;" id="customRadio3" name="example1" {{
                ($report['physical_assessment'] == 'Annual Assessment') ? 'checked' : '' }}>
            <label for="customRadio3" style="vertical-align: middle;">Annual Assessment
            </label>
        </td>
        <td style="width: 25%;vertical-align: top;">
            <input type="radio" style="vertical-align: middle;" id="customRadio2" name="example1" {{
                ($report['physical_assessment'] == 'Return to Work / LOA') ? 'checked' : '' }}>
            <label for="customRadio2" style="vertical-align: middle;">Return to Work / LOA</label>
        </td>
        <td style="width: 10%;vertical-align:top;">
            <input type="radio" style="vertical-align: middle;" id="customRadio1" name="example1" {{
                ($report['physical_assessment'] == 'Other') ? 'checked' : '' }}>
            <label for="customRadio1" style="vertical-align: middle;">Other
            </label>
        </td>
    </tr>
</table>
<!-- 4 checkbox section end here -->
<!-- Title start here -->
<table style="width: 100%;margin-top:25px;" cellpadding="0">
    <tr>
        <td
            style="text-align:center;border:1px solid transparent;font-size:20px;font-weight:600;font-family: 'Roboto', sans-serif;color: #006C76;">
            AUTHORIZATION TO RELEASE INFORMATION</td>
    </tr>
</table>
<!-- Title End here -->
<!-- Confirmation start here -->
<table style="width: 100%;margin:0;" cellpadding="0">
    <tr>
        <td>
            <p style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;">I hereby authorize
                <input type="text" name="" value="{{ $report['name'] ?? '-' }}"
                    style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">
                to release all health information about me to Doral Health Connect.
            </p>
        </td>
    </tr>
</table>
<!-- Confirmation End here -->
<!-- Signature Start Here -->
<table style="width: 100%;margin:0;" cellpadding="0">
    <tr>
        <td></td>
        <td>
            <p style="font-weight: bold;font-size: 19px;text-align: right;box-shadow: none;">Employee Signature
                <input type="" name=""
                    style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">
            </p>
        </td>
    </tr>
</table>
<!-- Signature End Here -->
<!-- DEMOGRAPHIC INFORMATION start here -->
<div class="page-break"></div>
<div
    style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
    <div
        style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">
        DEMOGRAPHIC INFORMATION</div>
    <table style="width:100%" cellpadding="5">
        <tr>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>First Name</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['first_name'] ?? '-' }}">
            </td>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>Last Name</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['last_name'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>Date</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['dob'] ?? '-' }}">
            </td>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>Email</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['email'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>Gender</label>
                <input type="text" placeholder="Gender" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['gender'] == 1 ? 'Male' : 'Female' }}">
            </td>
            <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
                <label>Marital Status</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['marital_status'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td>
                <label>SSN Number</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['ssn'] ?? '-' }}">
            </td>
            <td>
                <label>Address</label>
                <input type="text" placeholder="Address" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['address'] ?? '-' }}">
            </td>
        </tr>
    </table>
</div>
<div style="width: 100%;margin-top:15px">
    <div
        style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">
        DEMOGRAPHIC INFORMATION</div>
    <table style="width: 100%;">
        <tr>
            <td>
                <div style="justify-content: flex-start;padding-right: 15px;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">HT:</label>
                    <input type="text" name="" value="{{ $report['height'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
            <td>
                <div style="justify-content: flex-start;padding-right: 15px;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">WT:</label>
                    <input type="text" name="" value="{{ $report['weight'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
            <td>
                <div style="justify-content: flex-start;padding-right: 0;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">B/P:</label>
                    <input type="text" name="" value="{{ $report['bp'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="justify-content: flex-start;padding-right: 15px;margin-top: 15px;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">PULSE:</label>
                    <input type="text" name="" value="{{ $report['pulse'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
            <td>
                <div style="justify-content: flex-start;padding-right: 15px;margin-top: 15px;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">RESP:</label>
                    <input type="text" name="" value="{{ $report['resp'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
            <td>
                <div style="justify-content: flex-start;padding-right: 0;margin-top: 15px;">
                    <label style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">TEMP:</label>
                    <input type="text" name="" value="{{ $report['temp'] ?? '-' }}"
                        style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                        disabled>
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- DEMOGRAPHIC INFORMATION end here -->
<div class="page-break"></div>
<!-- PHYSICAN CONDITION sTart Here -->
<div style="width: 100%;margin-top:25px">
    <div style="
    padding: 15px;
    font-size: 18px;
    margin-bottom: 0;
    background-color:  rgba(0, 108, 118, 0.08);
    border-bottom: 1px solid rgba(0,0,0,.125); font-weight: bold;
    color: #006c76;">PHYSICAN CONDITION</div>
    <table style="width: 100%;margin:0;" cellpadding="15">
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Head/ENT</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['head_ent'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                <label>Eyes</label>
                <input type="text" placeholder="Eyes:" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['eyes'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                <label>Neck</label>
                <input type="text" placeholder="Neck:" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['neck'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Breats</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['breats'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Lungs</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['lungs'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Cardiovascular</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['cardiovascular'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Muscular/Skeletal</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['muscular_skeletal'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Abdomen</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['abdomen'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Genitourinary</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['genitourinary'] ?? '-' }}">
            </td>
        </tr>
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label>Neurological</label>
                <input type="text" placeholder="Neurological" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['neurological'] ?? '-' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            </td>
        </tr>
    </table>
</div>
<div class="page-break"></div>
<!-- PHYSICAN CONDITION End Here -->
<!-- PHYSICAN CONDITION sTart Here -->
<div style="width: 100%;margin-top:25px">
    <div style="
    padding: 15px;
    font-size: 18px;
    margin-bottom: 0;
    background-color:  rgba(0, 108, 118, 0.08);
    border-bottom: 1px solid rgba(0,0,0,.125); font-weight: bold;
    color: #006c76;">EXPERIENCING ANY OF THE SYMPTOMS BELOW?</div>
    <table style="width: 100%;margin:0;" cellpadding="15">
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px" {{ isset($report['weakness_checked']) ? 'checked' : '' }}>Weakness</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['weakness_comment']) ? $report['weakness_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px" {{ isset($report['fatigue_checked']) ? 'checked' : '' }}>Fatigue</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['fatigue_comment']) ? $report['fatigue_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['lack_of_appetie_checked']) ? 'checked' : '' }}>Lack of Appetie</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['lack_of_appetie_comment']) ? $report['lack_of_appetie_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['weight_loss_checked']) ? 'checked' : '' }}>Weight Loss</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['weight_loss_comment']) ? $report['weight_loss_comment'] : '' }}">
            </td>
        </tr>
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['chest_pain_checked']) ? 'checked' : '' }}>Chest Pains</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['chest_pain_comment']) ? $report['chest_pain_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['fever_checked']) ? 'checked' : '' }}>Fever</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['fever_comment']) ? $report['fever_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['persistent_cough_checked']) ? 'checked' : '' }}>Persistent Cough</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['persistent_cough_comment']) ? $report['persistent_cough_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['night_sweats_checked']) ? 'checked' : '' }}>Night Sweats</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['night_sweats_comment']) ? $report['night_sweats_comment'] : '' }}">
            </td>
        </tr>
        <tr>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['shortness_of_breath_checked']) ? 'checked' : '' }}>Shortness of Breath</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['shortness_of_breath_comment']) ? $report['shortness_of_breath_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
                <label style="vertical-align: middle;"><input type="checkbox" style="vertical-align: middle;margin-right:5px;" {{ isset($report['blood_streaked_sputum_checked']) ? 'checked' : '' }}>Blood-Streaked Sputum</label>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ isset($report['blood_streaked_sputum_comment']) ? $report['blood_streaked_sputum_comment'] : '' }}">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            </td>
            <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            </td>
        </tr>
    </table>
</div>
<!-- PHYSICAN CONDITION End Here -->
<!-- LAB REPORTS AND RESULTS sTart Here -->
<div>
    <div
        style="display:block;padding: 0;font-size: 24px;margin: 50px 0px 25px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">
        EMPLOYEE PHYSICAL EXAMINATION REPORT <br> LABORATORY RESULTS (ALL LAB REPORTS AND RESULTS MUST BE ATTACHED)
    </div>
    <table style="width: 100%;border: 1px solid #a5a5a5;" cellpadding="5">
        <tbody>
            <tr>
                <td style="width:2%;border-bottom: 1px solid #a5a5a5;text-align:center">#</td>
                <td
                    style="width: 18%;font-weight: 800;font-size: 16px;color: #000;padding: 0 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    Test
                </td>
                <td
                    style="width: 20%;font-weight: 800;font-size: 16px;color: #000;padding: 0 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    Date Performed
                </td>
                <td
                    style="width: 20%;font-weight: 800;font-size: 16px;color: #000;padding: 0 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    Expiry Date
                </td>
                <td
                    style="width: 20%;font-weight: 800;font-size: 16px;color: #000;padding: 0 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    Results
                </td>
                <td
                    style="width: 18%;font-weight: 800;font-size: 16px;color: #000;padding: 0 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    LAB Value
                </td>
            </tr>
            @php $number = 1; @endphp
            @foreach($report['report'] as $reports)
                <tr style="background: #f8f8f8;">
                    <td style="width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">{{ $number }}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">{{ $reports['test_name'] }}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    {{ $reports['date_performed'] }}</td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    </td>
                    <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">{{ $reports['result'] }}
                    </td>
                    <td style="width: 18%;text-align: left;border-bottom: 1px solid #a5a5a5;text-align:center">
                    {{ $reports['lab_value'] }}</td>
                </tr>
                @php $number++; @endphp
            @endforeach
            
            <!-- <tr style="background: #fff;">
                <td style="width: 2%;text-align: left;text-align:center">2</td>
                <td style="width: 20%;text-align: left;text-align:center">#</td>
                <td style="width: 20%;text-align: left;text-align:center">03/04/2014</td>
                <td style="width: 20%;text-align: left;text-align:center">
                    03/04/2014</td>
                <td style="width: 20%;text-align: left;text-align:center">Immune</td>
                <td style="width: 18%;text-align: left;text-align:center">Positive</td>
            </tr> -->
        </tbody>
    </table>
</div>
<!-- LAB REPORTS AND RESULTS End Here -->
<div>
    <div class="page-break"></div>
    <table
        style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 0;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;margin-top: 50px;">
        <tbody>
            <tr>
                <td style="background: #fff;padding: 15px;border-bottom: 15px solid rgba(0, 108, 118, 0.08);">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="physical_note1" name="physical_note">
                        <label class="custom-control-label" for="physical_note1">This individual is free from any health impairment that is a potential risk to the patient or another employee of which may interfere with the performance of his/her duties including the habituation or addiction to drugs or alcohol.</label>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 15px;border-bottom: 15px solid rgba(0, 108, 118, 0.08);">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="physical_note2" name="physical_note" >
                        <label class="custom-control-label" for="physical_note2">This individual is able to work with the following limitations<br><span> It is a long established fact fact that a reader will be by the the readable content of a page.</label>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="background: #fff;padding: 15px;">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="physical_note3" name="physical_note" >
                        <label class="custom-control-label" for="physical_note3">Return to Work This individual is NOT physically/mentally able to work (specify reason)<br>
                        <span style="display: block;"> I It is a long established fact fact that a reader will be by the the readable content of a page.</span></label>
                    </div>   
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- PHYSICAL DETAILS start here -->
<div style="width: 100%;">
    <div
        style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">
        PHYSICAL DETAILS</div>
    <table style="width: 100%;">
        <tr>
            <td>
                <input type="text" placeholder="" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['physician_name'] ?? '-' }}">
            </td>
            <td>
                <input type="text" placeholder="ABCD12345" name=""
                    style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;"
                    value="{{ $report['physician_license_no'] ?? '-' }}">
            </td>
        </tr>
    </table>
    <table
        style="width: 100%; background-color: rgba(0, 108, 118, 0.08);border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;margin-top:10px;">
        <tr>
            <td style="padding: 0 5px 0 0;width: 50%;">
                <h1 style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;padding: 0;margin: 0;">
                    Physician Date & Signeture</h1>
                <div style="height: 150px;background-color: #fff;margin-top: 15px;"></div>
            </td>
            <td style="padding: 0 5px 0 15px;width: 50%;">
                <h1 style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;">
                    Physician Stamp</h1>
                <div style="height: 150px;background-color: #fff;margin-top: 15px;"></div>
            </td>
        </tr>
    </table>
</div>
<!-- PHYSICAL DETAILS end here -->
</body>
</html>