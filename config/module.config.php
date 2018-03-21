<?php

namespace MassimoFilippi\SlackModule;

return [
    'service_manager' => [
        'factories' => [
            Service\SlackService::class => Service\Factory\SlackServiceFactory::class,
        ]
    ]
];
