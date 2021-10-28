<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Military:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Have you served in the military?
                        <span>
                            <input type="checkbox" {{ isset($users->military_detail['isMilitary']) ? 'checked' : '' }}>Yes
                            <input type="checkbox"{{ isset($users->military_detail['isMilitary']) ? '' : 'checked' }}>No
                        </span>
                    </p>
                </td>
                <td>
                    <p>Branch: <span>{{ isset($users->military_detail['branch']) ? $users->military_detail['branch'] : '' }}</span></p>
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
                    <p>Served Served from:<span>{{ isset($users->military_detail['serve_start_date']) ? $users->military_detail['serve_start_date'] : '' }} to {{ isset($users->military_detail['serve_end_date']) ? $users->military_detail['serve_end_date'] : '' }}</span></p>
                </td>
                <td>
                    <p>Rank:<span></span></p>
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
                    <p>Do you have any military commitment, including National Guard service that would influence your work schedule?  
                        <span>
                            <input type="checkbox" {{ isset($users->military_detail['isCommited']) ? 'checked' : '' }}>Yes
                            <input type="checkbox" {{ isset($users->military_detail['isCommited']) ? '' : 'checked' }}>No
                        </span>
                    </p>
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
                    <p>If so, explain: <span>{{ isset($users->military_detail['isCommited_explain']) ? $users->military_detail['isCommited_explain'] : ''}}</span></p>
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
                    <p>Are you a Vietnam veteran?  
                        <span>
                            <input type="checkbox" {{ isset($users->military_detail['isVietnam']) ? 'checked' : '' }}>Yes
                            <input type="checkbox"{{ isset($users->military_detail['isVietnam']) ? '' : 'checked' }}>No
                        </span>
                    </p>
                </td> 
                <td>
                    <p>Are you a disabled veteran? 
                        <span>
                            <input type="checkbox" {{ isset($users->military_detail['isDisableVetran']) ? 'checked' : '' }}>Yes
                            <input type="checkbox" {{ isset($users->military_detail['isDisableVetran']) ? '' : 'checked' }}>No
                        </span>
                    </p>
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
                    <p>Are you a special disabled veteran?
                        <span>
                            <input type="checkbox" {{ isset($users->military_detail['isSpecialDisableVereran']) ? 'checked' : '' }}>Yes
                            <input type="checkbox" {{ isset($users->military_detail['isSpecialDisableVereran']) ? '' : 'checked' }}>No
                        </span>
                    </p>
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
                    <p style="white-space:normal">REASONABLE ACCOMMODATIONS: In the event you believe you will need reasonable accommodations to assist you inperforming your job,please contact your supervisor or<br> human resources coordinator.</p>
                </td> 
            </tr>
        </table>
    </td>
</tr>