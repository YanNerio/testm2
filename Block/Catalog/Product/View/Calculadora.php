<?php
namespace Yannerio\Calculadora\Block\Catalog\Product\View;
class Calculadora extends \Magento\Framework\View\Element\Template
{
	
	protected $_registry;
    protected $_checkoutSession;
    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,       
		\Magento\Framework\Registry $registry,
        \Yannerio\Calculadora\Model\PlanFactory $planFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    )
    {       
		$this->_registry = $registry;
        $this->_planFactory = $planFactory;
        $this->_checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getCurrentCategory()
    {       
        return $this->_registry->registry('current_category');
    }

    public function getCurrentProduct()
    {       
        return $this->_registry->registry('current_product');
	}   
	/**
     * @return array
     */
    public function getPlanes($ids)
    {
        $planesArray = [];

        $planes = $this->_planFactory->create();
		$collection = $planes->getResourceCollection()
			->addFieldToFilter('entity_id',['in'=>[$ids]]);
        $collection->setOrder('plazo','ASC');

        foreach ($collection as $plan) {
            $planesArray[$plan->getEntityId()] = $plan->getNombre();
        }

        return $planesArray;
    }
    public function getCheckoutSession() 
    {
        return $this->_checkoutSession;
    } 
}