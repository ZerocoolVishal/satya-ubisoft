<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbl_product".
 *
 * @property int $product_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{

    /* @var UploadedFile */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'image'], 'required'],
            [['created_at'], 'safe'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['title'], 'string', 'max' => 100],
            [['description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'created_at' => 'Created At',
        ];
    }
}
