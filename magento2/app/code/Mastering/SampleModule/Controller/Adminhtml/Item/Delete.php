<?php


namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Mastering\SampleModule\Model\ItemFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Mastering\SampleModule\Model\Item;

class Delete extends Action
{
    private $itemFactory;

    public function __construct(Context $context, ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

//        $item = $this->_objectManager->create(Item::class)->load($id);
        $item = $this->itemFactory->create()->load($id);
        if(!$item->getId()) {
            $this->messageManager->addError(__('Item not found.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*');
        }

        try{
            $item->delete();
            $this->messageManager->addSuccess(__('Your item has been deleted !'));
        } catch (Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete item: '));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*');
    }
}
