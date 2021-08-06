<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business;

use Spryker\Service\UtilEncoding\UtilEncodingServiceInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClient;
use SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLogger;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilder;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiSetWebhookUrlRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiSetWebhookUrlRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiSetWebhookUrlResponseConverter;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiGuzzleHttpClientAdapterInterface;
use SprykerEco\Zed\UnzerApi\UnzerApiDependencyProvider;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiQueryContainer getQueryContainer()
 */
class UnzerApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createSetWebhookApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createSetWebhookRequest(),
            $this->createSetWebhookUrlResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createSetWebhookRequest(): UnzerApiRequestInterface
    {
        return new UnzerApiSetWebhookUrlRequest(
            $this->getConfig(),
            $this->createSetWebhookUrlRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createSetWebhookUrlRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createSetWebhookUrlRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createSetWebhookUrlRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new UnzerApiSetWebhookUrlRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createSetWebhookUrlResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiSetWebhookUrlResponseConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface
     */
    public function createUnzerApiLogger(): UnzerApiLoggerInterface
    {
        return new UnzerApiLogger();
    }

    /**
     * @return \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface
     */
    public function getUtilEncoding(): UtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiGuzzleHttpClientAdapterInterface
     */
    public function getUnzerApiHttpClient(): UnzerApiGuzzleHttpClientAdapterInterface
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::UNZER_API_HTTP_CLIENT);
    }
}
