<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLogger;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\AuthorizableChargeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\AuthorizeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilder;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\ChargeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\AuthorizableChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\AuthorizeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\ChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateBasketRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateCustomerRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreateMetadataRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\CreatePaymentResourceRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\GetPaymentMethodsRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\GetPaymentRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceAuthorizableChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceAuthorizeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceChargeRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceGetPaymentRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\MarketplaceRefundRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\RefundRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\SetWebhookUrlRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UpdateCustomerRequestConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateBasketUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateCustomerUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateMarketplaceBasketUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreateMetadataUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\CreatePaymentResourceUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\GetPaymentMethodsUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\GetPaymentUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceAuthorizableChargeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceAuthorizeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceChargeUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceGetPaymentUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\MarketplaceRefundUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\RefundUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\SetWebhookUrlUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UpdateCustomerUnzerApiRequest;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverter;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\AuthorizeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\ChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateBasketResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateCustomerResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreateMetadataResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreatePaymentResourceResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\CreditCardChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\GetPaymentMethodsResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\GetPaymentResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceAuthorizeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceCreditCardChargeResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\MarketplaceRefundResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\RefundResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\SetWebhookUrlResponseMapper;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UpdateCustomerResponseMapper;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToGuzzleHttpClientAdapter;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface;
use SprykerEco\Zed\UnzerApi\UnzerApiDependencyProvider;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()
 */
class UnzerApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createSetWebhookUrlUnzerApiRequest(): UnzerApiRequestInterface
    {
        return new SetWebhookUrlUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createSetWebhookUrlResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createSetWebhookUrlRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createSetWebhookUrlRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createSetWebhookUrlRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createSetWebhookUrlResponseMapper(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateCustomerRequest(): UnzerApiRequestInterface
    {
        return new CreateCustomerUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreateCustomerResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createCreateCustomerRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createUpdateCustomerRequest(): UnzerApiRequestInterface
    {
        return new UpdateCustomerUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createUpdateCustomerResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createUpdateCustomerRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateCustomerRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateCustomerRequestConverter(),
            $this->getUtilEncodingService(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createUpdateCustomerRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createUpdateCustomerRequestConverter(),
            $this->getUtilEncodingService(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createUpdateCustomerRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new UpdateCustomerRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createCreateCustomerResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncodingService(),
            $this->createCreateCustomerResponseMapper(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createUpdateCustomerResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncodingService(),
            $this->createUpdateCustomerResponseMapper(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateBasketRequest(): UnzerApiRequestInterface
    {
        return new CreateBasketUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreateBasketResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createCreateBasketRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateMarketplaceBasketRequest(): UnzerApiRequestInterface
    {
        return new CreateMarketplaceBasketUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreateBasketResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createCreateBasketRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateBasketRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateBasketRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createCreateBasketResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreateMetadataRequest(): UnzerApiRequestInterface
    {
        return new CreateMetadataUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreateMetadataResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createCreateMetadataRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreateMetadataRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreateMetadataRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createCreateMetadataResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceAuthorizeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceAuthorizeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceAuthorizeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createMarketplaceAuthorizeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceAuthorizeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceAuthorizeRequestConverter(),
            $this->getUtilEncodingService(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createMarketplaceAuthorizeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new MarketplaceAuthorizeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createMarketplaceAuthorizeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncodingService(),
            $this->createMarketplaceAuthorizeResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createAuthorizeRequest(): UnzerApiRequestInterface
    {
        return new AuthorizeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createAuthorizeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createAuthorizeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createAuthorizeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createAuthorizeRequestConverter(),
            $this->getUtilEncodingService(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createAuthorizeRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new AuthorizeRequestConverter();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createAuthorizeResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncodingService(),
            $this->createAuthorizeResponseMapper(),
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
    public function createUpdateCustomerResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new UpdateCustomerResponseMapper();
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
     * @return \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface
     */
    public function getUtilEncodingService(): UnzerApiToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToGuzzleHttpClientAdapter
     */
    public function getUnzerApiHttpClient(): UnzerApiToGuzzleHttpClientAdapter
    {
        return $this->getProvidedDependency(UnzerApiDependencyProvider::CLIENT_HTTP);
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceGetPaymentRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceGetPaymentUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createGetPaymentResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceGetPaymentRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceGetPaymentRequestConverter(),
            $this->getUtilEncodingService(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createGetPaymentRequest(): UnzerApiRequestInterface
    {
        return new GetPaymentUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createGetPaymentResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createGetPaymentRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createGetPaymentRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createGetPaymentResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceChargeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceChargeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceChargeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createMarketplaceChargeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceChargeRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createMarketplaceChargeResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceAuthorizableChargeRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceAuthorizableChargeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceCreditCardChargeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createMarketplaceAuthorizableChargeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceAuthorizableChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceAuthorizableChargeRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createMarketplaceCreditCardChargeResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createCreatePaymentResourceRequest(): UnzerApiRequestInterface
    {
        return new CreatePaymentResourceUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreatePaymentResourceResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createCreatePaymentResourceRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createCreatePaymentResourceRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createCreatePaymentResourceRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createCreatePaymentResourceResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createMarketplaceRefundRequest(): UnzerApiRequestInterface
    {
        return new MarketplaceRefundUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createMarketplaceRefundResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createMarketplaceRefundRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createMarketplaceRefundRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createMarketplaceRefundRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createMarketplaceRefundResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createRefundRequest(): UnzerApiRequestInterface
    {
        return new RefundUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createRefundResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createRefundRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createRefundRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createRefundRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createRefundResponseMapper(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createChargeRequest(): UnzerApiRequestInterface
    {
        return new ChargeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createChargeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createChargeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createChargeRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createChargeResponseMapper(),
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
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createAuthorizableChargeRequest(): UnzerApiRequestInterface
    {
        return new AuthorizableChargeUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createCreditCardChargeResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createAuthorizableChargeRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createAuthorizableChargeRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createAuthorizableChargeRequestConverter(),
            $this->getUtilEncodingService(),
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
            $this->getUtilEncodingService(),
            $this->createCreditCardChargeResponseMapper(),
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

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    public function createGetPaymentMethodsRequest(): UnzerApiRequestInterface
    {
        return new GetPaymentMethodsUnzerApiRequest(
            $this->getUnzerApiHttpClient(),
            $this->createGetPaymentMethodsResponseConverter(),
            $this->createUnzerApiLogger(),
            $this->getConfig(),
            $this->createGetPaymentMethodsRequestBuilder(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    public function createGetPaymentMethodsResponseConverter(): UnzerApiResponseConverterInterface
    {
        return new UnzerApiResponseConverter(
            $this->getUtilEncodingService(),
            $this->createGetPaymentMethodsResponseMapper(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    public function createGetPaymentMethodsResponseMapper(): UnzerApiResponseMapperInterface
    {
        return new GetPaymentMethodsResponseMapper();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    public function createGetPaymentMethodsRequestBuilder(): UnzerApiRequestBuilderInterface
    {
        return new UnzerApiRequestBuilder(
            $this->createGetPaymentMethodsRequestConverter(),
            $this->getUtilEncodingService(),
        );
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    public function createGetPaymentMethodsRequestConverter(): UnzerApiRequestConverterInterface
    {
        return new GetPaymentMethodsRequestConverter();
    }
}
