<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>url('clinician'),'route'=>'clinician'],
        ['name'=>'Patient List','url'=>url('clinician/patient-list'),'route'=>'clinician/patient-list'],
        ['name'=>'New Patient List','url'=>url('clinician/new-patient-list'),'route'=>'clinician/new-patient-list'],
        [
            'name'=>'Appointment',
            'url'=>'appointment-request',
            'route'=>'clinician/scheduled-appointment',
            'menu'=>[
                [
                    'name'=>'Schedule',
                    'url'=>url('clinician/scheduled-appointment'),
                    'route'=>'clinician/scheduled-appointment'
                ],
                [
                    'name'=>'Cancelled',
                    'url'=>url('clinician/cancelled-appointment'),
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
                    'url'=>url('clinician/roadl'),
                    'route'=>'clinician/roadl'
                ],
                [
                    'name'=>'Reschedule Requests',
                    'url'=>url('clinician/roadl'),
                    'route'=>'clinician/roadl'
                ]
            ]
        ]
    ]
];
