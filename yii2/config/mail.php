<?php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.mail.ru',
        'username' => 'danilov.infobel@mail.ru',
        'password' => 'dimaprogrammer',
        'port' => '465',
        'encryption' => 'ssl',
    ]
];