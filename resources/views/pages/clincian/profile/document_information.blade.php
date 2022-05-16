<table width="100%">
 @php
        $malpractice_Insurance = ($users->document_Information) ? $users->document_Information['malpractice_Insurance'] : '';
        $ECFMG_Info = ($users->document_Information) ? $users->document_Information['ECFMG_Info'] : '';
    @endphp
    @if($malpractice_Insurance)
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Malpractice Insurance</h1>
        </td>
    </tr>
   
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Carrier Name: <span>{{ $malpractice_Insurance['carrierName'] }}
                            @if($malpractice_Insurance['carrierName'] != 'Other')
                                {{ isset($malpractice_Insurance['carrierName']) ? $malpractice_Insurance['carrierName'] : '' }}
                            @else
                                {{ isset($malpractice_Insurance['carrierName']) ? $malpractice_Insurance['otherCarrierName'] : '' }}
                            @endif
                        </span></p>
                    </td>
                    <td>
                        <p>Policy Number: <span>{{ $malpractice_Insurance['policy_number'] }}</span></p>
                    </td>
                    
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>Effective Date: <span>{{ $malpractice_Insurance['effectiveDate'] }}</span></p>
                    </td>
                    <td>
                        <p>Termination Date: <span>{{ $malpractice_Insurance['terminationDate'] }}</span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @endif
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">ECFMG Information</h1>
        </td>
    </tr>
  
    @if($ECFMG_Info)
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <p>ECFMG Id: <span>
                            {{ $ECFMG_Info['ECFMG_id'] }}
                        </span></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @endif
</table>
<!-- page 1 end-->
