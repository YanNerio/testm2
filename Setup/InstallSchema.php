<?php namespace Yannerio\Calculadora\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('yannerio_calculadora_plan'))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Plan ID'
            )
            ->addColumn('nombre', Table::TYPE_TEXT, '200' ,['nullable' => false], 'Nombre plan')
            ->addColumn('plazo', Table::TYPE_INTEGER, 3, [], 'Plazo')
            ->addColumn('interes', Table::TYPE_DECIMAL, '3,2', ['nullable' => false, 'default' => 0.00], 'Tasa de interes')
            ->addColumn('monto_max', Table::TYPE_DECIMAL, '10,2', ['nullable' => false, 'default' => 0.00], 'Monto maximo de financiamiento')
            ->addColumn('estado', Table::TYPE_INTEGER, 1, ['nullable' => false, 'default' => 1 ], 'Plan activo/inactivo')
            ->addColumn('created_at', Table::TYPE_DATETIME,  null, ['nullable' => false], 'Creation Date')
            ->addColumn('updated_at', Table::TYPE_DATETIME,  null, ['nullable' => false], 'Update Date')
            // ->getConnection()->addIndex(
			// 	$installer->getTable('yannerio_calculadora_plan'),
			// 	$setup->getIdxName(
			// 		$installer->getTable('yannerio_calculadora_plan'),
			// 		['nombre', 'plazo', 'interes', 'monto_max', 'estado'],
			// 		\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			// 	),
			// 	['nombre', 'plazo', 'interes', 'monto_max', 'estado'],
			// 	\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			// )
            ->setComment('Yannerio Calculadora');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}