<?php
/**
 * Copyright © 2017 Magmodules.eu. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magmodules\Channable\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Item
 *
 * @package Magmodules\Channable\Model\ResourceModel
 */
class Item extends AbstractDb
{

    /**
     * @var bool
     */
    protected $_isPkAutoIncrement = false;
    /**
     * @var DateTime
     */
    private $date;

    /**
     * Item constructor.
     *
     * @param Context  $context
     * @param DateTime $date
     * @param null     $resourcePrefix
     */
    public function __construct(
        Context $context,
        DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->date = $date;
    }

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('channable_items', 'item_id');
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     *
     * @return $this
     */
    protected function _beforeSave(AbstractModel $object)
    {
        $object->setUpdatedAt($this->date->gmtDate());
        return parent::_beforeSave($object);
    }
}
