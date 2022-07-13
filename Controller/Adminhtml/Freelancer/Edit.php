<?php
namespace ChintakExtensions\Freelancer\Controller\Adminhtml\Freelancer;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    public $imageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \ChintakExtensions\Freelancer\Model\ImageFactory $imageFactory,
        \ChintakExtensions\Freelancer\Model\FreelancerFactory $freelancerFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->freelancerFactory = $freelancerFactory;
        $this->imageFactory = $imageFactory;
    }

    public function execute()
    {
        $freelancerId = $this->getRequest()->getParam('id');
        $freelancerModel = $this->freelancerFactory->create()->load($freelancerId);
        $this->coreRegistry->register('freelancer_data', $freelancerModel);

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__("Edit Freelancer"));
        return $resultPage;
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('ChintakExtensions_Freelancer::edit');
    }
}
