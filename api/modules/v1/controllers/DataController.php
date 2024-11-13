<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\History;
use common\models\News;
use common\models\Partner;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class DataController extends AppController
{
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['news', 'history', 'partner']]]);
    }

    /**
     * Returns a list of News
     */
    #[Get(
        path: '/data/news',
        operationId: 'news-index',
        description: 'Возвращает полный список новостей',
        summary: 'Список новостей',
        tags: ['data']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'news', type: 'array',
            items: new Items(ref: '#/components/schemas/News'),
        )
    ])]
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

    /**
     * Returns a list of History
     */
    #[Get(
        path: '/data/history',
        operationId: 'history-index',
        description: 'Возвращает полный список истории',
        summary: 'Список истории',
        tags: ['data']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'histories', type: 'array',
            items: new Items(ref: '#/components/schemas/History'),
        )
    ])]
    public function actionHistory(): array
    {
        $history = History::find()->all();
        return $this->returnSuccess($history, 'history');
    }

    /**
     * Returns a list of Partner's
     */
    #[Get(
        path: '/data/partner',
        operationId: 'partner-index',
        description: 'Возвращает полный список партнеров',
        summary: 'Список партнеров',
        tags: ['data']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'partners', type: 'array',
            items: new Items(ref: '#/components/schemas/Partner'),
        )
    ])]
    public function actionPartner(): array
    {
        $partner = Partner::find()->all();
        return $this->returnSuccess($partner, 'partner');
    }
}
