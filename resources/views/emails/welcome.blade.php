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
                                                <td align="center" class="hc_txt_20" style="font-family:Montserrat, Arial, sans-serif; font-size:24px; font-weight:700; line-height:26px; color:#24272A;">Hi {{ $details['name'] }},</td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">We're excited to have you started. First you need to confirm your account.Just press the button below. </td>
                                            </tr>
                                            <tr>
                                                <td height="30" class="hc_height">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="top" align="center">
                                                    <table width="280" border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                            <tr>     
                                                                <td valign="middle" align="center" height="35" bgcolor="#006C76" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; font-weight:700; color:#ffffff;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                                                    <a href="{{ $details['href'] }}" target="_blank" style="text-decoration:none; color:#ffffff; display:block; line-height:45px;">Confirm Account</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">Thank you for Registering with DORAL HEALTH CONNECT. You will get the login details in the mail after receiving approval from the admin.  Please be patient till the admin approved your account.</td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">If you have any questions, just reply to this email we're always happy to help out.</td>
                                            </tr>
                                            <tr>
                                                <td height="30" class="hc_height">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">Thanks,</td>
                                            </tr>
                                            <tr>
                                                <td align="" class="hc_txt_14" style="font-family:Montserrat, Arial, sans-serif; font-size:16px; line-height:22px; font-weight: 400; color:#707070;">The Doral Team.</td>
                                            </tr>
                                            <tr>
                                                <td height="30" class="hc_height">&nbsp;</td>
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
