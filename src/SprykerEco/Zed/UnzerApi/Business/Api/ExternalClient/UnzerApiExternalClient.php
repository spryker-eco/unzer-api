<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\ExternalClient;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface;
use SprykerEco\Zed\UnzerApi\Exception\UnzerApiToHttpClientException;
use SprykerEco\Zed\UnzerApi\UnzerApiConfig;

class UnzerApiExternalClient implements UnzerApiExternalClientInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface
     */
    protected $httpClient;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface
     */
    protected $unzerApiRequest;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface
     */
    protected $unzerApiResponseConverter;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface
     */
    protected $unzerApiLogger;

    /**
     * @var \SprykerEco\Zed\UnzerApi\UnzerApiConfig
     */
    protected $unzerApiConfig;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface $httpClient
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface $unzerApiRequest
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface $unzerApiResponseConverter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface $unzerApiLogger
     * @param \SprykerEco\Zed\UnzerApi\UnzerApiConfig $unzerApiConfig
     */
    public function __construct(
        UnzerApiToHttpClientInterface $httpClient,
        UnzerApiRequestInterface $unzerApiRequest,
        UnzerApiResponseConverterInterface $unzerApiResponseConverter,
        UnzerApiLoggerInterface $unzerApiLogger,
        UnzerApiConfig $unzerApiConfig
    ) {
        $this->httpClient = $httpClient;
        $this->unzerApiRequest = $unzerApiRequest;
        $this->unzerApiResponseConverter = $unzerApiResponseConverter;
        $this->unzerApiLogger = $unzerApiLogger;
        $this->unzerApiConfig = $unzerApiConfig;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function sendRequest(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        $isSuccessful = true;
        $requestUrl = $this->unzerApiRequest->getUrl($unzerApiRequestTransfer);
        $requestBody = $this->unzerApiRequest->getRequestBody($unzerApiRequestTransfer);

        try {
            $unzerApiToHttpResponse = $this->httpClient->sendRequest(
                $requestUrl,
                $this->unzerApiRequest->getHttpMethod(),
                $requestBody,
                $unzerApiRequestTransfer->getUnzerKeypairOrFail()->getPrivateKeyOrFail(),
            );
        } catch (UnzerApiToHttpClientException $unzerApiToHttpClientException) {
            $isSuccessful = false;
            $unzerApiToHttpResponse = $unzerApiToHttpClientException->getResponse();
        }

        $unzerApiResponseTransfer = $this->unzerApiResponseConverter
            ->convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer($unzerApiToHttpResponse, $isSuccessful);

        if ($this->unzerApiConfig->logApiCalls()) {
            $this->unzerApiLogger->logApiCall(
                $unzerApiResponseTransfer,
                $requestBody,
                $this->unzerApiRequest->getHttpMethod(),
                $requestUrl,
            );
        }

        return $unzerApiResponseTransfer;
    }
}
