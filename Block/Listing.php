<?php

namespace Pictime\Annonce\Block;

use Magento\Framework\View\Element\Template;
use Pictime\Annonce\Model\AnnonceFactory;

class Listing extends Template
{
    /* @var \Pictime\Annonce\Model\AnnonceFactory */
    protected $_modelAnnonceFactory;

    /**
     * Listing constructor.
     */
    public function __construct(Template\Context $context, AnnonceFactory $annonceFactory)
    {
        parent::__construct($context);
        $this->_modelAnnonceFactory = $annonceFactory;
    }

    /**
     * @return \Pictime\Annonce\Model\Annonce[]
     */
    public function getAnnonces()
    {
        $annonceModel = $this->_modelAnnonceFactory->create();
        return $annonceModel->getCollection()->load();
    }
}