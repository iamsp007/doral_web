<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome to Doral</title>
   <style>
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
   body{padding:0;margin:0;  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";}
   .page-break {
      page-break-after: always;
   }
   td {
      display: table-cell;
      vertical-align: inherit;
   }
   table {
      display: table;
      border-collapse: separate;
   }
   #tblfirst td {padding: 35px 0 0 0;text-align:center}
   </style>
</head>
<body style='padding: 0;margin: 0;margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;'>
<!-- Header Start Here -->
<table style="width: 100%;" id="tblfirst">
   <thead style="background-color: #07737A;padding:0;margin: 0 auto;justify-content: center;align-items: center;">
      <tr>
         <td>
            <a href="index.html" title="Welcome to Doral">
               <img style="width:150px;height:92.28px;"  src="https://doralhealthconnect.com/appointment/assets/img/green_logo.jpg" alt="Welcome to Doral">
            </a>
         </td>
      </tr>
   </thead>
</table>
<!-- Header End Here -->
<!-- EMPLOYEE PHYSICAL EXAMINATION REPORT Start Here -->
<table style="width: 100%;margin-top:15px;" cellpadding="15">
   <tr>
      <td  style="text-align:center;border:1px solid #006C76;font-size:20px;font-weight:600;color: #006C76;font-family: '-apple-system,system-ui,BlinkMacSystemFont,'Segoe UI,Roboto'">EMPLOYEE PHYSICAL EXAMINATION REPORT</td>
   </tr>
</table>
<!-- EMPLOYEE PHYSICAL EXAMINATION REPORT End Here -->
<!-- 4 checkbox section start here -->
<table cellpadding="5" style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;margin-top:15px">
   <tr>
      <td style="width: 40%;vertical-align: text-top;">
         <input type="radio" style="vertical-align: middle;" id="customRadio4" name="example1" {{ isset($report['pre_employment_physical_assessment']) ? 'checked' : '' }}>
         <label for="customRadio4" style="vertical-align: middle;">Pre-Employment Physical
            Assessment</label>
      </td>
      <td style="width: 25%;vertical-align: top;">
         <input type="radio" style="vertical-align: middle;" id="customRadio3" name="example1" {{ isset($report['annual_assessment']) ? 'checked' : '' }}>
         <label for="customRadio3" style="vertical-align: middle;">Annual Assessment
         </label>
      </td>
      <td style="width: 25%;vertical-align: top;">
         <input type="radio"  style="vertical-align: middle;" id="customRadio2" name="example1" {{ isset($report['return_to_work_or_loa']) ? 'checked' : '' }}>
         <label for="customRadio2" style="vertical-align: middle;">Return to Work / LOA</label>
      </td>
      <td style="width: 10%;vertical-align:top;">
         <input type="radio" style="vertical-align: middle;"  id="customRadio1" name="example1" {{ isset($report['other']) ? 'checked' : '' }}>
         <label for="customRadio1"style="vertical-align: middle;" >Other
         </label>
      </td>
   </tr>
</table>
<!-- 4 checkbox section end here -->
<!-- Title start here -->
<table style="width: 100%;margin-top:25px;" cellpadding="0">
   <tr>
      <td style="text-align:center;border:1px solid transparent;font-size:20px;font-weight:600;font-family: 'Roboto', sans-serif;color: #006C76;">AUTHORIZATION TO RELEASE INFORMATION</td>
   </tr>
</table>
<!-- Title End here -->
<!-- Confirmation start here -->
<table style="width: 100%;margin:0;" cellpadding="0">
   <tr>
      <td>
         <p style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;">I hereby authorize <input type="text" name="" value="{{ $report['name'] ?? '' }}" style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;"> to release all health information about me to Doral Health Connect.</p>
      </td>
   </tr>
</table>
<!-- Confirmation End here -->
<!-- Signature Start Here -->
<table style="width: 100%;margin:0;" cellpadding="0">
   <tr>
      <td></td>
      <td>
         <p style="font-weight: bold;font-size: 19px;text-align: right;box-shadow: none;">Employee Signature <input type="" name="" style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;"></p>
      </td>
   </tr>
</table>
<!-- Signature End Here -->
<!-- DEMOGRAPHIC INFORMATION start here -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
   <div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">DEMOGRAPHIC INFORMATION</div>
   <table style="width:100%" cellpadding="5">
      <tr>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>First Name</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['first_name'] ?? '' }}">
         </td>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>Last Name</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['last_name'] ?? '' }}">
         </td>
      </tr>
      <tr>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>Date</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['dob'] ?? '' }}">
         </td>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>Email</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['email'] ?? '' }}">
         </td>
      </tr>
      <tr>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>Gender</label>
            <input type="text" placeholder="Gender" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['gender'] == 1 ? 'Male' : 'Female' }}">
         </td>
         <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
            <label>Marital Status</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['marital_status'] ?? '' }}">
         </td>
      </tr>
      <tr>
         <td>
            <label>SSN Number</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['ssn'] ?? '' }}">
         </td>
         <td>
            <label>Address</label>
            <input type="text" placeholder="Address" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['address'] ?? '' }}">
         </td>
      </tr>
   </table>
</div>
<div style="width: 100%;margin-top:15px">
   <div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">DEMOGRAPHIC INFORMATION</div>
   <table style="width: 100%;">
      <tr>
         <td>
            <div style="justify-content: flex-start;padding-right: 15px;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">HT:</label>
               <input type="text" name="" value="{{ $report['ht'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
         <td>
            <div style="justify-content: flex-start;padding-right: 15px;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">WT:</label>
               <input type="text" name="" value="{{ $report['wt'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
         <td>
            <div style="justify-content: flex-start;padding-right: 0;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">B/P:</label>
               <input type="text" name="" value="{{ $report['bp'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
      </tr>
      <tr>
         <td>
            <div
               style="justify-content: flex-start;padding-right: 15px;margin-top: 15px;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">PULSE:</label>
               <input type="text" name="" value="{{ $report['pulse'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
         <td>
            <div
               style="justify-content: flex-start;padding-right: 15px;margin-top: 15px;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">RESP:</label>
               <input type="text" name="" value="{{ $report['resp'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
         <td>
            <div
               style="justify-content: flex-start;padding-right: 0;margin-top: 15px;">
               <label
                  style="margin-right: 5px;font-size: 17px;font-weight: bold;min-width: 40px;">TEMP:</label>
               <input type="text" name="" value="{{ $report['temp'] ?? '' }}"
                  style="width: calc(100% - 40px)!important;padding: 0 .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid transparent;border-radius: 0px;outline: none;"
                  disabled>
            </div>
         </td>
      </tr>
   </table>
</div>
<!-- DEMOGRAPHIC INFORMATION end here -->
<br>
<br>
<br>
<br>
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
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Head/ENT">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
            <label>Eyes</label>
            <input type="text" placeholder="Eyes:" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Eyes">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
            <label>Neck</label>
            <input type="text" placeholder="Neck:" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Neck">
         </td>
      </tr>
      <tr>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Breats</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Breats">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Lungs</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Lungs">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Cardiovascular</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Cardiovascular">
         </td>
      </tr>
      <tr>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Muscular/Skeletal</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Muscular/Skeletal">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Abdomen</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Abdomen">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Genitourinary</label>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Genitourinary">
         </td>
      </tr>
      <tr>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
            <label>Neurological</label>
            <input type="text" placeholder="Neurological" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="Neurological">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
         </td>
         <td style="background: rgba(0, 108, 118, 0.08);border-bottom: 1px solid #e4e4e4;">
         </td>
      </tr>
   </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="width: 100%;">
   <div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">PHYSICAL DETAILS</div>
   <table style="width: 100%;">
      <tr>
         <td>
            <input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['physician_name'] ?? '' }}">
         </td>
         <td>
            <input type="text" placeholder="ABCD12345" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $report['physician_license_no'] ?? '' }}">
         </td>
      </tr>
   </table>
   <table style="width: 100%; background-color: rgba(0, 108, 118, 0.08);border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;margin-top:10px;">
      <tr>
         <td style="padding: 0 5px 0 0;width: 50%;">
            <h1
               style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;padding: 0;margin: 0;">
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
</body>
</html>