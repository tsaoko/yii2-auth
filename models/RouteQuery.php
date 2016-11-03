<?php

namespace tsaoko\auth\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use tsaoko\models\Route;

/**
 * RouteQuery represents the model behind the search form about `common\models\Route`.
 */
class RouteQuery extends Route
{

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = Route::find();
        $query->andWhere(['not like','route','*']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => '20',
            ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orderBy(['created_at'=>SORT_DESC]);

        return $dataProvider;
    }

}
