<?php

namespace Rikudou\RedisHelperBundle;

use Rikudou\RedisHelperBundle\DependencyInjection\Compiler\EnsureRedisService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RikudouRedisHelperBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new EnsureRedisService());
    }
}
