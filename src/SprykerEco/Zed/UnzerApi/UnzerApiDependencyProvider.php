<?php

namespace SprykerEco\Zed\UnzerApi;

use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiToToGuzzleHttpClientAdapter;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceBridge;

class UnzerApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_UTIL_ENCODING = 'SERVICE_UTIL_ENCODING';

    public const UNZER_API_HTTP_CLIENT = 'UNZER_API_HTTP_CLIENT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addUtilEncodingService($container);
        $container = $this->addUnzerApiHttpClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUtilEncodingService(Container $container): Container
    {
        $container->set(static::SERVICE_UTIL_ENCODING, function (Container $container) {
            return new UnzerApiToUtilEncodingServiceBridge($container->getLocator()->utilEncoding()->service());
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addUnzerApiHttpClient(Container $container): Container
    {
        $container->set(static::UNZER_API_HTTP_CLIENT, function () {
            return new UnzerApiToToGuzzleHttpClientAdapter();
        });

        return $container;
    }
}
