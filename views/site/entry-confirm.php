<?php

use yii\helpers\Html;

?>
<p>You have entered next information...</p>
<ul>
    <li>
        <label>
            Name:
        </label>
        <?= Html::encode($model->name); ?>
    </li>
    <li>
        <label>
            Email:
        </label>
        <?= Html::encode($model->email); ?>
    </li>
</ul>