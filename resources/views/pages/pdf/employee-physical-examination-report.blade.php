<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome to Doral</title>
</head>
<body style="padding: 0;margin: 0;">
    <table style="width: 100%;">
      <thead
         style=" background-color: #07737A;padding: 10px;margin: 0 auto;justify-content: center;align-items: center;">
         <tr>
            <td>
               <a href="index.html" title="Welcome to Doral">
                  <img style="width: 180px; height: 84px;" src="assets/img/green_logo.jpg" alt="Welcome to Doral"
                     srcset="assets/img/logo-white.svg">
               </a>
            </td>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td style=" justify-content: center;">
               <!-- Body Section Start Here -->
               <table style="width: 1140px;margin-top: 15px;">
                  <tr>
                     <td>
                        <h1
                           style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                           EMPLOYEE PHYSICAL EXAMINATION REPORT</h1>
                     </td>
                  </tr>
                  <tr>
                     <td style="height: 15px;"></td>
                  </tr>
                  <tr>
                     <td
                        style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding: 10px;">
                        <table style="width: 100%;">
                           <tr>
                              <td style="width: 40%;vertical-align: middle;">
                                 <input type="radio" class="custom-control-input" id="customRadio4" name="example1" {{ (isset($report['pre_employment_physical_assessment']) && $report['return_to_work_or_loa'] == 16) ? 'checked' : '' }}>
                                 <label class="custom-control-label" for="customRadio4">Pre-Employment Physical
                                    Assessment</label>
                              </td>
                              <td style="width: 25%;">
                                 <input type="radio" class="custom-control-input" id="customRadio3" name="example1" {{ (isset($report['annual_assessment']) && $report['return_to_work_or_loa'] == 17) ? 'checked' : '' }}>
                                 <label class="custom-control-label" for="customRadio3">Annual Assessment
                                 </label>
                              </td>
                              <td style="width: 25%;">
                                 <input type="radio" class="custom-control-input" id="customRadio2" name="example1" {{ (isset($report['return_to_work_or_loa']) && $report['return_to_work_or_loa'] == 18) ? 'checked' : '' }}>
                                 <label class="custom-control-label" for="customRadio2">Return to Work / LOA
                                 </label>
                              </td>
                              <td style="width: 10%;">
                                 <input type="radio" class="custom-control-input" id="customRadio1" name="example1" {{ (isset($report['other']) && $report['return_to_work_or_loa'] == 19) ? 'checked' : '' }}>
                                 <label class="custom-control-label" for="customRadio1">Other
                                 </label>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <h2
                           style="padding: 30px 10px;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                           AUTHORIZATION TO RELEASE INFORMATION</h2>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <p style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;">I hereby
                           authorize <input type="text" name="" value="{{ $report['name'] ?? '' }}"
                              style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">
                           to release all health information about me to Doral Health Connect.</p>
                     </td>
                  </tr>
                  <tr>
                     <td style="justify-content:flex-end">
                        <p
                           style="font-weight: bold;font-size: 19px;text-align: left;box-shadow: none;margin-top: 25px;">
                           Employee
                           Signature <input type="" name=""
                              style="width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;">
                        </p>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <table style="width:100%;margin-top: 15px;">
                           <tr>
                              <td
                                 style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;">
                                 <h2
                                    style="padding: 30px 10px 30px 10px;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                                    DEMOGRAPHIC INFORMATION</h2>
                                 <table style="width: 100%;">
                                    <tr>
                                       <td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 15px">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">First
                                             Name</label>
                                          <input type="text" placeholder="Head/ENT:" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['first_name'] ?? '' }}">
                                       </td>
                                       <td style="border-bottom: 1px solid #e4e4e4;">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">Last
                                             Name</label>
                                          <input type="text" placeholder="Eyes:" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['last_name'] ?? '' }}">
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="border-bottom: 1px solid #e4e4e4;padding-top: 15px;padding-bottom: 15px;">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">Date</label>
                                          <input type="text" placeholder="03/04/2021" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['dob'] ?? '' }}">
                                       </td>
                                       <td style="border-bottom: 1px solid #e4e4e4;">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">Email</label>
                                          <input type="text" placeholder="" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['email'] ?? '' }}">
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="border-bottom: 1px solid #e4e4e4;padding-top: 15px">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">Gender</label>
                                          <input type="text" placeholder="Gender" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['gender'] == 1 ? 'Male' : 'Female' }}">
                                       </td>
                                       <td style="border-bottom: 1px solid #e4e4e4;padding-bottom: 15px;">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px;">Marital
                                             Status</label>
                                          <input type="text" placeholder="" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['marital_status'] ?? '' }}">
                                       </td>
                                    </tr>
                                    <tr>
                                       <td style="padding-top: 15px;">
                                          <label style="font-weight: 500;color: #495057;font-size: 16px">SSN
                                             Number</label>
                                          <input type="text" placeholder="" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['ssn'] ?? '' }}">
                                       </td>
                                       <td>
                                          <label
                                             style="font-weight: 500;color: #495057;font-size: 16px;">Address</label>
                                          <input type="text" placeholder="Address" name=""
                                             style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                             value="{{ $report['address'] ?? '' }}">
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
                        <h2
                           style="padding: 30px 10px;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                           DEMOGRAPHIC INFORMATION</h2>
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
                        <table style="width: 100%;margin-top: 50px;">
                           <tr>
                              <td colspan="3" style="padding: 0;
                              margin-bottom: 0;
                              background-color: rgb(248 248 248);
                              border-bottom: 1px solid rgba(0,0,0,.125);">
                                 <h1
                                    style="font-weight: bold;color: #006c76;justify-content: space-between;width: 100%;margin: 0px;padding: 15px;font-size: 18px;">
                                    PHYSICAN CONDITION</h1>
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Head/ENT:</label>
                                 <input type="text" placeholder="Head/ENT:" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['head_ent'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Eyes:</label>
                                 <input type="text" placeholder="Eyes:" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['eyes'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Neck:</label>
                                 <input type="text" placeholder="Neck:" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['neck'] ?? '' }}">
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Breats:</label>
                                 <input type="text" placeholder="Breats" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['breats'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Lungs:</label>
                                 <input type="text" placeholder="Lungs" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['lungs'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Cardiovascular:</label>
                                 <input type="text" placeholder="Cardiovascular" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['cardiovascular'] ?? '' }}">
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label
                                    style="font-weight: 500;color: #495057;font-size: 16px;">Muscular/Skeletal:</label>
                                 <input type="text" placeholder="Muscular/Skeletal" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['muscular_skeletal'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Abdomen:</label>
                                 <input type="text" placeholder="Abdomen" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['abdomen'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 0 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Genitourinary:</label>
                                 <input type="text" placeholder="Genitourinary" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['genitourinary'] ?? '' }}">
                              </td>
                           </tr>
                           <tr>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 15px 15px;">
                                 <label style="font-weight: 500;color: #495057;font-size: 16px;">Neurological:</label>
                                 <input type="text" placeholder="Neurological" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1.2rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['neurological'] ?? '' }}">
                              </td>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 15px 15px;">
                              </td>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px 15px 15px 15px;">
                              </td>
                           </tr>
                        </table>
                        <table style="width: 100%;margin-top: 10px;">
                           <tr>
                              <td colspan="4" style="padding: 0;
                              margin-bottom: 0;
                              background-color: rgb(248 248 248);
                              border-bottom: 1px solid rgba(0,0,0,.125);">
                                 <h1
                                    style="font-weight: bold;color: #006c76;justify-content: space-between;width: 100%;margin: 0px;padding: 15px;font-size: 18px;">
                                    EXPERIENCING ANY OF THE SYMPTOMS BELOW?</h1>
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="chkPassport">
                                    <input type="checkbox" {{ isset($report['weakness_checked']) ? 'checked' : '' }}>
                                    Weakness
                                 </label>
                                 <input type="text" placeholder="Weakness" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['weakness_comment'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="Fatigue">
                                    <input type="checkbox" {{ isset($report['fatigue_checked']) ? 'checked' : '' }}>
                                    Fatigue
                                 </label>
                                 <input type="text" placeholder="Fatigue" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['fatigue_comment'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="LackofAppetie">
                                    <input type="checkbox" {{ isset($report['lack_of_appetie_checked']) ? 'checked' : '' }}>
                                    Lack of Appetie
                                 </label>
                                 <input type="text" placeholder="Lack of Appetie" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['lack_of_appetie_comment'] ?? '' }}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="chkPassport">
                                    <input type="checkbox" {{ isset($report['weight_loss_checked']) ? 'checked' : '' }}>
                                    Weight Loss
                                 </label>
                                 <input type="text" placeholder="Weight Loss" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['weight_loss_comment'] ?? '' }}">
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="ChestPains">
                                    <input type="checkbox" {{ isset($report['chest_pains_checked']) ? 'checked' : '' }}>
                                    Chest Pains
                                 </label>
                                 <input type="text" placeholder="Chest Pains" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['chest_pains_comment'] ?? ''}}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="Fever">
                                    <input type="checkbox" {{ $report['fever_checked'] ?? 'checked'}}>
                                    Fever
                                 </label>
                                 <input type="text" placeholder="Fever" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['fever_comment'] ?? ''}}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="PersistentCough">
                                    <input type="checkbox" {{ $report['persistent_cough_checked'] ?? 'checked'}}>
                                    Persistent Cough
                                 </label>
                                 <input type="text" placeholder="Persistent Cough" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['persistent_cough_comment'] ?? ''}}">
                              </td>
                              <td
                                 style="background: rgba(0, 108, 118, 0.08);padding: 15px;border-bottom: 1px solid #e4e4e4;">
                                 <label for="NightSweats">
                                    <input type="checkbox" {{ $report['night_sweats_checked'] ?? 'checked'}}>
                                    Night Sweats
                                 </label>
                                 <input type="text" placeholder="Night Sweats" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['night_sweats_comment'] ?? ''}}">
                              </td>
                           </tr>
                           <tr>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px;">
                                 <label for="ShortnessofBreath">
                                    <input type="checkbox" {{ $report['shortness_of_breath_checked'] ?? 'checked'}}>
                                    Shortness of Breath
                                 </label>
                                 <input type="text" placeholder="Shortness of Breath" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['shortness_of_breath_comment'] ?? ''}}">
                              </td>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px;">
                                 <label for="Blood-StreakedSputum">
                                    <input type="checkbox" {{ $report['blood_streaked_sputum_checked'] ?? 'checked'}}>
                                    Blood-Streaked Sputum
                                 </label>
                                 <input type="text" placeholder="Blood-Streaked Sputum" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['blood_streaked_sputum_comment'] ?? ''}}">
                              </td>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px;">
                              </td>
                              <td style="background: rgba(0, 108, 118, 0.08);padding: 15px;">
                              </td>
                           </tr>
                        </table>
                        <table style="width: 100%;">
                           <tr>
                              <td>
                                 <h2
                                    style="padding: 30px 10px;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                                    EMPLOYEE PHYSICAL EXAMINATION REPORT <br> LABORATORY RESULYS (ALL LAB REPORTS AND
                                    RESULTS MUST BE ATTACHED)</h2>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table style="width: 100%;border: 1px solid #a5a5a5;">
                                    <tr>
                                       <th
                                          style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 15px 15px 15px;width: 2%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                          #</th>
                                       <th style="width: 20%;">
                                          <h1
                                             style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                             Test</h1>
                                       </th>
                                       <th style="width: 20%;">
                                          <h1
                                             style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                             Date Performed</h1>
                                       </th>
                                       <th style="width: 20%;">
                                          <h1
                                             style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                             Expiry Date</h1>
                                       </th>
                                       <th style="width: 20%;">
                                          <h1
                                             style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                             Results</h1>
                                       </th>
                                       <th style="width: 18%;">
                                          <h1
                                             style="font-weight: 800;font-size: 16px;color: #000;padding: 15px 0 15px 0;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                             LAB Value</h1>
                                       </th>
                                    </tr>
                                    <tr style="background: #f8f8f8;">
                                       <td
                                          style="width: 2%;text-align: left;padding: 15px;border-bottom: 1px solid #a5a5a5;">
                                          1</td>
                                       <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">#</td>
                                       <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                          03/04/2014</td>
                                       <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                          03/04/2014</td>
                                       <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">Immune
                                       </td>
                                       <td style="width: 18%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                          Positive</td>
                                    </tr>
                                    <tr style="background: #fff;">
                                       <td style="width: 2%;text-align: left;padding: 15px;">2</td>
                                       <td style="width: 20%;text-align: left;">#</td>
                                       <td style="width: 20%;text-align: left;">03/04/2014</td>
                                       <td style="width: 20%;text-align: left;border-bottom: 1px solid #a5a5a5;">
                                          03/04/2014</td>
                                       <td style="width: 20%;text-align: left;">Immune</td>
                                       <td style="width: 18%;text-align: left;">Positive</td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                        <table
                           style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;margin-top: 50px;">
                           <tr>
                              <td
                                 style="background: #fff;padding: 15px;border-bottom: 15px solid rgba(0, 108, 118, 0.08);">
                                 <label
                                    style="justify-content: flex-start;align-items: flex-start;"><input
                                       type="checkbox" style="margin-right: 15px;" {{ isset($report['checkbox_one']) ? 'checked' : '' }}>This individual is
                                    free from any health
                                    impairment that is a potential risk to the patient or another employee of which may
                                    interfere with the performance of his/her duties including the habituation or
                                    addiction to drugs or alcohol.
                                 </label>
                              </td>
                           </tr>
                           <tr>
                              <td
                                 style="background: #fff;padding: 15px;border-bottom: 15px solid rgba(0, 108, 118, 0.08);">
                                 <label
                                    style="justify-content: flex-start;align-items: flex-start;"><input
                                       type="checkbox" style="margin-right: 15px;" {{ isset($report['checkbox_two']) ? 'checked' : '' }}>This individual is
                                    free from any health
                                    impairment that is a potential risk to the patient or another employee of which may
                                    interfere with the performance of his/her duties including the habituation or
                                    addiction to drugs or alcohol.
                                 </label>
                              </td>
                           </tr>
                           <tr>
                              <td style="background: #fff;padding: 15px;">
                                 <label
                                    style="justify-content: flex-start;align-items: flex-start;"><input
                                       type="checkbox" style="margin-right: 15px;" {{ isset($report['checkbox_three']) ? 'checked' : '' }}>This individual is
                                    free from any health
                                    impairment that is a potential risk to the patient or another employee of which may
                                    interfere with the performance of his/her duties including the habituation or
                                    addiction to drugs or alcohol.
                                 </label>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <h2
                           style="padding: 30px 10px;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                           PHYSICAL DETAILS
                        </h2>
                        <table style="width: 100%;">
                           <tr>
                              <td>
                                 <input type="text" placeholder="David Lipschitz" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['physician_name'] ?? '' }}">
                              </td>
                              <td>
                                 <input type="text" placeholder="ABCD12345" name=""
                                    style="width: 100%;padding: .375rem 0;font-size: 1rem;line-height: 1.5;color: #006C76;background: none!important;;background-clip: padding-box;border: 1px solid transparent;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;font-weight: 600;outline: none;"
                                    value="{{ $report['physician_license_no'] ?? '' }}">
                              </td>
                           </tr>
                        </table>
                        <table
                           style="width: 100%; background-color: rgba(0, 108, 118, 0.08);border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:15px;margin-top:10px;">
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
                     </td>
                  </tr>
               </table>
               <!-- Body Section End Here -->
            </td>
         </tr>
      </tbody>
   </table>
</body>
</html>