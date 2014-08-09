<?php

namespace systems51\zf2ext;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 *
 */
class Module implements
    ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}