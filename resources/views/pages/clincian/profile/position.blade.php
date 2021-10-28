<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Position Desired:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p>Position: <span>{{ isset($users->employer_detail['position']) ? $users->employer_detail['position']['position'] : '' }}</span></p>
                </td>
                <td>
                    <p>Date you can start work: <span>{{ isset($users->employer_detail['position']) ? viewDateFormat($users->employer_detail['position']['date']) : '' }}</span></p>
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
                    <p>Are you currently employed? 
                        <span>
                            <input type="checkbox" {{ isset($users->employer_detail['position']['isCurrentEmployee']) ? 'checked' : '' }}>Yes
                            <input type="checkbox" {{ isset($users->employer_detail['position']['isCurrentEmployee']) ? '' : 'checked' }}>No
                        </span>
                    </p>
                </td>
                <td>
                    <p>If so, may we contact your current employer?
                        <span>
                            <input type="checkbox" {{ isset($users->employer_detail['position']['isAllowContactToEmployer']) ? 'checked' : '' }}>Yes
                            <input type="checkbox" {{ isset($users->employer_detail['position']['isAllowContactToEmployer']) ? '' : 'checked' }}>No
                        </span>
                    </p>
                </td>  
            </tr>
        </table>
    </td>
</tr>