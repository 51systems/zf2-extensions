<?php

namespace Zf2ExtensionsTest\Http;


use Zend\Http\Request;
use Zf2Extensions\Http\RequestUtils;

class RequestUtilsTest extends \PHPUnit_Framework_TestCase
{

    public function testToUriStringSimple()
    {
        $request = new Request();
        $request->setUri('http://google.ca/');

        $this->assertEquals('http://google.ca/', RequestUtils::toUriString($request));
    }

    public function testToUriStringMultiQuery()
    {
        $request = new Request();
        $request->setUri('http://google.ca/test.html?foo=bar');

        $request->getQuery()
            ->set('key', 'value');

        $this->assertEquals('http://google.ca/test.html?foo=bar&key=value', RequestUtils::toUriString($request));
    }

    public function testToUriStringMultiQueryOverwrite()
    {
        $request = new Request();
        $request->setUri('http://google.ca/test.html?foo=bar');

        $request->getQuery()
            ->set('foo', 'value');

        $this->assertEquals('http://google.ca/test.html?foo=value', RequestUtils::toUriString($request));
    }
}