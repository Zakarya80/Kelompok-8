<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pasok */

$this->title = 'Update Pasok: ' . $model->id_pasok;
$this->params['breadcrumbs'][] = ['label' => 'Pasoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasok, 'url' => ['view', 'id' => $model->id_pasok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
