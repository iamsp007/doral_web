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
                [
                    'name'=>'Search Patient',
                    'url'=>env('APP_URL').'patients',
                    'route'=>'patients','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Services',
                ],
                [
                    'name'=>'Due Report',
                    'url'=>env('APP_URL').'patients/due-reports',
                    'route'=>'get-due-detail','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Due Report',
                ],
                [
                    'name'=>'Assigned Patient',
                    'url'=>env('APP_URL').'patients/assigned-patients',
                    'route'=>'get-due-detail','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Due Report',
                ],
                [
                    'name'=>'Add Patient',
                    'url'=>env('APP_URL').'clinician/patient/create',
                    'route'=>'patient.create','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Add patient',
                ],
               
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
//            'icon_title'=>'Request Source',
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
        [
            'name'=>'Notifications',
            'url'=>env('APP_URL').'notification-history',
            'route'=>'notification-history','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Notifications',
        ]
    ],
    'referral'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'referral/dashboard','route'=>'referral/dashboard','icon'=>'home-sb-select.svg','icon_hover'=>'home-sb.svg','icon_title'=>'Dashboard'],
        //['name'=>'VBC','url'=>env('APP_URL').'referral/vbc','route'=>'referral/vbc','icon'=>'vbc-selected-sb.svg','icon_hover'=>'vbc-sb.svg'],
        //['name'=>'MD Order','url'=>env('APP_URL').'referral/md-order','route'=>'referral/md-order','icon'=>'md-order-selected-sb.svg','icon_hover'=>'md-order-sb.svg'],
        //['name'=>'Occupational Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health','icon'=>'occupational-selected-sb.svg','icon_hover'=>'occupational-sb.svg'],
        //['name'=>'Tele Health','url'=>env('APP_URL').'referral/occupational-health','route'=>'referral/occupational-health'],
        [
            'name'=>'Referral Services',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'service-sb.svg',
            'icon_hover'=>'service-sb-select.svg',
            'icon_title'=>'Services',
            'menu' => [
                [
                    'name'=>'VBC',
                    'url'=>env('APP_URL').'referral/service/vbc',
                    'route'=>'referral/vbc',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'MD Order',
                    'url'=>env('APP_URL').'referral/service/md-order',
                    'route'=>'referral/md-order',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Occupational Health',
                    'url'=>env('APP_URL').'referral/service/occupational-health',
                    'route'=>'referral/occupational-health',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Covid-19',
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
            'name'=>'Referral Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'referral-sb.svg',
            'icon_hover'=>'referral-sb-select.svg',
            'icon_title'=>'Referral Source',
            'menu'=>[
                [
                    'name'=>'Referral',
                    'url'=>env('APP_URL').'admin/referral/pending',
                    'route'=>'admin/referral/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Active',
                    'url'=>env('APP_URL').'admin/referral/active',
                    'route'=>'admin/referral/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Rejected',
                    'url'=>env('APP_URL').'admin/referral/rejected',
                    'route'=>'admin/referral/rejected',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        [
            'name'=>'Clinician Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'clinician-sb.svg',
            'icon_hover'=>'clinician-sb-select.svg',
            'icon_title'=>'Clinician Source',
            'menu'=>[
                [
                    'name'=>'Applicant',
                    'url'=>env('APP_URL').'admin/clinician/pending',
                    'route'=>'admin/clinician/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Employee',
                    'url'=>env('APP_URL').'admin/clinician/active',
                    'route'=>'admin/clinician/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
            ]
        ],
        ['name'=>'Credentialing','url'=>'http://20.106.235.102/applicant-users','route'=>'','icon'=>'history-selected-sb.svg','icon_hover'=> 'history-sb.svg','icon_title'=>'Credentialing'],
        [
            'name'=>'Partner Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'employee-sb.svg',
            'icon_hover'=>'employee-sb-select.svg',
            'icon_title'=>'Partner Source',
            'menu'=>[
                [
                    'name'=>'Partner',
                    'url'=>env('APP_URL').'admin/partner/pending',
                    'route'=>'admin/partner/pending',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Active',
                    'url'=>env('APP_URL').'admin/partner/active',
                    'route'=>'admin/partner/active',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ],
                [
                    'name'=>'Rejected',
                    'url'=>env('APP_URL').'admin/partner/rejected',
                    'route'=>'admin/partner/rejected',
                    'icon'=>'home-sb-select.svg',
                    'icon_hover'=>'home-sb.svg',
                    'icon_title'=>'Services'
                ]
            ]
        ],
        /*[
            'name'=>'Employees Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'employee-sb.svg',
            'icon_hover'=>'employee-sb-select.svg',
            'icon_title'=>'Employees Source',
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
        ],*/
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
            'name'=>'Employees Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'employee-sb.svg',
            'icon_hover'=>'employee-sb-select.svg',
            'icon_title'=>'Employees Source',
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
            'name'=>'Designation Source',
            'url'=>'javascript:void(0)',
            'route'=>'javascript:void(0)',
            'icon'=>'designation.svg',
            'icon_hover'=>'designation.svg',
            'icon_title'=>'Designation Source',
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
        ],
        [
            'name'=>'Patients',
            'url'=>env('APP_URL').'patients/roadl-request',
            'route'=>'patients','icon'=>'patient-selected-sb.svg','icon_hover'=>'patient-sb.svg','icon_title'=>'Patients',
        ],
    ],
    
];
