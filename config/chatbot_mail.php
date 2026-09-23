<?php

return [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'encryption' => 'tls',

    // Cuenta de Gmail utilizada para enviar
    'username' => 'olguinemily503@gmail.com',
    'password' => 'smdv fkaw exgo opkm',

    // Remitente visible
    'from_email' => 'olguinemily503@gmail.co',
    'from_name' => 'Chatbot SEESEL',

    // Destinatario principal
    'to_email' => 'negocios2@seeselqro.com.mx',
    'to_name' => 'Contacto SEESEL',

    // Copias. 
    'cc' => [
        [
            'email' => 'adrian.solis@seeselqro.com.mx',
            'name' => 'Director 1'
        ],
        [
            'email' => 'jhernandez@seeselqro.com.mx',
            'name' => 'Director 2'
        ]
    ]
];


