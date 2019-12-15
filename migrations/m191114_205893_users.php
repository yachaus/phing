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
            'first_name' => $this->string(20),
            'last_name' => $this->string(20),
            'middle_name' => $this->string(20),
            'email' => $this->string(50),
            'role' => $this->integer()
        ]);

        $this->addForeignKey('users_roles_id_fk',
            'users',
            'role',
            'roles',
            'id');

        $this->insert('users', [
            'first_name' => 'Nikita',
            'middle_name' => 'Mychaylovich',
            'last_name' => 'Chaus',
            'email' => 'nikita.chaus68@gmail.com',
            'role' => '1'
        ]);

        $this->insert('users', [
            'first_name' => 'Ivan',
            'middle_name' => '',
            'last_name' => 'Chaus',
            'email' => 'ivan.chaus68@gmail.com',
            'role' => '2'
        ]);

        $this->insert('users', [
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'email' => '68@gmail.com',
            'role' => '2'
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
