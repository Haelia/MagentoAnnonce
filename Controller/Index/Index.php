<?php
namespace Pictime\Annonce\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Pictime\Annonce\Model\AnnonceFactory;

class Index extends Action
{
    /* @var \Pictime\Annonce\Model\AnnonceFactory */
    protected $_modelAnnonceFactory;


    /**
     * Index constructor.
     * @param Context $context
     * @param AnnonceFactory $annonceFactory
     */
    public function __construct(Context $context, AnnonceFactory $annonceFactory)
    {
        parent::__construct($context);
        $this->_modelAnnonceFactory = $annonceFactory;
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            $submit = $this->getRequest()->getPost('submit');
            if (!empty($submit['name']) && !empty($submit['title']) && !empty($submit['description'])) {
                $modelAnnonce = $this->_modelAnnonceFactory->create();
                $modelAnnonce->setAuthor($submit['name']);
                $modelAnnonce->setTitle($submit['title']);
                $modelAnnonce->setDescription($submit['description']);
                $modelAnnonce->setCreatedAt(new \DateTime());
                $modelAnnonce->setStatus(1);
                $modelAnnonce->save();

                return $this->_redirect('*/*/*');
            }
        }

       $this->_view->loadLayout()->renderLayout();
    }
}