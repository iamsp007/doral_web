@extends('emails.layouts.app')
@section('content')
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
    <tbody>
      <tr>
        <td align="center" valign="top" bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="hc_main_table" style="table-layout:fixed;">
            <tbody>
              <tr>
                <td style="line-height:0px; font-size:0px;" width="600" class="hc_hide" bgcolor="#ffffff "><img src="./UPDATE_files/spacer.gif" height="1" width="600" style="max-height:1px; min-height:1px; display:block; width:600px; min-width:600px;" border="0" alt=""></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="hc_main_table" style="table-layout:fixed;">
            <tbody>
              <tr>
                <td height="10" class="hc_height" style="line-height:0px; font-size:0px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{ asset('assets/img/banner.png') }}" class="hc_banner" width="369" height="246" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" alt="LoGo Here"></a></td>
              </tr>
              <tr>
                <td valign="top" class="hc_aside">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td align="center" class="hc_txt_20" style="font-family:Montserrat, Arial, sans-serif; font-size:24px; font-weight:700; line-height:26px; color:#24272A;">Hi {{ $details['name'] }}</td>
                      </tr>
                      <tr>
                        <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">
                        @if(isset($details['action']) && $details['action'] === 'CurrentCaregiverCheck')
                          Get Current Caregiver background process is complete!.
                        @else
                          Your patient import background process is complete!.
                        @endif
                        </td>
                      </tr>
                      <tr>
                        <td height="30" class="hc_height">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">
                          @if(isset($details['action']) && $details['action'] === 'CurrentCaregiverCheck')
                            {{ $details['message'] }}
                          @else
                            Thank you for choosing HHAExchange for the patient import process.
                          @endif
                       </td>
                      </tr>
                      <tr>
                        <td height="30" class="hc_height">&nbsp;</td>
                      </tr>
                      @if(isset($details['action']) && $details['action'] === 'CurrentCaregiverCheck')
                        <tr>
                          <td valign="top" class="hc_aside">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr>
                                  <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                                  Patient ID : <span style="color: #006C76;">{{ $details['data']['patient_id'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                                  Patient Name : <span style="color: #006C76;">{{ $details['data']['name'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                                  Phone : <span style="color: #006C76;">{{ $details['data']['phone'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="30" class="hc_height">&nbsp;</td>
                                </tr>
                                @if(isset($details['data']['start_time']))
                                  <tr>
                                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                                    Schedule Start Time : <span style="color: #006C76;">{{ $details['data']['start_time'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                      <td height="30" class="hc_height">&nbsp;</td>
                                  </tr>
                                  @endif
                                  @if(isset($details['data']['end_time']))
                                  <tr>
                                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                                    Schedule End Time : <span style="color: #006C76;">{{ $details['data']['end_time'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="30" class="hc_height">&nbsp;</td>
                                  </tr>
                                @endif
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      @else
                        <tr>
                          <td valign="top" align="center">
                            <table width="280" border="0" cellspacing="0" cellpadding="0" align="center">
                              <tbody>
                                <tr>     
                                  <td valign="middle" align="center" height="35" bgcolor="#006C76" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; font-weight:700; color:#ffffff;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                    Total users are imported into the system are: {{ $details['total'] }}
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      @endif
                      <tr>
                        <td height="30" class="hc_height">&nbsp;</td>
                      </tr>
                      <tr>
                          <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">Thanks,</td>
                      </tr>
                      <tr>
                          <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">The Doral Team.</td>
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
  <div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
@endsection
