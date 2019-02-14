<?php
namespace Yannerio\Calculadora\Model\Product\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\Data\OptionSourceInterface;

class Planes extends AbstractSource implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var \Magento\Framework\App\Cache\Type\Config
     */
    protected $_configCacheType;

    /**
     * Catalog config
     *
     * @var \Magento\Catalog\Model\Config
     */
    protected $_catalogConfig;

    protected $_planFactory;

    private $serializer;

    /**
     * Construct
     *
     * @param \Magento\Catalog\Model\Config $catalogConfig
     */
    public function __construct(
        \Yannerio\Calculadora\Model\PlanFactory $planFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Cache\Type\Config $configCacheType)
    {
        $this->_storeManager = $storeManager;
        $this->_configCacheType = $configCacheType;
        $this->_planFactory = $planFactory;
    }

    /**
     * {@inheritdoc}
     */
    
    // public function getAllOptions1()
    // {
    //     $arr = [];
    //     // $cacheKey = 'PLANES_SELECT_STORE_' . $this->_storeManager->getStore()->getCode();
    //     // if ($cache = $this->_configCacheType->load($cacheKey)) {
    //     //     $options = $this->getSerializer()->unserialize($cache);
    //     // } else {
    //         $planes = $this->_planFactory->create();
    //         $collection = $planes->getResourceCollection();
    //         $options = $collection->load()->toOptionArray();
    //         foreach ($collection as $attribute) {
    //             $arr[$attribute->getEntityId()] = $attribute->getNombre();
    //         }
    //     //     $this->_configCacheType->save($this->getSerializer()->serialize($options), $cacheKey);
    //     // }
    //     return $arr;
    // }

     /**
     * Get serializer
     *
     * @return \Magento\Framework\Serialize\SerializerInterface
     * @deprecated 101.1.0
     */
    // private function getSerializer()
    // {
    //     if ($this->serializer === null) {
    //         $this->serializer = \Magento\Framework\App\ObjectManager::getInstance()
    //             ->get(\Magento\Framework\Serialize\SerializerInterface::class);
    //     }
    //     return $this->serializer;
    // }

    /**
     * @return array
     */
    public function toArray()
    {
        $planesOptions = [];

        $planes = $this->_planFactory->create();
        $collection = $planes->getResourceCollection();
        $collection->setOrder('plazo','ASC');

        foreach ($collection as $plan) {
            $planesOptions[$plan->getEntityId()] = $plan->getNombre();
        }

        return $planesOptions;
    }

    /**
     * Options getter
     * @return array
     */
    final public function toOptionArray()
    {
        $arr = $this->toArray();
        $ret = [];
    
        foreach ($arr as $key => $value) {
            $ret[] = [
                // Always return a string:
                'value' => (string) $key,
                'label' => $value
            ];
        }
    
        return $ret;
    }

    /**
     * Get options in "key-value" format
     * @return array
     */
    // public function toArray()
    // {
    //     return [];
    // }

    /**
     * @return array
     */
    public function getAllOptions()
    {
        return $this->toOptionArray();
    }
}
