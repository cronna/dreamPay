<?php

use yii\db\Migration;

/**
 * Class m240425_122344_dreamDB
 */
class m240425_122344_dreamDB extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'phone' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'birthday' => $this->date()->notNull(),
            'country' => $this->string()->notNull(),
            'balance' => $this->integer()->defaultValue(0)
        ]);
        $this->createTable('dreams', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->text()->notNull(),
            'desc' => $this->text()->notNull(),
            'url' => $this->text()->notNull(),
            'img' => $this->text()->notNull(),
            'addres' => $this->text()->notNull()
        ]);
        $this->addForeignKey(
            'user_to_dreams_fk',
            'dreams',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240425_122344_dreamDB cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240425_122344_dreamDB cannot be reverted.\n";

        return false;
    }
    */
}
