<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface;
use SprykerEco\Zed\UnzerApi\Exception\UnzerApiToHttpClientException;
use SprykerEco\Zed\UnzerApi\UnzerApiConfig;

abstract class UnzerApiAbstractRequest
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
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface
     */
    protected $httpClient;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface
     */
    protected $unzerApiLogger;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    protected $unzerApiResponseConverter;

    /**
     * @param \SprykerEco\Zed\UnzerApi\UnzerApiConfig $unzerApiConfig
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface $unzerApiRequestBuilder
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface $httpClient
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface $unzerApiResponseConverter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface $unzerApiLogger
     */
    public function __construct(
        UnzerApiConfig $unzerApiConfig,
        UnzerApiRequestBuilderInterface $unzerApiRequestBuilder,
        UnzerApiToHttpClientInterface $httpClient,
        UnzerApiResponseConverterInterface $unzerApiResponseConverter,
        UnzerApiLoggerInterface $unzerApiLogger
    ) {
        $this->unzerApiConfig = $unzerApiConfig;
        $this->unzerApiRequestBuilder = $unzerApiRequestBuilder;
        $this->httpClient = $httpClient;
        $this->unzerApiLogger = $unzerApiLogger;
        $this->unzerApiResponseConverter = $unzerApiResponseConverter;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    abstract public function getUrl(UnzerApiRequestTransfer $unzerApiRequestTransfer): string;

    /**
     * @return string
     */
    abstract public function getHttpMethod(): string;

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    abstract public function getRequestBody(UnzerApiRequestTransfer $unzerApiRequestTransfer): string;

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function sendRequest(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        $isSuccessful = true;
        $requestUrl = $this->getUrl($unzerApiRequestTransfer);

        try {
            $response = $this->httpClient->sendRequest(
                $requestUrl,
                $this->getHttpMethod(),
                $this->getRequestBody($unzerApiRequestTransfer),
                $unzerApiRequestTransfer->getUnzerKeypairOrFail()->getPrivateKeyOrFail(),
            );
        } catch (UnzerApiToHttpClientException $requestException) {
            $isSuccessful = false;
            $response = $requestException->getResponse();
        }

        $unzerApiResponseTransfer = $this->unzerApiResponseConverter
            ->convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer($response, $isSuccessful);

        $this->unzerApiLogger->logApiCall(
            $unzerApiResponseTransfer,
            $this->getRequestBody($unzerApiRequestTransfer),
            $this->getHttpMethod(),
            $requestUrl,
        );

        return $unzerApiResponseTransfer;
    }
}
