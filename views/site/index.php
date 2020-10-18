<?php

/* @var $this yii\web\View */
/* @var $products \app\models\Product[] */
/* @var $in_queue int */

$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Satyajeet Wale - Ubisoft';
?>
<div class="site-index">

    <div class="mt-3 mb-3 text-right">
        <?= \yii\bootstrap4\Html::a('Item Registration >', ['site/item-registration'], ['class' => 'h5', 'target' => '_blank']) ?>
    </div>

    <div id="products-container">
        <?= $this->render('_product_queue', ['products' => $products, 'in_queue' => $in_queue]) ?>
    </div>

</div>
