<?php

namespace Pictime\Annonce\Model\Resource\Annonce;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Pictime\Annonce\Model\Annonce',
            'Pictime\Annonce\Model\Resource\Annonce'
        );
    }
}