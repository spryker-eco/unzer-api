<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Client;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Exception\UnzerApiGuzzleRequestException;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiGuzzleHttpClientAdapterInterface;

class UnzerApiClient implements UnzerApiClientInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiGuzzleHttpClientAdapterInterface
     */
    protected $guzzleHttpClientAdapter;

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
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiGuzzleHttpClientAdapterInterface $guzzleHttpClientAdapter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface $unzerApiRequest
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface $unzerApiResponseConverter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface $unzerApiLogger
     */
    public function __construct(
        UnzerApiGuzzleHttpClientAdapterInterface $guzzleHttpClientAdapter,
        UnzerApiRequestInterface $unzerApiRequest,
        UnzerApiResponseConverterInterface $unzerApiResponseConverter,
        UnzerApiLoggerInterface $unzerApiLogger
    ) {
        $this->guzzleHttpClientAdapter = $guzzleHttpClientAdapter;
        $this->unzerApiRequest = $unzerApiRequest;
        $this->unzerApiResponseConverter = $unzerApiResponseConverter;
        $this->unzerApiLogger = $unzerApiLogger;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function sendRequest(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        $isResponseSuccess = true;
        try {
            $response = $this->guzzleHttpClientAdapter->sendRequest(
                $this->unzerApiRequest->getUrl($unzerApiRequestTransfer),
                $this->unzerApiRequest->getHttpMethod(),
                $this->unzerApiRequest->getRequestBody($unzerApiRequestTransfer),
                $this->unzerApiRequest->getAuthorizationKey()
            );
        } catch (UnzerApiGuzzleRequestException $exception) {
            $isResponseSuccess = false;
        }

        $unzerApiResponseTransfer = $this->unzerApiResponseConverter->convertToResponseTransfer($response, $isResponseSuccess);
        $this->unzerApiLogger->logApiRequestResponse($unzerApiRequestTransfer, $unzerApiResponseTransfer);

        return $unzerApiResponseTransfer;
    }
}
