<?php

namespace Pictime\Annonce\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Annonce extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('pictime_annonce', 'id');
    }
}