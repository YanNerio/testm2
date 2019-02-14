<?php namespace Yannerio\Calculadora\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;


class UpgradeData implements UpgradeDataInterface
{
    protected $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}
    /**
     * Installs DB schema for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if (version_compare($context->getVersion(), '1.0.3') < 0) { 
            
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'planes',
                [
                    'type' => 'text',
                    'label' => 'Planes de Financiamiento',
                    'input' => 'multiselect',
                    'required' => false,
                    'source' => \Yannerio\Calculadora\Model\Product\Attribute\Source\Planes::class,
                    'backend' => \Yannerio\Calculadora\Model\Product\Attribute\Backend\Planes::class,
                    'input_renderer' => \Yannerio\Calculadora\Block\Adminhtml\Product\Helper\Planes\Options::class,
                    'sort_order' => 100,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'General Information',
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => true,
                ]
            );
            
        }
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'planes',
                [
                    'type' => 'text',
                    'label' => 'Planes de Financiamiento',
                    'input' => 'multiselect',
                    'required' => false,
                    'source' => \Yannerio\Calculadora\Model\Product\Attribute\Source\Planes::class,
                    'backend' => \Yannerio\Calculadora\Model\Product\Attribute\Backend\Planes::class,
                    'input_renderer' => \Yannerio\Calculadora\Block\Adminhtml\Product\Helper\Planes\Options::class,
                    'sort_order' => 100,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                    'group' => 'General Information',
                    'is_used_in_grid' => true,
                    'is_visible_in_grid' => false,
                    'is_filterable_in_grid' => true,
                ]
            );
            
        }
    }
}