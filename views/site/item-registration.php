<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form ActiveForm */

?>
<div class="site-item-registration">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

       <div class="card border-0 shadow w-50 mx-auto">
           <div class="card-body rounded">
               <h5 class="h5 text-u">Register New Item</h5>
               <div class="mt-3">
                   <?= $form->field($model, 'title') ?>
                   <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                   <?= $form->field($model, 'imageFile')->fileInput() ?>
                   <div class="form-group">
                       <?= Html::submitButton('Register', ['class' => 'btn btn-success']) ?>
                   </div>
               </div>
           </div>
       </div>

    <?php ActiveForm::end(); ?>

</div><!-- site-item-registration -->
