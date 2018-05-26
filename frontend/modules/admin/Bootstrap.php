<?php

namespace frontend\modules\admin;

use yii\base\BootstrapInterface;
use yii\base\Application;

class Bootstrap implements BootstrapInterface {
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
            $app->getUrlManager()->addRules([
                'admin' => 'admin/dashboard/index',
                '<_a:(about|contacts)>' => 'site/default/<_a>' //sample for pseudo regex
            ]);
        });

    }
}