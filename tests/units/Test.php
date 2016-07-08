<?php

namespace Workshop\tests\units;

use atoum\mock;

class Test extends \atoum
{
    public function beforeTestMethod($method)
    {
        mock\controller::disableAutoBindForNewMock();
        $this->mockGenerator->allIsInterface();
        return parent::beforeTestMethod($method);
    }
}
