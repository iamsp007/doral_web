<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Security:</h1>
    </td>
</tr>
<tr>
    <td>
        <p>Have you ever been bonded? 
            <span>
                <input type="radio" {{ ($users->security_detail && $users->security_detail['bond']) ? 'checked' : '' }}>Yes
                <input type="radio" {{ ($users->security_detail && $users->security_detail['bond']) ? '' : 'checked' }} }}>No
            </span>
        </p>
    </td>
</tr>
@if($users->security_detail['bond'])
<tr>
    <td>
        <p>If so, explain:<span>{{ $users->security_detail ? $users->security_detail['bond_explain'] : '' }}</span></p>
    </td>
</tr>
@endif
<tr>
    <td>
        <p>Have you been convicted of a falcony within the last 5 years?     
            <span>
                <input type="radio" {{ ($users->security_detail && $users->security_detail['convict']) ? 'checked' : '' }}>Yes
                <input type="radio" {{ ($users->security_detail && $users->security_detail['convict']) ? '' : 'checked' }}>No
            </span>
        </p>
    </td>
</tr>
@if($users->security_detail['convict'])
<tr>
    <td>
        <p>If so, explain (this will not necessarily exclude you from consideration:<span>{{ $users->security_detail ? $users->security_detail['convict_explain'] : '' }}</span></p>
    </td>
</tr>
@endif
