<?php
namespace Webkul\Grid\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class inlineEditNOVA extends \Magento\Backend\App\Action
{
    /**
     * @var \Webkul\Grid\Model\GridFactory
     */
    protected $gridFactory;

    /** @var JsonFactory  */
    protected $jsonFactory;

    /**
     * inlineEdit constructor.
     *
     * @param Context $context
     * @param \Webkul\Grid\Model\GridFactory $gridFactory
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        \Webkul\Grid\Model\GridFactory $gridFactory,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $gridId) {
                    $grid = $this->gridFactory->create()->load($gridId);
                    try {
                        $grid->setData(array_merge($grid->getData(), $postItems[$gridId]));
                        $grid->save();
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithGridId(
                            $grid,
                            __($e->getMessage())
                        );
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * @param $grid
     * @param $errorText
     * @return string
     */
    protected function getErrorWithGridId($grid, $errorText)
    {
        return '[Grid ID: ' . $grid->getId() . '] ' . $errorText;
    }
}
