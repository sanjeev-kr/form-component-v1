<?php
namespace Piranha\Club\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;

use Magento\Framework\Setup\ModuleContextInterface;

use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements  UpgradeSchemaInterface

{

	public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context){

		$setup->startSetup();

		if (version_compare($context->getVersion(), '1.0.1') < 0) {
			$this->oneZeroOne($setup);
		}
		 
		$setup->endSetup();

	}

	private function oneZeroZero($setup)
	{
		// Get module table
		$tableName = $setup->getTable('sanjeev_formcomponentv1_formcomponentv1');

		// Check if the table already exists

		if ($setup->getConnection()->isTableExists($tableName) == true) {
			// Declare data
		    $columns = [
				'status' => [
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
					'nullable' => false,
					'default' => '0',
					'comment' => 'Status',
				]
			];
			$connection = $setup->getConnection();
			foreach ($columns as $name => $definition) {
				$connection->addColumn($tableName, $name, $definition);
			}

		}
	}

}