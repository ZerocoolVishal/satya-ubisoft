<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="mt-3 mb-3 text-right">
        <?= \yii\bootstrap4\Html::a('Item Registration', [''], ['class' => 'h5']) ?>
    </div>

    <div class="row" id="products-container">

        <?php foreach ([1,2,3,4, 5, 6] as $product): ?>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-center mb-4">
                <div class="card-body">
                    <div class="image"></div>
                    <div class="h4">Title</div>
                    <div class="text-muted">Description</div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <?= \yii\helpers\Html::tag('div', "Queue [10]", ['class' => 'h4 text-right']) ?>

</div>
