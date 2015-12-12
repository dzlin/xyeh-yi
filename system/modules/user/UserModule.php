<?php

namespace application\modules\user;

use application\core\Module;

class UserModule extends Module
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		// $this->setImport(array(
		// 	'user.models.*',
		// 	'user.components.*',
		// ));
		$this->controllerNamespace = 'application\modules\user\controllers';
        parent::init();
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
