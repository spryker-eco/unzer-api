<?php declare(strict_types = 1);

namespace SprykerEco\Zed\UnzerApi\Business\Api\Client;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Exception\UnzerApiGuzzleRequestException;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiToGuzzleHttpClientAdapterInterface;

class UnzerApiClient implements UnzerApiClientInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiToGuzzleHttpClientAdapterInterface
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
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\UnzerApiToGuzzleHttpClientAdapterInterface $guzzleHttpClientAdapter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestInterface $unzerApiRequest
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter\UnzerApiResponseConverterInterface $unzerApiResponseConverter
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Logger\UnzerApiLoggerInterface $unzerApiLogger
     */
    public function __construct(
        UnzerApiToGuzzleHttpClientAdapterInterface $guzzleHttpClientAdapter,
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
        $isSuccess = true;
        $requestUrl = $this->unzerApiRequest->getUrl($unzerApiRequestTransfer);

        try {
            $response = $this->guzzleHttpClientAdapter->sendRequest(
                $requestUrl,
                $this->unzerApiRequest->getHttpMethod(),
                $this->unzerApiRequest->getRequestBody($unzerApiRequestTransfer),
                $this->unzerApiRequest->getAuthorizationKey()
            );
        } catch (UnzerApiGuzzleRequestException $requestException) {
            $isSuccess = false;
            $response = $requestException->getResponse();
        }

        $responseTransfer = $this->unzerApiResponseConverter
            ->convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer($response, $isSuccess);

        $this->unzerApiLogger->logApiCall(
            $unzerApiRequestTransfer,
            $responseTransfer,
            $this->unzerApiRequest->getHttpMethod(),
            $requestUrl
        );

        return $responseTransfer;
    }
}
