<?php

namespace Grad\CoreBundle\Component\HttpKernel\GradBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

abstract class GradBundle extends Bundle
{

    abstract public function getVersion();
}