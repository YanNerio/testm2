<?php namespace Yannerio\Calculadora\Model\ResourceModel\Plan;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Yannerio\Calculadora\Model\Plan', 'Yannerio\Calculadora\Model\ResourceModel\Plan');
    }

}