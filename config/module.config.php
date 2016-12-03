<?php

return [
    'controller_plugins' => [
        'invokables' => [
            'sendResponse' => \Zf2Extensions\Controller\Plugin\SendResponsePlugin::class,
        ]
    ],
];