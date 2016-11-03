<?php
namespace tsaoko\auth;
use yii\base\BootstrapInterface;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module I18N category.
        if (!isset($app->i18n->translations['tsaoko/auth']) && !isset($app->i18n->translations['tsaoko/*'])) {
            $app->i18n->translations['tsaoko/auth'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@tsaoko/auth/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'tsaoko/auth' => 'auth.php',
                ]
            ];
        }
    }
}
