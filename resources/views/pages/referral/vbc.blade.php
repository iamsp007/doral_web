@extends('layouts.referral.default')
@section('content')
<div class="app-vbc">
    <table id="vbc" class="table" style="width:100%">
        <thead>
            <tr>
                <th><input type="checkbox" class="selectall"/></th>
                <th>Patient Name</th>
                <th>Description</th>
                <th>Services</th>
                <th>Uploaded Date</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Airi Satou</td>
                <td>Curabitur dignissim tortor.</td>
                <td>VBC</td>
                <td>Sunday, 4 October 2020</td>
                <td width="22%"><span class="status-pending">Pending</span></td>
                <td width="8%"><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Alex Doe</td>
                <td>Curabitur dignissim tortor.</td>
                <td>VBC</td>
                <td>Sunday, 4 October 2020</td>
                <td><span class="status-rejected">Rejected</span></td>
                <td><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Angelica Ramos</td>
                <td>Donec commodo vel nisl mattis gravida.</td>
                <td>MD Order</td>
                <td>Tuesday, 10 September 2020</td>
                <td><span class="status-accepted">Accepted</span></td>
                <td><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Ashton Cox</td>
                <td>Leo tortor tristique tellus, ut vehicula.</td>
                <td>Employee Physical</td>
                <td>Friday, 28 March 2019</td>
                <td><span class="status-canceled">Canceled</span><a href="."
                        class="status-rescheduled">Rescheduled</a></td>
                <td><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Bradley Greer</td>
                <td>Metus venenatis, pellentesque nibh a.</td>
                <td>MD Order</td>
                <td>Friday, 28 December 2020</td>
                <td><span class="status-scheduled">Scheduled</span></td>
                <td><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Brenden Wagner</td>
                <td>Mauris molestie justo eu erat mollis.</td>
                <td>VBP</td>
                <td>Friday, 20 September 2020</td>
                <td><span class="status-oncall">On Call</span></td>
                <td><a href="javascript:void(0)"><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"/></td>
                <td class="text-green">Brielle Williamson</td>
                <td>estibulum interdum suscipit purus tincidunt.</td>
                <td>Employee Physical</td>
                <td>Monday, 12 January 2020</td>
                <td><span class="status-closed">Closed</span></td>
                <td>
                    <a href=""><img src="../assets/img/icons/delete-icon.svg"
                            class="action-delete" /></a>
                    <a href=""><img src="../assets/img/icons/download-icon.svg"
                            class="action-download" /></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop