<?php

namespace application\modules\test;

use application\core\Module;

/**
 * Description of TestModule
 *
 * @author gzdzl
 */
class TestModule extends Module
{

    protected function init()
    {
        $this->controllerNamespace = 'application\modules\test\controllers';
        parent::init();
    }

}
