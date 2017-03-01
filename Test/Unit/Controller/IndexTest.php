<?php

namespace Pictime\Annonce\Test\Unit\Controller;

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Controller\Account\LoginPost;
use Magento\Customer\Model\Account\Redirect as AccountRedirect;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\Redirect;
use Pictime\Annonce\Controller\Index\Index;

/**
 * Test customer account controller
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class IndexTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Index
     */
    protected $controller;

    /**
     * @var Context | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $context;

    /**
     * @var Session | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $session;

    protected $viewMock;

    /**
     * @var Http | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $request;

    /**
     * @var Redirect | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $redirect;

    protected $response;

    protected function setUp()
    {
        $this->context = $this->getMockBuilder('Magento\Framework\App\Action\Context')->disableOriginalConstructor()->getMock();
        $this->request = $this->getMockBuilder('Magento\Framework\App\Request\Http')->disableOriginalConstructor()->setMethods(['isPost', 'getPost'])->getMock();
        $this->response = $this->getMockBuilder('Magento\Framework\App\Response\Http')->disableOriginalConstructor()->getMock();
        $this->viewMock = $this->getMockBuilder('Magento\Framework\App\View')->disableOriginalConstructor()->getMock();
        $this->viewMock->expects($this->any())->method('loadLayout')->willReturn($this->viewMock);
        $this->redirect = $this->getMockBuilder('\Magento\Store\App\Response\Redirect')->disableOriginalConstructor()->getMock();

        $this->context->expects($this->any())->method('getRequest')->willReturn($this->request);
        $this->context->expects($this->any())->method('getView')->willReturn($this->viewMock);
        $this->context->expects($this->any())->method('getRedirect')->willReturn($this->redirect);
        $this->context->expects($this->any())->method('getResponse')->willReturn($this->response);

        $annonce = $this->getMockBuilder('Pictime\Annonce\Model\Annonce')->disableOriginalConstructor()->getMock();
        $annonceFactory = $this->getMockBuilder('Pictime\Annonce\Model\AnnonceFactory')->disableOriginalConstructor()->getMock();
        $annonceFactory->expects($this->any())->method('create')->willReturn($annonce);

        $this->controller = new Index($this->context, $annonceFactory);
    }

    public function testRenderListing()
    {
        $valid = 'Valid Rendering';

        $this->viewMock->expects($this->any())
            ->method('renderLayout')
            ->willReturn($valid);

        $this->assertSame($valid, $this->controller->execute());
    }

    public function testPostAnnonce()
    {
        $this->request->expects($this->once())
            ->method('isPost')
            ->willReturn(true);

        $this->request->expects($this->once())
            ->method('getPost')
            ->with('submit')
            ->willReturn(['name' => 'x', 'title' => 'x', 'description' => 'x']);

        $this->assertSame($this->response, $this->controller->execute());
    }

}