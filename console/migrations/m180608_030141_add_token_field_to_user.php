<?php

use yii\db\Migration;

/**
 * Class m180608_030141_add_token_field_to_user
 */
class m180608_030141_add_token_field_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'access_token', 'string(64) comment "token值"');
        $this->addColumn('user', 'expire_at', 'int(11) default 0 not null comment"token过期时间"');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'access_token');
        $this->dropColumn('user', 'expire_at');
    }
}
