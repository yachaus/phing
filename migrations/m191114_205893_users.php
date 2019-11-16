<?php

use yii\db\Migration;

/**
 * Class m191114_205839_users
 */
class m191114_205893_users extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('users',[
            'id' => $this->primaryKey(),
            'name' => $this->string(20),
            'email' => $this->string(50),
            'role' => $this->integer()
        ]);

        $this->addForeignKey('users_roles_id_fk',
            'users',
            'role',
            'roles',
            'id');

        $this->insert('users', [
            'name' => 'Nikita',
            'email' => 'nikita.chaus68@gmail.com',
            'role' => '1'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m191114_200254_users cannot be reverted.\n";
        $this->dropTable('users');
        return false;
    }
}
