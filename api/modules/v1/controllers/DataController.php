<?php

namespace api\modules\v1\controllers;

use common\models\Accusation;
use common\models\History;
use common\models\News;
use common\models\Partner;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class DataController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['news', 'history', 'partner']]]);
    }

    public function actionNews(): array
    {
        $query = News::find();
        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 10,
        ]);

        $news = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->returnSuccess([
            'news' => $news,
            'pagination' => [
                'totalCount' => $count,
                'pageSize' => $pagination->pageSize,
                'pageCount' => $pagination->pageCount,
                'currentPage' => $pagination->page + 1,
            ],
        ], 'news');
    }

    public function actionHistory(): array
    {
        $history = History::find()->all();
        return $this->returnSuccess($history, 'history');
    }

    public function actionPartner(): array
    {
        $partner = Partner::find()->all();
        return $this->returnSuccess($partner, 'partner');
    }

}
