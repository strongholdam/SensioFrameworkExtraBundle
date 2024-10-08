<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sensio\Bundle\FrameworkExtraBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\NodeInterface;

/**
 * FrameworkExtraBundle configuration structure.
 *
 * @author Henrik Bjornskov <hb@peytz.dk>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return NodeInterface
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sensio_framework_extra');

        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->arrayNode('router')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('annotations')->defaultTrue()->end()
                    ->end()
                ->end()
                ->arrayNode('request')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('converters')->defaultTrue()->end()
                        ->booleanNode('auto_convert')->defaultTrue()->end()
                        ->arrayNode('disable')->prototype('scalar')->end()->end()
                    ->end()
                ->end()
                ->arrayNode('view')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('annotations')->defaultTrue()->end()
                    ->end()
                ->end()
                ->arrayNode('cache')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('annotations')->defaultTrue()->end()
                    ->end()
                ->end()
                ->arrayNode('security')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('annotations')->defaultTrue()->end()
                        ->scalarNode('expression_language')->defaultValue('sensio_framework_extra.security.expression_language.default')->end()
                    ->end()
                ->end()
                ->arrayNode('templating')
                    ->fixXmlConfig('controller_pattern')
                    ->children()
                        ->arrayNode('controller_patterns')
                            ->prototype('scalar')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
