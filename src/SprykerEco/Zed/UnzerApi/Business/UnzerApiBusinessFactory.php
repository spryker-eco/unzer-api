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
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\SetWebhookUrlRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\SetWebhookUrlRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\SetWebhookUrlResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceBridge;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface;
use SprykerEco\Zed\UnzerApi\UnzerApiDependencyProvider;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()
 */
class UnzerApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return UnzerApiClientInterface
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
     * @return UnzerApiToHttpClientInterface
     */
    public function getUnzerApiHttpClient(): UnzerApiToHttpClientInterface
    {
        /** @var UnzerApiToHttpClientInterface $unzerApiHttpClient */
        $unzerApiHttpClient = $this->getProvidedDependency(UnzerApiDependencyProvider::UNZER_API_HTTP_CLIENT);

        return $unzerApiHttpClient;
    }

    /**
     * @return UnzerApiRequestInterface
     */
    public function createSetWebhookRequest(): UnzerApiRequestInterface
    {
        return new SetWebhookUrlRequest(
            $this->getConfig(),
            $this->createSetWebhookUrlRequestBuilder()
        );
    }

    /**
     * @return UnzerApiResponseConverterInterface
     */
    public function createSetWebhookUrlResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createSetWebhookUrlResponseMapper()
        );
    }

    /**
     * @return UnzerApiLoggerInterface
     */
    public function createUnzerApiLogger(): UnzerApiLoggerInterface
    {
        return new UnzerApiLogger($this->getEntityManager());
    }

    /**
     * @return UnzerApiRequestBuilderInterface
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
        return new SetWebhookUrlRequestConverter();
    }

    /**
     * @return UnzerApiToUtilEncodingServiceInterface
     */
    public function getUtilEncoding(): UnzerApiToUtilEncodingServiceInterface
    {
        /** @var UnzerApiToUtilEncodingServiceInterface $utilEncoding */
        $utilEncoding = $this->getProvidedDependency(UnzerApiDependencyProvider::SERVICE_UTIL_ENCODING);

        return $utilEncoding;
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createSetWebhookUrlResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new SetWebhookUrlResponseMapper();
    }

}
