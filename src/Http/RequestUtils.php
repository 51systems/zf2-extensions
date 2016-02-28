<?php

namespace Zf2Extensions\Http;


use Zend\Http\Request;

class RequestUtils
{

    /**
     * Converts the request into a url.
     *
     * This encodes the query parameters associated with the request.
     *
     * @param Request $request
     * @return string
     */
    public static function toUriString(Request $request)
    {
        $uri = clone $request->getUri();

        $uri->setQuery(array_merge($uri->getQueryAsArray(),
            $request->getQuery()->toArray()));

        return $uri->toString();
    }
}