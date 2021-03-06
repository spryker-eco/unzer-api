<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface;
use SprykerEco\Zed\UnzerApi\UnzerApiConfig;
use Symfony\Component\HttpFoundation\Request;

class CreateMarketplaceBasketUnzerApiRequest extends AbstractUnzerApiRequest
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\UnzerApiConfig
     */
    protected $unzerApiConfig;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    protected $unzerApiRequestBuilder;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface $httpClient
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface $unzerApiResponseConverter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface $unzerApiLogger
     * @param \SprykerEco\Zed\UnzerApi\UnzerApiConfig $unzerApiConfig
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface $unzerApiRequestBuilder
     */
    public function __construct(
        UnzerApiToHttpClientInterface $httpClient,
        UnzerApiResponseConverterInterface $unzerApiResponseConverter,
        UnzerApiLoggerInterface $unzerApiLogger,
        UnzerApiConfig $unzerApiConfig,
        UnzerApiRequestBuilderInterface $unzerApiRequestBuilder
    ) {
        parent::__construct($httpClient, $unzerApiResponseConverter, $unzerApiLogger);
        $this->unzerApiConfig = $unzerApiConfig;
        $this->unzerApiRequestBuilder = $unzerApiRequestBuilder;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function getUrl(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return $this->unzerApiConfig->getUnzerApiCreateMarketplaceBasketUrl();
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return Request::METHOD_POST;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function getRequestBody(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return $this->unzerApiRequestBuilder->buildRequestPayload($unzerApiRequestTransfer);
    }
}
