@extends('emails.layouts.app')
@section('content')
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
       <!-- === PRE HEADER SECTION=== -->  
      <tbody><tr>
        <td align="center" valign="top" bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="hc_main_table" style="table-layout:fixed;">
            <tbody><tr>
              <td style="line-height:0px; font-size:0px;" width="600" class="hc_hide" bgcolor="#ffffff "><img src="./UPDATE_files/spacer.gif" height="1" width="600" style="max-height:1px; min-height:1px; display:block; width:600px; min-width:600px;" border="0" alt=""></td>
            </tr>
       </tbody></table>
        </td>
      </tr>
      <!-- === //PRE HEADER SECTION=== -->  
      <!-- === BODY === -->  
      <tr>
        <td align="center" valign="top" bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="hc_main_table" style="table-layout:fixed;">
            <!-- === BANNER SECTION === -->
            <tbody><tr>
              <td height="10" class="hc_height" style="line-height:0px; font-size:0px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="{{ asset('assets/img/banner.png') }}" class="hc_banner" width="369" height="246" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" alt="LoGo Here"></a></td>
            </tr>
            <!-- === //BANNER SECTION === -->
            <!-- === CONTENT SECTION === -->
            <tr>
              <td valign="top" class="hc_aside">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
                    <td align="center" class="hc_txt_20" style="font-family:Montserrat, Arial, sans-serif; font-size:24px; font-weight:700; line-height:26px; color:#24272A;">Thank you for Registration</td>
                  </tr>
                  <tr>
                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">Thank you for Registration with DORAL HEALTH CONNECT you will receive your password in your email. But you will be log-in once approved by ADMINISTRATOR, Please be patient till them.
                    </td>
                  </tr>
                  <tr>
                    <td height="30" class="hc_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" align="center">
                      <table width="280" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tbody><tr>     
                            <td valign="middle" align="center" height="35" bgcolor="#006C76" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; font-weight:700; color:#ffffff;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                            <a href="{{ $details['href'] }}" target="_blank" style="text-decoration:none; color:#ffffff; display:block; line-height:45px;">
                                Verify Your Email Address</a></td>
                      </tr>
                      </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" class="hc_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                      Login Url : <a href="{{ $details['login_url'] }}" target="_blank" style="color: #006C76;text-decoration: underline;">{{ $details['login_url'] }}</a>
                    </td>
                  </tr>
                  <tr>
                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                      Email ID : <span style="color: #006C76;">{{ $details['email'] }}</span> &nbsp; &nbsp; <span class="hc_block"></span>
                    </td>
                  </tr>
                  <tr>
                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:18px; line-height:22px; font-weight: 700; color:#24272A;">
                          Password : <span style="color: #006C76;">{{ $details['password'] }}</span>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" class="hc_height">&nbsp;</td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
            <!-- === //CONTENT SECTION === -->
          </tbody></table>
        </td>
      </tr>
      <!-- === BODY === --> 
    </tbody></table>
    <div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
@endsection
