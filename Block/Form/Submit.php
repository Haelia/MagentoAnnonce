<?php

namespace Pictime\Annonce\Block\Form;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;

class Submit extends Template
{
    public function getFormUrl()
    {
        return $this->_urlBuilder->getUrl('annonce/index/index');
    }
}