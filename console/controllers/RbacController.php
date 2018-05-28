<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createComment"
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Create a comment';
        $auth->add($createComment);

        $subscriber = $auth->createRole('subscriber');
        $auth->add($subscriber);
        $auth->addChild($subscriber, $createComment);

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $subscriber);
        $auth->addChild($author, $createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost); 
        
        // добавляем разрешение "manageComments"
        $manageComments = $auth->createPermission('manageComments');
        $manageComments->description = 'Update post';
        $auth->add($manageComments);

        // добавляем разрешение "manageCategories"
        $manageCategories = $auth->createPermission('manageCategories');
        $manageCategories->description = 'Update post';
        $auth->add($manageCategories);


        // добавляем роль "editor" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $updatePost);
        $auth->addChild($editor, $manageCategories);
        $auth->addChild($editor, $manageComments);
        $auth->addChild($editor, $author);

        // change users permission
        $manageUsers = $auth->createPermission('manageUsers');
        $manageUsers->description = 'Manage users';
        $auth->add($manageUsers);

        // change settings permission
        $changeSettings = $auth->createPermission('changeSettings');
        $changeSettings->description = 'Change settings';
        $auth->add($changeSettings);

        // add "admin" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $changeSettings);
        $auth->addChild($admin, $manageUsers);
        $auth->addChild($admin, $editor);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
//        $auth->assign($author, 2);
//        $auth->assign($admin, 1);
    }
}