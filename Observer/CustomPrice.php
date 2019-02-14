<?php
  
    namespace Yannerio\Calculadora\Observer;
 
    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
    
    class CustomPrice implements ObserverInterface
    {
        
        public function execute(\Magento\Framework\Event\Observer $observer) {
            $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
            $checkoutSession = $objectManager->get('\Magento\Checkout\Model\Session');

            $item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
            $price = $checkoutSession->getCustomPrice(); //set your price here
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
        }
 
    }