<?php

namespace FreeBet\Bundle\CompetitionBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * FreeBetCompetitionBundleExtension.
 *
 * @author jobou
 */
class FreeBetCompetitionExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $this->loadConfiguration($config, $container);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * Load custom configuration in container
     *
     * @param array $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function loadConfiguration(array $configs, ContainerBuilder $container)
    {
        $container->setParameter('free_bet.event_mapping', $configs['mapping_events']);
    }
}
