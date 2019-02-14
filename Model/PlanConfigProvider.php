<?php

namespace Yannerio\Calculadora\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

/**
 * Class PlanConfigProvider
 */
class PlanConfigProvider implements ConfigProviderInterface
{

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig()
    {
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
        $checkoutSession = $objectManager->get('\Magento\Checkout\Model\Session');
        return [
            'plan' => [
                'monto' => $checkoutSession->getCustomPrice(),
                'cuota' => $checkoutSession->getCuota(),
                'plazo' => $checkoutSession->getPlazos(),
                'interes' => $checkoutSession->getinteres()
            ],
        ];
    }
}