<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter;

use Generated\Shared\Transfer\UnzerApiErrorResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use Spryker\Service\UtilEncoding\UtilEncodingServiceInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface;

class UnzerApiResponseConverter implements UnzerApiResponseConverterInterface
{
    /**
     * @var \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    protected $unzerApiResponseMapper;

    /**
     * @param \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface $utilEncodingService
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface $unzerApiResponseMapper
     */
    public function __construct(
        UtilEncodingServiceInterface $utilEncodingService,
        UnzerApiResponseMapperInterface $unzerApiResponseMapper
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->unzerApiResponseMapper = $unzerApiResponseMapper;
    }

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface $httpResponse
     * @param bool $isSuccess
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer(
        UnzerApiToHttpResponseInterface $httpResponse,
        bool $isSuccess = true
    ): UnzerApiResponseTransfer {
        $responseData = $this->utilEncodingService->decodeJson($httpResponse->getResponseBody(), true);

        $unzerApiResponseTransfer = $this->createUnzerApiResponseTransfer($isSuccess);

        if (!$isSuccess) {
            return $this->updateResponseTransferWithError($unzerApiResponseTransfer, $responseData);
        }

        return $this->unzerApiResponseMapper
            ->mapResponseDataToUnzerApiResponseTransfer($responseData, $unzerApiResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param array|null $responseData
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function updateResponseTransferWithError(
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        ?array $responseData
    ): UnzerApiResponseTransfer {
        $errorTransfer = new UnzerApiErrorResponseTransfer();

        if ($responseData !== null) {
            $errorTransfer->fromArray($responseData, true);
        }

        return $unzerApiResponseTransfer
            ->setIsSuccess(false)
            ->setErrorResponse($errorTransfer);
    }

    /**
     * @param bool $isSuccess
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function createUnzerApiResponseTransfer(bool $isSuccess): UnzerApiResponseTransfer
    {
        return (new UnzerApiResponseTransfer())
            ->setIsSuccess($isSuccess);
    }
}
