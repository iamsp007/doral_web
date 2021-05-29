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
                    'url'=>env('APP_URL').'patients/pending',
                    'route'=>'clinician/new-patient-list','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Services',
                ],
                // [
                //     'name'=>'Patient Lists',
                //     'url'=>env('APP_URL').'clinician/patient-list',
                //     'route'=>'clinician/patient-list','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                // ],
                [
                    'name'=>'Search Patient',
                    'url'=>env('APP_URL').'patients',
                    'route'=>'patients','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                ],
                // [
                //     'name'=>'Patient Lists',
                //     'url'=>env('APP_URL').'get-caregiver/active',
                //     'route'=>'get-caregiver/active','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                // ],
                [
                    'name'=>'Add Patient',
                    'url'=>env('APP_URL').'clinician/patient/create',
                    'route'=>'patient.create','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Add patient',
                ],
                // [
                //     'name'=>'Due Reports',
                //     'url'=>env('APP_URL').'get-due-detail',
                //     'route'=>'get-due-detail','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                // ]
            ]
        ],
        // ['name'=>'Patient Details Update','url'=>env('APP_URL').'get-patient-detail','route'=>'get-patient-detail','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Patient Details Update'],
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
//        [
//            'name'=>'Requests',
//            'url'=>'javascript:void(0)',
//            'route'=>'javascript:void(0)',
//            'icon'=>'requests-sb.svg',
//            'icon_hover'=>'requests-sb-select.svg',
//            'icon_title'=>'Request Section',
//            'menu'=>[
//                [
//                    'name'=>'Clinical Requests',
//                    'url'=>env('APP_URL').'clinician/roadl',
//                    'route'=>'clinician/roadl',
//                    'icon'=>'home-sb-select.svg',
//                    'icon_hover'=>'home-sb.svg',
//                    'icon_title'=>'Clinical Requests',
//
//                ],
//                [
//                    'name'=>'Technical Requests',
//                    'url'=>env('APP_URL').'clinician/roadl',
//                    'route'=>'clinician/roadl',
//                    'icon'=>'home-sb-select.svg',
//                    'icon_hover'=>'home-sb.svg',
//                    'icon_title'=>'Technical Requests',
//                ]
//            ]
//        ],
        [
            'name'=>'Reports',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'service-sb.svg',
            'icon_hover'=>'service-sb-select.svg',
            'icon_title'=>'Reports',
            'menu'=>[
                [
                    'name'=>'COVID-19',
                    'url'=>env('APP_URL').'clinician/covid-19',
                    'route'=>'clinician/covid-19','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'COVID-19',
                ],
            ]
        ],
        ['name'=>'Calendar','url'=>env('APP_URL').'clinician/calendar','route'=>'clinician/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],
    ],
    'referral'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'referral/dashboard','route'=>'referral/dashboard','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
        //['name'=>'VBC','url'=>env('APP_URL').'referral/vbc','route'=>'referral/vbc','icon'=>'vbc-selected-sb.svg','icon_hover'=>'vbc-sb.svg'],
        //['name'=>'MD Order','url'=>env('APP_URL').'referral/md-order','route'=>'referral/md-order','icon'=>'md-order-selected-sb.svg','icon_hover'=>'md-order-sb.svg'],
        //['name'=>'Occupational Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health','icon'=>'occupational-selected-sb.svg','icon_hover'=>'occupational-sb.svg'],
        //['name'=>'Tele Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health'],
        [
            'name'=>'Services',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'service-sb.svg',
            'icon_hover'=>'service-sb-select.svg',
            'icon_title'=>'Services',
            'menu' => [
                [
                    'name'=>'1',
                    'url'=>env('APP_URL').'referral/service/vbc',
                    'route'=>'referral/vbc',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'2',
                    'url'=>env('APP_URL').'referral/service/md-order',
                    'route'=>'referral/md-order',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'3',
                    'url'=>env('APP_URL').'referral/service/occupational-health',
                    'route'=>'referral/occupational-health',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'6',
                    'url'=>env('APP_URL').'referral/service/covid-19',
                    'route'=>'referral/covid-19',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        // ['name'=>'Add Patient','url'=>env('APP_URL').'add-patient','route'=>'add-patient','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient']
        ['name'=>'Add Patient','url'=>env('APP_URL').'referral/patient/create','route'=>'patient.create','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient'],
        ['name'=>'Calendar','url'=>env('APP_URL').'referral/calendar','route'=>'referral/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar']
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
                    'name'=>'Pending Referral',
                    'url'=>env('APP_URL').'admin/referral/pending',
                    'route'=>'admin/referral/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Active Referral',
                    'url'=>env('APP_URL').'admin/referral/active',
                    'route'=>'admin/referral/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Reject Referral',
                    'url'=>env('APP_URL').'admin/referral/rejected',
                    'route'=>'admin/referral/rejected',
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
                    'name'=>'Pending Clinician',
                    'url'=>env('APP_URL').'admin/clinician/pending',
                    'route'=>'admin/clinician/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Active Clinician',
                    'url'=>env('APP_URL').'admin/clinician/active',
                    'route'=>'admin/clinician/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Reject Clinician',
                    'url'=>env('APP_URL').'admin/clinician/rejected',
                    'route'=>'admin/clinician/rejected',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        [
            'name'=>'Partner Section',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'employee-sb.svg',
            'icon_hover'=>'employee-sb-select.svg',
            'icon_title'=>'Partner Section',
            'menu'=>[
                [
                    'name'=>'Pending Partner',
                    'url'=>env('APP_URL').'admin/partner/pending',
                    'route'=>'admin/partner/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Active Partner',
                    'url'=>env('APP_URL').'admin/partner/active',
                    'route'=>'admin/partner/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Reject Partner',
                    'url'=>env('APP_URL').'admin/partner/rejected',
                    'route'=>'admin/partner/rejected',
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
                    'url'=>env('APP_URL').'admin/referral/active',
                    'route'=>'admin/referral/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Employees'
                ]
            ]
        ],
        ['name'=>'Add Patient','url'=>env('APP_URL').'admin/patient/create','route'=>'patient.create','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient'],
        ['name'=>'Calendar','url'=>env('APP_URL').'admin/calendar','route'=>'admin/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],

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
        ['name'=>'Add Patient','url'=>env('APP_URL').'supervisor/patient/create','route'=>'patient.create','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient'],
        ['name'=>'Calendar','url'=>env('APP_URL').'supervisor/calendar','route'=>'supervisor/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],

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
        ['name'=>'Add Patient','url'=>env('APP_URL').'co-ordinator/patient/create','route'=>'patient.create','icon'=>'create-patient-sb-select.svg','icon_hover'=>'create-patient-sb.svg','icon_title'=>'Add Patient'],
        ['name'=>'Calendar','url'=>env('APP_URL').'co-ordinator/calendar','route'=>'co-ordinator/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],

    ],
    'partner'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'partner','route'=>'partner','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
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
                    'url'=>env('APP_URL').'partner/employee/create',
                    'route'=>'partner/employee/create',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Add Employee'
                ],
                [
                    'name'=>'Employees',
                    'url'=>env('APP_URL').'partner/employee',
                    'route'=>'partner/employee',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Employees'
                ],
                // [
                //     'name'=>'Pending Employee',
                //     'url'=>env('APP_URL').'partner/employee/pending',
                //     'route'=>'partner/employee/pending',
                //     'icon'=>'home-sb-select.svg',
                //     'icon_hover'=>'home-sb.svg',
                //     'icon_title'=>'Services'
                // ],
                // [
                //     'name'=>'Active Employee',
                //     'url'=>env('APP_URL').'partner/employee/active',
                //     'route'=>'partner/employee/active',
                //     'icon'=>'home-sb-select.svg',
                //     'icon_hover'=>'home-sb.svg',
                //     'icon_title'=>'Services'
                // ],
                // [
                //     'name'=>'Reject Employee',
                //     'url'=>env('APP_URL').'partner/employee/rejected',
                //     'route'=>'partner/employee/rejected',
                //     'icon'=>'home-sb-select.svg',
                //     'icon_hover'=>'home-sb.svg',
                //     'icon_title'=>'Services'
                // ]
            ],
            ['name'=>'Calendar','url'=>env('APP_URL').'partner/calendar','route'=>'partner/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],
        ],
        [
            'name'=>'Designation Section',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'designation.svg',
            'icon_hover'=>'designation.svg',
            'icon_title'=>'Designation Section',
            'menu'=>[
                [
                    'name'=>'Add New Designation',
                    'url'=>env('APP_URL').'partner/designation/create',
                    'route'=>'partner/designation/create',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Add Designation'
                ],
                [
                    'name'=>'Designation',
                    'url'=>env('APP_URL').'partner/designation',
                    'route'=>'partner/designation',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Designation'
                ]
            ],
            ['name'=>'Calendar','url'=>env('APP_URL').'partner/calendar','route'=>'partner/calendar','icon'=>'calendar-icon.svg','icon_hover'=>'calendar-icon.svg','icon_title'=>'Calendar'],
        ]
    ],
    
];
