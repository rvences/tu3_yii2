<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Trato de acceder un espacio inexistente.
    </p>
    <p>
        En caso de que considere que es un error en el servidor, contacta a <a href="http://nibira.com">Nibira</a> .
    </p>

</div>
