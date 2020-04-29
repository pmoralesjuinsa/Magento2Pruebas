<?php

namespace Mastering\SampleModule\Block;

use Magento\Checkout\Model\Session;
use Magento\Framework\Phrase;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Context;
use Mastering\SampleModule\Model\Birthday;

class IsYourBirthday extends AbstractBlock
{
    /**
     * @var Birthday
     */
    private $birthday;

    /**
     * @var \DateTime
     */
    private $myDate;

    /**
     * OrderSuccess constructor.
     * @param Context $context
     * @param Birthday $birthday
     * @param \DateTime $myDate
     * @param array $data
     */
    public function __construct(
        Context $context,
        Birthday $birthday,
        \DateTime $myDate,
        array $data = []
    )
    {
        $this->birthday = $birthday;
        $this->myDate = $myDate;
        parent::__construct($context, $data);
    }

    /**
     * @return Phrase|string
     */
    protected function _toHtml()
    {
        $date = $this->myDate;

        if ($date && $this->birthday->isYourBirthday($date)) {
            return __('happy birthday to you');
        }
        return '';
    }

}
