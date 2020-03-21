<?php


namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Mastering\SampleModule\Model\ItemFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;

class Save extends Action
{
    private $itemFactory;

    public function __construct(Context $context, ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory
            ->create()
            ->setPath('mastering/index/index');
    }
}
