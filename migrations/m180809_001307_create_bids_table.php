<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bids`.
 */
class m180809_001307_create_bids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bids', [
            'id' => $this->primaryKey(),
	        'id_event' => $this->integer(),
	        'name' => $this->string(),
	        'email' => $this->string(),
	        'price' => $this->float()
        ]);

        $this->createIndex(
        	'idx-bids',
	        'bids',
	        'id_event'
        );

        $this->addForeignKey(
        	'fk-bids',
	        'bids',
	        'id_event',
	        'events',
	        'id',
	        'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bids');
    }
}
