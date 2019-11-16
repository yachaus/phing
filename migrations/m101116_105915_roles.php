<?php

use yii\db\Migration;

/**
 * Class m191116_105919_roles
 */
class m101116_105915_roles extends Migration
{

    public function up()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'role' => $this->string(10)
        ]);

        $this->batchInsert('roles', [
            'role'
        ],[['admin'],['user'],['guest']]);

    }


    public function down()
    {
        echo "m191116_105919_roles cannot be reverted.\n";
        $this->dropTable('roles');
        return false;
    }

}
