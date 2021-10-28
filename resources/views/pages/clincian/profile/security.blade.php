<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Security:</h1>
    </td>
</tr>
<tr>
    <td>
        <p>Have you ever been bonded? 
            <span>
                <input type="checkbox" {{ ($users->security_detail && $users->security_detail['bond']) ? 'checked' : '' }}>Yes
                <input type="checkbox" {{ ($users->security_detail && $users->security_detail['bond']) ? '' : 'checked' }} }}>No
            </span>
        </p>
    </td>
</tr>
<tr>
    <td>
        <p>If so, explain:<span>{{ $users->security_detail ? $users->security_detail['bond_explain'] : '' }}</span></p>
    </td>
</tr>
<tr>
    <td>
        <p>Have you been convicted of a felony within the past 5 years?     
            <span>
                <input type="checkbox" {{ ($users->security_detail && $users->security_detail['convict']) ? 'checked' : '' }}>Yes
                <input type="checkbox" {{ ($users->security_detail && $users->security_detail['convict']) ? '' : 'checked' }}>No
            </span>
        </p>
    </td>
</tr>
<tr>
    <td>
        <p>If so, explain (this will not necessarily exclude you from consideration:<span>{{ $users->security_detail ? $users->security_detail['convict_explain'] : '' }}</span></p>
    </td>
</tr>