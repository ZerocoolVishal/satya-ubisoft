<?php
/* @var $products \app\models\Product[] */
/* @var $in_queue int */
?>
    <div class="row">

        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center mb-4">
                    <div class="card-body">
                        <div class="image"
                             style="background-image: url('<?= \yii\helpers\Url::to("@web/uploads/$product->image") ?>')"></div>
                        <div class="h4"><?= $product->title ?></div>
                        <div class="text-muted"><?= $product->description ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?= \yii\helpers\Html::tag('div', "Queue [$in_queue]", ['class' => 'h4 text-right', 'id' => 'queue']) ?>