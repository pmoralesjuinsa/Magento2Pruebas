<?php


namespace Mastering\SampleModule\Controller\Adminhtml\Items;

use Mastering\SampleModule\Model\ItemFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Mastering\SampleModule\Model\Item;

class MassDelete extends Action
{
    private $itemFactory;

    public function __construct(Context $context, ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
//        var_dump($this->getRequest()->getParams()); die();
        $ids = $this->getRequest()->getParam('selected');

//        $item = $this->_objectManager->create(Item::class)->load($id);

        foreach ($ids as $id) {
            try{
                $item = $this->itemFactory->create()->load($id);
                if(!$item->getId()) {
                    $this->messageManager->addError(__('Item not found.'));
                    $resultRedirect = $this->resultRedirectFactory->create();
                    return $resultRedirect->setPath('*');
                }
                $item->delete();
                $this->messageManager->addSuccess(__('Item '.$id.' deleted'));
            } catch (Exception $e) {
                $this->messageManager->addError(__('Error while trying to delete item: '.$id));
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*');
    }
}
