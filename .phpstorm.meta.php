<?php

namespace PHPSTORM_META {
    override(\Interop\Container\ContainerInterface::get(0), map([
        '' => '@',

        'HydratorManager' => \Zend\Hydrator\HydratorPluginManager::class,
    ]));

    override(\Zend\Hydrator\HydratorPluginManager::get(0), map([
        '' => '@'
    ]));
}