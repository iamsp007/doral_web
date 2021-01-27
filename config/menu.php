<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'clinician','route'=>'clinician','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'chart-sb.svg',
            'icon_hover'=>'chart-sb-select.svg',
            'icon_title'=>'Patient Chart',
            'menu'=>[
                [
                    'name'=>'New Patients',
                    'url'=>env('APP_URL').'clinician/new-patient-list',
                    'route'=>'clinician/new-patient-list','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Services',
                ],
                [
                    'name'=>'Patient Lists',
                    'url'=>env('APP_URL').'clinician/patient-list',
                    'route'=>'clinician/patient-list','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                ]
            ]
        ],
//        ['name'=>'Add Patient','url'=>env('APP_URL').'referral/add-patient','route'=>'referral/add-patient','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient'],
        [
            'name'=>'Appointment',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'appointments-sb.svg',
            'icon_hover'=>'appointments-sb-select.svg',
            'icon_title'=>'Appointments',
            'menu'=>[
                [
                    'name'=>'Upcoming Appointments',
                    'url'=>env('APP_URL').'clinician/scheduled-appointment',
                    'route'=>'clinician/scheduled-appointment','icon'=>'appointment-selected-sb.svg','icon_hover'=>'appointment-sb.svg','icon_title'=>'Services',
                ],
                [
                    'name'=>'Cancelled Appointments',
                    'url'=>env('APP_URL').'clinician/cancelled-appointment',
                    'route'=>'clinician/cancelled-appointment','icon'=>'appointment-sb.svg','icon_hover'=>'appointment-sb.svg','icon_title'=>'Services',
                ]
            ]
        ],
        ['name'=>'RoadL Request','url'=>env('APP_URL').'clinician/roadl','route'=>'clinician/roadl','icon'=>'Request_RoadL.svg','icon_hover'=>'Request_RoadL.svg',
            'icon_title'=>'RoadL Request'],
        [
            'name'=>'Requests',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'requests-sb.svg',
            'icon_hover'=>'requests-sb-select.svg',
            'icon_title'=>'Request Section',
            'menu'=>[
                [
                    'name'=>'Clinical Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Clinical Requests',

                ],
                [
                    'name'=>'Technical Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Technical Requests',
                ]
            ]
        ]
    ],
    'referral'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'referral/dashboard','route'=>'referral/dashboard','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
//        ['name'=>'VBC','url'=>env('APP_URL').'referral/vbc','route'=>'referral/vbc','icon'=>'vbc-selected-sb.svg','icon_hover'=>'vbc-sb.svg'],
//        ['name'=>'MD Order','url'=>env('APP_URL').'referral/md-order','route'=>'referral/md-order','icon'=>'md-order-selected-sb.svg','icon_hover'=>'md-order-sb.svg'],
//        ['name'=>'Occupational Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health','icon'=>'occupational-selected-sb.svg','icon_hover'=>'occupational-sb.svg'],
//        ['name'=>'Tele Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health'],
        [
            'name'=>'Services',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'service-sb.svg',
            'icon_hover'=>'service-sb-select.svg',
            'icon_title'=>'Services',
            'menu'=>[
                [
                    'name'=>'VBC',
                    'url'=>env('APP_URL').'referral/vbc',
                    'route'=>'referral/vbc',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'MD Order',
                    'url'=>env('APP_URL').'referral/md-order',
                    'route'=>'referral/md-order',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Occupational Health',
                    'url'=>env('APP_URL').'referral/occupational-health',
                    'route'=>'referral/occupational-health',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
//        ['name'=>'Add Patient','url'=>env('APP_URL').'referral/add-patient','route'=>'referral/add-patient','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient']
    ],
    'admin'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/dashboard','route'=>'admin/dashboard','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
//        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/roles','route'=>'admin/roles','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg'],
//        ['name'=>'Dashboard','url'=>env('APP_URL').'admin/employee','route'=>'admin/employee','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg'],
        [
            'name'=>'Referral Section',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'referral-sb.svg',
            'icon_hover'=>'referral-sb-select.svg',
            'icon_title'=>'Referral Section',
            'menu'=>[
                [
                    'name'=>'New Registered Referral',
                    'url'=>env('APP_URL').'admin/referral-approval',
                    'route'=>'admin/referral-approval',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Activated Referral',
                    'url'=>env('APP_URL').'admin/referral-active',
                    'route'=>'admin/referral-active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Rejected Referral',
                    'url'=>env('APP_URL').'admin/referral-rejected',
                    'route'=>'admin/referral-rejected',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        [
            'name'=>'Clinician Section',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'clinician-sb.svg',
            'icon_hover'=>'clinician-sb-select.svg',
            'icon_title'=>'Clinician Section',
            'menu'=>[
                [
                    'name'=>'New Registered Clinician',
                    'url'=>env('APP_URL').'admin/referral-approval',
                    'route'=>'admin/referral-approval',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Activate Clinician',
                    'url'=>env('APP_URL').'admin/referral-active',
                    'route'=>'admin/referral-active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Rejected Clinician',
                    'url'=>env('APP_URL').'admin/referral-rejected',
                    'route'=>'admin/referral-rejected',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        [
            'name'=>'Employees Section',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'employee-sb.svg',
            'icon_hover'=>'employee-sb-select.svg',
            'icon_title'=>'Employees Section',
            'menu'=>[
                [
                    'name'=>'Add New Employee',
                    'url'=>env('APP_URL').'admin/employee',
                    'route'=>'admin/employee',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Add Employee'
                ],
                [
                    'name'=>'Employees',
                    'url'=>env('APP_URL').'admin/referral-active',
                    'route'=>'admin/referral-active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Employees'
                ]
            ]
        ]
    ],
    'supervisor'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'supervisor','route'=>'supervisor','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'chart-sb.svg',
            'icon_hover'=>'chart-sb-select.svg',
            'icon_title'=>'Patient Chart',
            'menu'=>[
                [
                    'name'=>'Assign New Patients',
                    'url'=>env('APP_URL').'supervisor/patients',
                    'route'=>'supervisor/patients','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Patients',
                ],
                [
                    'name'=>'Assigned Patients',
                    'url'=>env('APP_URL').'supervisor/assigned-patients',
                    'route'=>'co-ordinator/new-patient-list-show','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'New Patients',
                ],
                [
                    'name'=>'Patients',
                    'url'=>env('APP_URL').'co-ordinator/patient-list-show',
                    'route'=>'co-ordinator/patient-list-show','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Patient Lists',
                ]
            ]
        ],
    ],
    'co-ordinator'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'co-ordinator','route'=>'co-ordinator','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
        [
            'name'=>'Patient Chart',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'chart-sb.svg',
            'icon_hover'=>'chart-sb-select.svg',
            'icon_title'=>'Patient Chart',
            'menu'=>[
                [
                    'name'=>'New Patients',
                    'url'=>env('APP_URL').'co-ordinator/new-patient-list-show',
                    'route'=>'co-ordinator/new-patient-list-show','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'New Patients',
                ],
                [
                    'name'=>'Patients',
                    'url'=>env('APP_URL').'co-ordinator/patient-list-show',
                    'route'=>'co-ordinator/patient-list-show','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Patient Lists',
                ]
            ]
        ],
    ],
    'partner'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'partner','route'=>'partner','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
    ],
];
