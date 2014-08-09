<?php

namespace Systems51\Controller\Plugin;


use Zend\Http\Response;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Mvc\Exception\DomainException;
use Zend\Mvc\InjectApplicationEventInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ResponseInterface;

/**
 * Plugins inheriting from this superclass will be able to terminate the request by calling sendResponse()
 *
 * Class RequestTerminationPlugin
 */
abstract class SendResponsePlugin extends AbstractPlugin
{

    /**
     * @var MvcEvent
     */
    private $event;

    /**
     * Sends the response and terminates.
     * @param ResponseInterface $response
     */
    public function sendResponse(ResponseInterface $response)
    {
        $e = $this->getEvent();
        $e->setResponse($response);

        $e->getApplication()->getEventManager()->trigger(MvcEvent::EVENT_FINISH, $e);
        exit();
    }


    /**
     * Get the event
     *
     * @return MvcEvent
     * @throws DomainException if unable to find event
     */
    protected function getEvent()
    {
        if ($this->event) {
            return $this->event;
        }

        $controller = $this->getController();
        if (!$controller instanceof InjectApplicationEventInterface) {
            throw new DomainException(get_class($this) . ' requires a controller that implements InjectApplicationEventInterface');
        }

        $event = $controller->getEvent();
        if (!$event instanceof MvcEvent) {
            $params = $event->getParams();
            $event  = new MvcEvent();
            $event->setParams($params);
        }
        $this->event = $event;

        return $this->event;
    }

}