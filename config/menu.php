<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'clinician','route'=>'clinician','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'patient-selected-sb.svg',
            'icon_hover'=>'patient-sb.svg',
            'menu'=>[
                [
                    'name'=>'New Patients',
                    'url'=>env('APP_URL').'clinician/new-patient-list',
                    'route'=>'clinician/new-patient-list','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Patient Lists',
                    'url'=>env('APP_URL').'clinician/patient-list',
                    'route'=>'clinician/patient-list','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg'
                ]
            ]
        ],
        [
            'name'=>'Appointment',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)','icon'=>'appointment-selected-sb.svg','icon_hover'=>'appointment-sb.svg',
            'menu'=>[
                [
                    'name'=>'Schedule',
                    'url'=>env('APP_URL').'clinician/scheduled-appointment',
                    'route'=>'clinician/scheduled-appointment','icon'=>'appointment-selected-sb.svg','icon_hover'=>'appointment-sb.svg'
                ],
                [
                    'name'=>'Cancelled',
                    'url'=>env('APP_URL').'clinician/cancelled-appointment',
                    'route'=>'clinician/cancelled-appointment','icon'=>'appointment-sb.svg','icon_hover'=>'appointment-sb.svg'
                ]
            ]
        ],
        [
            'name'=>'Requests',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'request-selected-sb.svg',
            'icon_hover'=>'request-sb.svg',
            'menu'=>[
                [
                    'name'=>'RoadL Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl',
                    'icon'=>'dashboard-selected-sb.svg',
                    'icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Reschedule Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl',
                    'icon'=>'dashboard-selected-sb.svg',
                    'icon_hover'=>'dashboard-sb.svg'
                ]
            ]
        ]
    ],
    'referral'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'referral/dashboard','route'=>'referral/dashboard','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
        ['name'=>'VBC','url'=>env('APP_URL').'referral/vbc','route'=>'referral/vbc','icon'=>'vbc-selected-sb.svg','icon_hover'=>'vbc-sb.svg'],
        ['name'=>'MD Order','url'=>env('APP_URL').'referral/md-order','route'=>'referral/md-order','icon'=>'md-order-selected-sb.svg','icon_hover'=>'md-order-sb.svg'],
        ['name'=>'Occupational Physical','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health','icon'=>'occupational-selected-sb.svg','icon_hover'=>'occupational-sb.svg'],
//        ['name'=>'Tele Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health'],
    ],
    'admin'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/dashboard','route'=>'admin/dashboard','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
//        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/roles','route'=>'admin/roles','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
//        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/employee','route'=>'admin/employee','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
        [
            'name'=>'Referral Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'request-selected-sb.svg',
            'icon_hover'=>'request-sb.svg',
            'menu'=>[
                [
                    'name'=>'New Referral',
                    'url'=>env('APP_URL').'admin/referral-approval',
                    'route'=>'admin/referral-approval',
                    'icon'=>'dashboard-selected-sb.svg',
                    'icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Activated Referral',
                    'url'=>env('APP_URL').'admin/referral-active',
                    'route'=>'admin/referral-active',
                    'icon'=>'dashboard-selected-sb.svg',
                    'icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Rejected Referral',
                    'url'=>env('APP_URL').'admin/referral-rejected',
                    'route'=>'admin/referral-rejected',
                    'icon'=>'dashboard-selected-sb.svg',
                    'icon_hover'=>'dashboard-sb.svg'
                ]
            ]
        ]
    ],
    'supervisor'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'supervisor','route'=>'supervisor','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'patient-selected-sb.svg',
            'icon_hover'=>'patient-sb.svg',
            'menu'=>[
                [
                    'name'=>'New Patients',
                    'url'=>env('APP_URL').'supervisor/patients',
                    'route'=>'supervisor/patients','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Patient Lists',
                    'url'=>env('APP_URL').'supervisor/patients',
                    'route'=>'supervisor/patients','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg'
                ]
            ]
        ],
    ],
    'co-ordinator'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'co-ordinator','route'=>'co-ordinator','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'patient-selected-sb.svg',
            'icon_hover'=>'patient-sb.svg',
            'menu'=>[
                [
                    'name'=>'New Patients',
                    'url'=>env('APP_URL').'co-ordinator/new-patient-list-show',
                    'route'=>'co-ordinator/new-patient-list-show','icon'=>'dashboard-selected-sb.svg','icon_hover'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Patient Lists',
                    'url'=>env('APP_URL').'co-ordinator/patient-list-show',
                    'route'=>'co-ordinator/patient-list-show','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg'
                ]
            ]
        ],
    ],
];
