<?php

namespace Mastering\SampleModule\Block;

use Magento\Checkout\Model\Session;
use Magento\Framework\Phrase;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;
use Mastering\SampleModule\Model\LuckInfo;

class OrderSuccess extends AbstractBlock
{
    /**
     * @var LuckInfo
     */
    private $luckInfo;

    /**
     * @var Session
     */
    private $session;

    /**
     * OrderSuccess constructor.
     * @param Context $context
     * @param LuckInfo $luckInfo
     * @param Session $session
     * @param array $data
     */
    public function __construct(
        Context $context,
        LuckInfo $luckInfo,
        Session $session,
        array $data = []
    )
    {
        $this->luckInfo = $luckInfo;
        $this->session = $session;
        parent::__construct($context, $data);
    }

    /**
     * @return Phrase|string
     */
    protected function _toHtml()
    {
        $order = $this->session->getLastRealOrder();
        if ($order && $this->luckInfo->isAmountLucky($order->getGrandTotal())) {
            return __('Your order is lucky!');
        }
        return '';
    }

}
