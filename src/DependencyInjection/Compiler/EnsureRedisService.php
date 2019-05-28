<?php

namespace Rikudou\RedisHelperBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class EnsureRedisService implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $redisService = $container->getParameter('rikudou.redis_helper.redis_service');

        try {
            $container->getDefinition($redisService);
            $container->setAlias(
                'rikudou.redis_helper.internal.redis_service',
                new Alias($redisService, false)
            );
        } catch (ServiceNotFoundException $exception) {
            throw new \LogicException(
                "The service '{$redisService}' does not exist, please create it or configure the service in config/packages/rikudou_redis_helper.yaml (see 'bin/console config:dump rikudou_redis_helper' for configuration reference)"
            );
        }
    }
}
