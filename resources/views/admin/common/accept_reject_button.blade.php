@if($status === 'pending' || $status == '')
    @unlessrole('supervisor')
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-green shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
        @if($status == '')
            <button type="button" onclick="doaction('roadL')" class="btn w-600" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"><img src="https://app.doralhealthconnect.com/assets/img/icons/Request_RoadL.eml" alt="RoadL Request" class="icon_90 selected"><span></span></button>
        @endif
    @else
        @if (isset($url) && (str_contains($url, 'patients'))) 
            <button type="button" onclick="doaction('assignClinician')" class="btn btn-danger text-capitalize btn--sm" style="background: #006c76; color: #fff">Assign Clinician</button>
        @endif
    @endif
@elseif($status === 'active')
    <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
@elseif($status === 'rejected')
    <button type="button" onclick="doaction('1')" class="btn btn-primary btn-green shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
@endif
