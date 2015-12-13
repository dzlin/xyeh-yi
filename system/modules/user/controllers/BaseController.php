<?php

namespace application\modules\user\controllers;

use application\core\Controller;
use application\models\User;
use Yii;

class BaseController extends Controller
{

    /**
     * 用户model
     * @var User
     */
    protected $user = null;

    /**
     * 用户id
     * @var integer
     */
    protected $uid = 0;

    protected function beforeAction($action)
    {
        if ($this->filter($action->id)) {
            return true;
        }
        if (!$this->isLogin()) {
            $this->redirect($this->createUrl('login'));
        }
        $this->uid = Yii::app()->session['uid'];
        return parent::beforeAction($action);
    }

    protected function filter($id)
    {
        $action = array(
            'login',
            'register',
            'active',
        );
        return in_array($id, $action);
    }

}
