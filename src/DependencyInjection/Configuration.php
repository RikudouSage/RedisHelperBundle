<?php

namespace Rikudou\RedisHelperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('rikudou_redis_helper');

        $rootNode = $treeBuilder->getRootNode();
        assert($rootNode instanceof ArrayNodeDefinition);

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('redis_service')
                    ->info('The name of the service that will be used for instantiating redis helper')
                    ->defaultValue('Redis')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
