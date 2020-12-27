<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>env('APP_URL').'clinician','route'=>'clinician'],
        ['name'=>'Patient List','url'=>env('APP_URL').'clinician/patient-list','route'=>'clinician/patient-list'],
        ['name'=>'New Patient List','url'=>env('APP_URL').'clinician/new-patient-list','route'=>'clinician/new-patient-list'],
        [
            'name'=>'Appointment',
            'url'=>'appointment-request',
            'route'=>'clinician/scheduled-appointment',
            'menu'=>[
                [
                    'name'=>'Schedule',
                    'url'=>env('APP_URL').'clinician/scheduled-appointment',
                    'route'=>'clinician/scheduled-appointment'
                ],
                [
                    'name'=>'Cancelled',
                    'url'=>env('APP_URL').'clinician/cancelled-appointment',
                    'route'=>'clinician/cancelled-appointment'
                ]
            ]
        ],
        [
            'name'=>'Requests',
            'url'=>'roadl-request',
            'route'=>'clinician/roadl',
            'menu'=>[
                [
                    'name'=>'RoadL Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl'
                ],
                [
                    'name'=>'Reschedule Requests',
                    'url'=>env('APP_URL').'clinician/roadl',
                    'route'=>'clinician/roadl'
                ]
            ]
        ]
    ]
];
