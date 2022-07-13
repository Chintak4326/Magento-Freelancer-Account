<?php
namespace ChintakExtensions\Freelancer\Controller\Adminhtml\Freelancer;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;

class Deleteimage extends AbstractAccount
{
    public $imageFactory;
    public $freelancerFactory;
    public $messageManager;

    public function __construct(
        Context $context,
        \ChintakExtensions\Freelancer\Model\ImageFactory $imageFactory,
        \ChintakExtensions\Freelancer\Model\FreelancerFactory $freelancerFactory,
        \Magento\Framework\Json\Helper\Data $jsonData,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->imageFactory = $imageFactory;
        $this->freelancerFactory = $freelancerFactory;
        $this->jsonData = $jsonData;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $imageId = $this->getRequest()->getParam('id');
        $model = $this->imageFactory->create()->load($imageId);
        $model->delete();
        $success=1;
        $this->getResponse()->setHeader('Content-type', 'application/javascript');
        $this->getResponse()->setBody(
            $this->jsonData->jsonEncode([
                'success' => $success
            ])
        );
    }
}
