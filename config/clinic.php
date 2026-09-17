<?php

return [
    'name' => 'Mittal Dental Clinic',

    'phones' => [
        ['label' => 'Appointments', 'number' => '0141 2811101', 'tel' => '+911412811101'],
        ['label' => 'Mobile', 'number' => '+91 98283 41051', 'tel' => '+919828341051'],
        ['label' => 'Mobile', 'number' => '+91 98294 60460', 'tel' => '+919829460460'],
    ],

    'primary_call_tel' => env('CLINIC_PRIMARY_CALL_TEL', '+919828341051'),

    'email' => 'info@mittaldentalclinic.com',

    'notification_email' => env('CLINIC_NOTIFICATION_EMAIL', 'info@mittaldentalclinic.com'),

    'address' => [
        'line1' => '604, Opp. Shivgyan Enclave, Near Bright Future School',
        'line2' => 'Gautam Marg, Nirman Nagar AB',
        'city' => 'Jaipur, Rajasthan 302019',
    ],

    'hours' => [
        ['days' => 'Monday - Saturday', 'time' => '11am - 1pm, 5pm - 8pm'],
        ['days' => 'Sunday', 'time' => '10am - 2pm'],
    ],
];
