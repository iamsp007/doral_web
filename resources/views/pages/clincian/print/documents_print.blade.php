<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Caregiver Enrollment Form</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-size: 11px;
            }
            @page {
                margin: 15px;
            }

            table,
            tr,
            td {
                border: 0;
                margin: 0;
                padding: 0; /* Apply cell padding */
                border-collapse: collapse;
                border-spacing: 0; /* Apply cell spacing */
            }
            table {
                width: 100%;
                border: 0;
            }
            td,
            th {
                text-align: left;
                padding: 3px 5px;
                vertical-align: top;
            }
            img {
                display: inline-block;
                vertical-align: sub;
            }

            ul,
            ol {
                margin: 10px;
                padding: 0;
            }
            h1 {
                font-size: 16px;
                padding-bottom: 5px;
                text-decoration: underline;
            }
            h2 {
                font-size: 14px;
            }
            p {
                text-align: justify;
                font-size: 11px;
            }

            .table-border,
            .table-border th,
            .table-border td {
                border: 1px solid #e0e0e0;
            }

            .border {
                border: 1px solid #e0e0e0;
            }

            .no-border {
                border: 0 !important;
            }

            .no-padding {
                padding: 0 !important;
            }

            .times-font {
                font-family: "Times New Roman", Times, serif;
            }

            .openSans {
                font-family: "Open Sans", sans-serif;
            }

            .text-left {
                text-align: left;
            }
            .text-center {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }
            .text-justify {
                text-align: justify;
            }
            .mr-top-10px {
                margin-top: 10px;
            }
            .mr-bottom-10px {
                margin-bottom: 10px;
            }
            .pad-left-10 {
                padding-left: 10px;
            }
            .pad-left-20 {
                padding-left: 20px;
            }
            .pad-bottom-5 {
                padding: 0 0 5px 0 !important;
            }
            .pad-bottom-10 {
                padding: 0 0 10px 0 !important;
            }
            .pad-bottom-15 {
                padding: 0 0 15px 0 !important;
            }
            .pad-bottom-20 {
                padding: 0 0 20px 0 !important;
            }
            .border-left {
                border-left: 1px solid #e0e0e0 !important;
            }
            .border-right {
                border-right: 1px solid #e0e0e0 !important;
            }
            .sign {
                display: inline-block;
                height: 50px;
                width: auto;
                vertical-align: top;
                border: 1px solid #ddd;
                margin-left: 5px;
            }
            .question {
                color: #0073de;
            }
            .page-title {
                display: block;
                width: 97%;
                font-size: 20px;
                font-weight: bold;
                color: #00569a;
                padding: 10px;
                text-align: center;
                border-bottom: 4px double #5fd7ff;
                margin-bottom: 5px;
            }
            .page-break {
                page-break-before: always;
            }
            .common-checkbox {
                color: #0073de;
            }
            /* img {
               display: inline-block; width: 7px; height: 10px; margin: 0 3px 0 0; padding: 0; vertical-align: top;
            } */
        </style>
    </head>
    <body
        style="
        margin: 0;
        padding: 10px;
        font-size: 11px;
        font-family: 'Open Sans', sans-serif;
        "
        >

        <table style="width: 100%; border: 1px solid #e0e0e0;" cellspacing="0" cellpadding="0">
            <!--Documents Start-->
            <tr>
                <td style="border: 0">
                    <table style="width: 100%; border-bottom: 5px solid #000" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="text-center" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px" />
                            </td>        
                            <!-- <td style="text-align: left; vertical-align: middle; width: 180px;">
                                <table>
                                    <tr>
                                        <td style="width: 28px; text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/home.png"
                                            style="width: 24px; height: 24px"
                                        />
                                        </td>
                                        <td>
                                            <h2 style="font-weight: normal; font-size: 11px;">
                                            Address :
                                            </h2>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <table>
                                    <tr>
                                        <td style="width: 20px; text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/phone.png"
                                            style="width: 18px; height: 18px"
                                        />
                                        </td>
                                        <td style="width: 100px; text-align: left; vertical-align: middle; font-size: 11px;">
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">
                                            <img
                                            src="./application/pdf-images/fax-machine.png"
                                            style="width: 18px; height: 18px"
                                        />
                                        </td>
                                        <td style="text-align: left; vertical-align: middle; font-size: 11px;">
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align: center; vertical-align: middle; width: 100%;">
                                <table>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; font-size: 12px;">
                                            Home Health Aide &nbsp;&nbsp;•&nbsp;&nbsp; Personal Care Aide
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; font-size: 14px; font-weight: bold;">
                                            Employee Personal Information
                                        </td>
                                    </tr>
                                </table>
                            </td> -->
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <table>
                                @php
                                    $malpractice_Insurance = ($users->document_Information) ? $users->document_Information['malpractice_Insurance'] : '';
                                    $ECFMG_Info = ($users->document_Information) ? $users->document_Information['ECFMG_Info'] : '';
                                @endphp
                                @if($malpractice_Insurance)
                                    <tr>
                                        <td><b class="page-title">Documentation Information</b></td>
                                    </tr>
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>Malpractice Insurance :</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>Carrier Name: </b>
                                                        @if($malpractice_Insurance['carrierName'] != 'Other')
                                                            {{ isset($malpractice_Insurance['carrierName']) ? $malpractice_Insurance['carrierName'] : '' }}
                                                        @else
                                                            {{ isset($malpractice_Insurance['otherCarrierName']) ? $malpractice_Insurance['otherCarrierName'] : '' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <b>Policy Number: </b>
                                                        {{ $malpractice_Insurance['policy_number'] }}
                                                    </td>
                                                    <td>
                                                        <b>Effective Date: </b>
                                                        {{ $malpractice_Insurance['effectiveDate'] }}
                                                    </td>
                                                    <td>
                                                        <b>Termination Date:</b>
                                                        {{ $malpractice_Insurance['terminationDate'] }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endif
                                @if($ECFMG_Info)
                                    <tr>
                                        <td class="no-border pad-bottom-5">
                                            <h1>ECFMG Information :</h1>
                                            <table class="table-border">
                                                <tr>
                                                    <td>
                                                        <b>ECFMG Id: </b>
                                                        {{ $ECFMG_Info['ECFMG_id'] }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @endif
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height: 10px"></td>
            </tr>
            <tr>
            <td style="border: 0">
                @php $i=1; @endphp
                @foreach ($users->documents as $document)
                    <table style="page-break-before: always !important;"
                                style="width: 97%; border-bottom: 5px double #5fd7ff" 
                                cellspacing="0"
                                cellpadding="0"
                                >
                                <tr>
                                    <td class="text-left" style="width: 100px; vertical-align: middle; padding-bottom: 10px;">
                                        <img src="{{ asset('assets/img/green_logo.jpg') }}" style="width: auto; height: 40px"/>
                                    </td>        
                                </tr>
                            </table>
                            <table>
                                 <tr>
                                    <td>
                                       <b <?php if ($i ==1) { ?> style="border-top: 0px !important;" <?php } ?> class="page-title">{{$i}}. {{$document->type_name}}</b>
                                    </td>
                                 </tr>
                                 <tr>
                                        <td class="no-border pad-bottom-10">
                                            <table>
                                                   
                                                 <tr>
                                                    <td
                                                       style="
                                                          border: 0;
                                                          padding: 10px;
                                                          text-align: left;
                                                          vertical-align: top;
                                                          padding-bottom: 15px;
                                                          border-bottom: 1px solid #000;
                                                       "
                                                    >
                                                       <img
                                                             src="{{ $document->file_url }}"
                                                             style="display: block; width: 97%; height: 500px;"
                                                          />
                                                    </td>
                                                    <br/>
                                                 </tr>
                                            </table>
                                        </td>
                                     </tr>
                            </table>
                        @php $i++; @endphp
                    @endforeach
            </td>
         </tr>
        <!--Documents End-->
        </table>
    </body>
</html>