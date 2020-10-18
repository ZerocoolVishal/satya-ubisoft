<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    private $max_products = 6;
    private $sort = SORT_ASC;


    private function getProducts()
    {
        return Product::find()
            ->orderBy(['created_at' => $this->sort])
            ->limit($this->max_products)
            ->all();
    }

    private function productsInQueue()
    {
        $products_count = Product::find()->count();
        $in_queue = 0;

        if($products_count > $this->max_products) {
            $in_queue = $products_count - $this->max_products;
        }

        return $in_queue;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $products = $this->getProducts();
        $in_queue = $this->productsInQueue();

        return $this->render('index', [
            'products' => $products,
            'in_queue' => $in_queue
        ]);
    }

    public function actionItemRegistration()
    {
        $model = new \app\models\Product();

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $file_name = (time() . '_' . rand(9999, 99999)) . $model->imageFile->extension;
            $model->imageFile->saveAs("uploads/$file_name");
            $model->image = $file_name;

            $model->imageFile = null;

            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Item Registered successfully !!');
                return $this->redirect(['item-registration']);
            }
        }

        return $this->render('item-registration', [
            'model' => $model,
        ]);
    }

    public function actionGetNextProduct()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $products_count = Product::find()->count();

        if($products_count > $this->max_products) {

            $product = Product::find()
                ->orderBy(['created_at' => $this->sort])
                ->limit($this->max_products)
                ->one();

            if($product) {
                $product->delete();
            }

            $products = $this->getProducts();
            $in_queue = $this->productsInQueue();

            return [
                'status' => 200,
                'isNewProducts' => true,
                'products' => $this->renderAjax('_product_queue', ['products' => $products, 'in_queue' => $in_queue]),
            ];
        }

        return [
            'status' => 200,
            'isNewProducts' => false,
        ];
    }

    public function actionGetQueueCount()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'status' => 200,
            'queue' => $in_queue = $this->productsInQueue()
        ];
    }
}
