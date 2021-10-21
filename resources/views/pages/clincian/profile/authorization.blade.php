<tr>
    <td>
        <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;color: #006C76;font-weight: 600;">Authorization:</h1>
    </td>
</tr>
<tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="myStyle">
            <tr>
                <td>
                    <p style="white-space:normal;">I certify that the facts contained in this application are true and complete to the best of my knowledge and understand that If employed, falsified statements on this<br> application will be grounds for dismissal.</p>
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
                    <p>Employee Signature:<span>
                        @if($users->signature_url)
                        <img src="{{ $users->signature_url }}" alt="sign"  style="max-width: 70px;">
                        @endif
                    </span></p>
                </td>
                <td>
                    <p>Date:<span>{{ ($users->user) ? viewDateFormat($users->user->created_at) : '' }}</span></p>
                </td>   
            </tr>
        </table>
    </td>
</tr>