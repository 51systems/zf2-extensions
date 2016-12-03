<?php

use Zend\Mvc\Controller\LazyControllerAbstractFactory;

/**
 * Class PostfixControllerAbstractFactory
 *
 * Inherits from {@link LazyControllerAbstractFactory} but checks to see if the requested controller
 * class name exists. If it does not, appends 'Controller' to the class name.
 *
 * This allows automatic creation of controllers that follow the <ControllerName>Controller class pattern
 * without having to explicitly specify the full controller name in the route parameters or having to create
 * manual factories.
 *
 */
class PostfixControllerAbstractFactory extends LazyControllerAbstractFactory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        if (!class_exists($requestedName)) {
            $postfixClass = $requestedName . 'Controller';
            if (class_exists($postfixClass)) {
                $requestedName = $postfixClass;
            }
        }

        return parent::__invoke($container, $requestedName, $options);
    }

}