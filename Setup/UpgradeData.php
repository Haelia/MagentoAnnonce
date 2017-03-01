<?php

namespace Pictime\Annonce\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            // Recuperons la table pictime_annonce
            $tableName = $setup->getTable('pictime_annonce');
            // Verifions que la table existe
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                // Declarons les données
                $data = [
                    [
                        'title' => 'Bonjour le monde !!',
                        'author' => 'Paul Atréides',
                        'description' => 'Je viens que découvrir magento 2, C\'est trop de la balle !',
                        'created_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                    ],
                    [
                        'title' => 'Vends belle-mère.',
                        'author' => 'Bob l\'Éponge',
                        'description' => "Vends ma belle mère, très usagé.\nCause: Je ne m'en sert pas, et elle m'encombre.",
                        'created_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                    ]
                ];

                // Inserer les données dans la table
                foreach ($data as $item) {
                    $setup->getConnection()->insert($tableName, $item);
                }
            }
        }

        $setup->endSetup();
    }
}