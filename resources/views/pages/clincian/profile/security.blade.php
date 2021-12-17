<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Security:</h1>
    </td>
</tr>
<tr>
    <td>
        <p>Have you ever bonded? 
            <span>
                <input type="radio" name="bond" {{ ($users->security_detail && $users->security_detail['bond']) ? 'checked' : '' }} onclick="return false;">Yes
                <input type="radio" name="bond" {{ ($users->security_detail && $users->security_detail['bond']) ? '' : 'checked' }} }} onclick="return false;">No
            </span>
        </p>
    </td>
</tr>
@if(isset($users->security_detail['bond']) && $users->security_detail['bond'] == 'true')
<tr>
    <td>
        <p>If Yes, Explain:<span>{{ $users->security_detail ? $users->security_detail['bond_explain'] : '' }}</span></p>
    </td>
</tr>
@endif
<tr>
    <td>
        <p>Have you been convicted of a falcony within the last 5 years?     
            <span>
                <input type="radio" name="convict" {{ ($users->security_detail && $users->security_detail['convict']) ? 'checked' : '' }} onclick="return false;">Yes
                <input type="radio" name="convict" {{ ($users->security_detail && $users->security_detail['convict']) ? '' : 'checked' }} onclick="return false;">No
            </span>
        </p>
    </td>
</tr>
@if(isset($users->security_detail['convict']) && $users->security_detail['convict'] == 'true')
<tr>
    <td>
        <p>If so, explain (this will not necessarily exclude you from consideration):<span>{{ $users->security_detail ? $users->security_detail['convict_explain'] : '' }}</span></p>
    </td>
</tr>
@endif
