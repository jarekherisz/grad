<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public const GRAD_VERSION = '0.0.1';
    public const GRAD_MAJOR_VERSION = 0;
    public const GRAD_MINOR_VERSION = 0;
    public const GRAD_RELEASE_VERSION = 1;
}
