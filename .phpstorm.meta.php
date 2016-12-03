<?php

namespace PHPSTORM_META {
    override(\Zend\Mvc\Controller\AbstractController::plugin(0), map([
        '' => '@',

        'sendResponse' => \Zf2Extensions\Controller\Plugin\SendResponsePlugin::class,
    ]));

    override(\Interop\Container\ContainerInterface::get(0), map([
        '' => '@',

        'HydratorManager' => \Zend\Hydrator\HydratorPluginManager::class,
    ]));

    override(\Zend\Hydrator\HydratorPluginManager::get(0), map([
        '' => '@'
    ]));
}