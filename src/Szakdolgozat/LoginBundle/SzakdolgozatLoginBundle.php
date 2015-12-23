<?php

namespace Szakdolgozat\LoginBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SzakdolgozatLoginBundle extends Bundle
{
    public function getParent(){
        return "FOSUserBundle";
    }
}
