<?php

namespace api\modules\v1\controllers;

use common\models\Accusation;
use common\models\News;
use common\models\Partner;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class DataController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['news', 'accusation', 'partner']]]);
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

    public function actionAccusation(): array
    {
        $accusations = Accusation::find()->select('history')->asArray()->all();

        $histories = array_column($accusations, 'history');

        return $this->returnSuccess($histories, 'histories');
    }

    public function actionPartner(): array
    {
        $partner = Partner::find()->all();
        return $this->returnSuccess($partner, 'partner');
    }

}
