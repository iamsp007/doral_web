<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'clinician','route'=>'clinician','icon'=>'dashboard-sb.svg'],
        ['name'=>'Patient List','url'=>env('APP_URL').'clinician/patient-list','route'=>'clinician/patient-list','icon'=>'dashboard-sb.svg'],
        ['name'=>'New Patient List','url'=>env('APP_URL').'clinician/new-patient-list','route'=>'clinician/new-patient-list','icon'=>'dashboard-sb.svg'],
        [
            'name'=>'Appointment',
            'url'=>'appointment-request',
            'route'=>'clinician/scheduled-appointment','icon'=>'dashboard-sb.svg',
            'menu'=>[
                [
                    'name'=>'Schedule',
                    'url'=>env('APP_URL').'clinician/scheduled-appointment',
                    'route'=>'clinician/scheduled-appointment','icon'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Cancelled',
                    'url'=>env('APP_URL').'clinician/cancelled-appointment',
                    'route'=>'clinician/cancelled-appointment','icon'=>'dashboard-sb.svg'
                ]
            ]
        ],
        [
            'name'=>'Requests',
            'url'=>'roadl-request',
            'route'=>'clinician/roadl',
            'icon'=>'dashboard-sb.svg',
            'menu'=>[
                [
                    'name'=>'RoadL Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl','icon'=>'dashboard-sb.svg'
                ],
                [
                    'name'=>'Reschedule Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl',
                    'icon'=>'dashboard-sb.svg'
                ]
            ]
        ]
    ],
    'referral'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'referral/dashboard','route'=>'referral/dashboard','icon'=>'dashboard-sb.svg'],
        ['name'=>'VBC','url'=>env('APP_URL').'referral/vbc','route'=>'referral/vbc','icon'=>'dashboard-sb.svg'],
        ['name'=>'MD Order','url'=>env('APP_URL').'referral/md-order','route'=>'referral/md-order','icon'=>'dashboard-sb.svg'],
        ['name'=>'Occupational Physical','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health','icon'=>'dashboard-sb.svg'],
//        ['name'=>'Tele Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health'],
    ],
    'admin'=>[],
    'supervisor'=>[],
    'co-ordinator'=>[],
];
