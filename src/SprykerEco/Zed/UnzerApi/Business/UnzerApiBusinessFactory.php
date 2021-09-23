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
use SprykerEco\Zed\UnzerApi\Business\Api\Request\AuthorizableChargeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\AuthorizeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilder;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\ChargeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\AuthorizableChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\ChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateBasketRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateCustomerRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateMetadataRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreatePaymentResourceRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\GetPaymentRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceAuthorizableChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketPlaceAuthorizeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceGetPaymentRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceRefundRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\RefundRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\SetWebhookUrlRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateBasketRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateCustomerRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateMetadataRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreatePaymentResourceRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\GetPaymentRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceAuthorizableChargeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceAuthorizeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceChargeRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceGetPaymentRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceRefundRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\RefundRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\SetWebhookUrlRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\AuthorizeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\ChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateBasketResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateCustomerResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateMetadataResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreatePaymentResourceResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreditCardChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\GetPaymentResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceAuthorizeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceCreditCardChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceRefundResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\RefundResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\SetWebhookUrlResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToGuzzleHttpClientAdapter;
use SprykerEco\Zed\UnzerApi\UnzerApiDependencyProvider;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()
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
        return new SetWebhookUrlRequest(
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
        return new SetWebhookUrlRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createSetWebhookUrlResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createSetWebhookUrlResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createCreateCustomerApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createCreateCustomerRequest(),
            $this->createCreateCustomerResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateCustomerRequest(): UnzerApiRequestInterface
    {
        return new CreateCustomerRequest(
            $this->getConfig(),
            $this->createCreateCustomerRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateCustomerRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateCustomerRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createCreateCustomerRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new CreateCustomerRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreateCustomerResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createCreateCustomerResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createCreateBasketApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createCreateBasketRequest(),
            $this->createCreateBasketResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateBasketRequest(): UnzerApiRequestInterface
    {
        return new CreateBasketRequest(
            $this->getConfig(),
            $this->createCreateBasketRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateBasketRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateBasketRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createCreateBasketRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new CreateBasketRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreateBasketResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createCreateBasketResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createCreateBasketResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new CreateBasketResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createCreateMetadataApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createCreateMetadataRequest(),
            $this->createCreateMetadataResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateMetadataRequest(): UnzerApiRequestInterface
    {
        return new CreateMetadataRequest(
            $this->getConfig(),
            $this->createCreateMetadataRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateMetadataRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateMetadataRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createCreateMetadataRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new CreateMetadataRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreateMetadataResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createCreateMetadataResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createCreateMetadataResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new CreateMetadataResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createMarketplaceAuthorizeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceAuthorizeRequest(),
            $this->createMarketplaceAuthorizeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceAuthorizeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceAuthorizeRequest(
            $this->getConfig(),
            $this->createMarketplaceAuthorizeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceAuthorizeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceAuthorizeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceAuthorizeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketPlaceAuthorizeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createMarketplaceAuthorizeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createMarketplaceAuthorizeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createMarketplaceAuthorizeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new MarketplaceAuthorizeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createAuthorizeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createAuthorizeRequest(),
            $this->createAuthorizeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createAuthorizeRequest(): UnzerApiRequestInterface
    {
        return new AuthorizeRequest(
            $this->getConfig(),
            $this->createAuthorizeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createAuthorizeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createAuthorizeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createAuthorizeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketPlaceAuthorizeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createAuthorizeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createAuthorizeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createAuthorizeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new AuthorizeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createCreateCustomerResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new CreateCustomerResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createSetWebhookUrlResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new SetWebhookUrlResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface
     */
    public function createUnzerApiLogger(): UnzerApiLoggerInterface
    {
        return new UnzerApiLogger($this->getEntityManager());
    }

    /**
     * @return \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface
     */
    public function getUtilEncoding(): UtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToGuzzleHttpClientAdapter
     */
    public function getUnzerApiHttpClient(): UnzerApiToGuzzleHttpClientAdapter
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::HTTP_CLIENT);
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createMarketplaceGetPaymentApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceGetPaymentRequest(),
            $this->createGetPaymentResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceGetPaymentRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceGetPaymentRequest(
            $this->getConfig(),
            $this->createMarketplaceGetPaymentRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceGetPaymentRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceGetPaymentRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceGetPaymentRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketplaceGetPaymentRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createGetPaymentApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createGetPaymentRequest(),
            $this->createGetPaymentResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createGetPaymentRequest(): UnzerApiRequestInterface
    {
        return new GetPaymentRequest(
            $this->getConfig(),
            $this->createGetPaymentRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createGetPaymentRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createGetPaymentRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createGetPaymentRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new GetPaymentRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createGetPaymentResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createGetPaymentResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createGetPaymentResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new GetPaymentResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createMarketplaceChargeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceChargeRequest(),
            $this->createMarketplaceChargeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceChargeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceChargeRequest(
            $this->getConfig(),
            $this->createMarketplaceChargeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceChargeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceChargeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketplaceChargeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createMarketplaceChargeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createMarketplaceChargeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createMarketplaceChargeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new MarketplaceChargeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createMarketplaceAuthorizableChargeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceAuthorizableChargeRequest(),
            $this->createMarketplaceCreditCardChargeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceAuthorizableChargeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceAuthorizableChargeRequest(
            $this->getConfig(),
            $this->createMarketplaceAuthorizableChargeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceAuthorizableChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceAuthorizableChargeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceAuthorizableChargeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketplaceAuthorizableChargeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createMarketplaceCreditCardChargeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createMarketplaceCreditCardChargeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createMarketplaceCreditCardChargeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new MarketplaceCreditCardChargeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createCreatePaymentResourceApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createCreatePaymentResourceRequest(),
            $this->createCreatePaymentResourceResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreatePaymentResourceRequest(): UnzerApiRequestInterface
    {
        return new CreatePaymentResourceRequest(
            $this->getConfig(),
            $this->createCreatePaymentResourceRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreatePaymentResourceRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreatePaymentResourceRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createCreatePaymentResourceRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new CreatePaymentResourceRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreatePaymentResourceResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createCreatePaymentResourceResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createCreatePaymentResourceResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new CreatePaymentResourceResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createMarketplaceRefundApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceRefundRequest(),
            $this->createMarketplaceRefundResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceRefundRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceRefundRequest(
            $this->getConfig(),
            $this->createMarketplaceRefundRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceRefundRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceRefundRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceRefundRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketplaceRefundRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createMarketplaceRefundResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createMarketplaceRefundResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createMarketplaceRefundResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new MarketplaceRefundResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createRefundApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createRefundRequest(),
            $this->createRefundResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createRefundRequest(): UnzerApiRequestInterface
    {
        return new RefundRequest(
            $this->getConfig(),
            $this->createRefundRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createRefundRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createRefundRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createRefundRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new RefundRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createRefundResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createRefundResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createChargeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createChargeRequest(),
            $this->createChargeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createChargeRequest(): UnzerApiRequestInterface
    {
        return new ChargeRequest(
            $this->getConfig(),
            $this->createChargeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createChargeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createChargeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new ChargeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createChargeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createChargeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createChargeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new ChargeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Client\UnzerApiClientInterface
     */
    public function createAuthorizableChargeApiClient(): UnzerApiClientInterface
    {
        return new UnzerApiClient(
            $this->getUnzerApiHttpClient(),
            $this->createAuthorizableChargeRequest(),
            $this->createCreditCardChargeResponseConverter(),
            $this->createUnzerApiLogger()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createAuthorizableChargeRequest(): UnzerApiRequestInterface
    {
        return new AuthorizableChargeRequest(
            $this->getConfig(),
            $this->createAuthorizableChargeRequestBuilder()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createAuthorizableChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createAuthorizableChargeRequestConverter(),
            $this->getUtilEncoding()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createAuthorizableChargeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new AuthorizableChargeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreditCardChargeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncoding(),
            $this->createCreditCardChargeResponseMapper()
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createCreditCardChargeResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new CreditCardChargeResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createRefundResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new RefundResponseMapper();
    }
}
