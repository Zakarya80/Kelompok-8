<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pasok */

$this->title = 'Create Pasok';
$this->params['breadcrumbs'][] = ['label' => 'Pasoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasok-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
