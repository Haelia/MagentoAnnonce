<?php

namespace Pictime\Annonce\Model;

use Magento\Framework\Model\AbstractModel;

class Annonce extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Pictime\Annonce\Model\Resource\Annonce');
    }
}