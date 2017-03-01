<?php

namespace Pictime\Annonce\Test\Unit\Block\Form;

use Magento\Framework\UrlInterface;
use Pictime\Annonce\Block\Form\Submit;

class SubmitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Pictime\Annonce\Block\Form\Submit
     */
    private $_block;

    /**
     * @var UrlInterface
     */
    private $_urlBuilder;

    public function setUp()
    {
        $context = $this->getMock('Magento\Framework\View\Element\Template\Context', [], [], '', false);
        $this->_urlBuilder = $this->getMock('Magento\Framework\UrlInterface', [], [], '', false);

        $this->_block = new Submit($context, $this->_urlBuilder);
    }

    public function testGetFormUrl()
    {
       $expected_url = "Custom URL";

       $this->_urlBuilder->expects($this->any())->method('getUrl')->will($this->returnValue($expected_url));
       $this->assertEquals($expected_url, $this->_block->getFormUrl());
    }
}