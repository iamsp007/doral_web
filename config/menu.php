<?php

return [
    'clinician'=>[
        ['name'=>'Dashboard','url'=>url('clinician'),'route'=>'clinician'],
        ['name'=>'Patient List','url'=>url('clinician/patient-list'),'route'=>'clinician/patient-list'],
        ['name'=>'New Patient List','url'=>url('clinician/new-patient-list'),'route'=>'clinician/new-patient-list'],
        ['name'=>'Appointment','url'=>url('clinician/scheduled-appointment'),'route'=>'clinician/scheduled-appointment'],
        ['name'=>'RoadL','url'=>url('clinician/roadl'),'route'=>'clinician/roadl'],
    ]
];
