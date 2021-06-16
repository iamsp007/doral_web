@if($status === 'pending' || $status == '')
    <button type="button" onclick="doaction('1')" class="btn btn-primary btn-green shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
    <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
@elseif($status === 'active')
    <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
@elseif($status === 'rejected')
    <button type="button" onclick="doaction('1')" class="btn btn-primary btn-green shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
@endif