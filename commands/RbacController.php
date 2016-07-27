<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "add sto" permission
        $createPost = $auth->createPermission('addSTO');
        $createPost->description = 'Create a new STO';
        $auth->add($createPost);

        // add "edit sto" permission
        $updatePost = $auth->createPermission('editSTO');
        $updatePost->description = 'edit and STO';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('sto-owner');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
//        $auth->assign($author, 2);
//        $auth->assign($admin, 1);
    }
}