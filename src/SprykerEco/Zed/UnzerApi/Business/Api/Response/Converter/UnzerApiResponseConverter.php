<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter;

use Generated\Shared\Transfer\UnzerApiErrorResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface;

class UnzerApiResponseConverter implements UnzerApiResponseConverterInterface
{
    /**
     * @var UnzerApiToUtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    protected $responseMapper;

    /**
     * @param UnzerApiToUtilEncodingServiceInterface $utilEncodingService
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface $responseMapper
     */
    public function __construct(
        UnzerApiToUtilEncodingServiceInterface $utilEncodingService,
        UnzerApiResponseMapperInterface $responseMapper
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->responseMapper = $responseMapper;
    }

    /**
     * @param UnzerApiToHttpResponseInterface $response
     * @param bool $isSuccess
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer(
        UnzerApiToHttpResponseInterface $response,
        bool $isSuccess = true
    ): UnzerApiResponseTransfer {
        $responseData = $this->utilEncodingService->decodeJson($response->getResponseBody(), true);

        $responseTransfer = $this->createResponseTransfer($isSuccess);

        if (!$isSuccess) {
            return $this->updateResponseTransferWithError($responseTransfer, $responseData);
        }

        return $this->responseMapper
            ->mapResponseDataToUnzerApiResponseTransfer($responseData, $responseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $responseTransfer
     * @param array|null $responseData
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function updateResponseTransferWithError(
        UnzerApiResponseTransfer $responseTransfer,
        ?array $responseData
    ): UnzerApiResponseTransfer {
        $errorTransfer = new UnzerApiErrorResponseTransfer();

        if ($responseData !== null) {
            $errorTransfer->fromArray($responseData, true);
        }

        return $responseTransfer
            ->setIsSuccess(false)
            ->setErrorResponse($errorTransfer);
    }

    /**
     * @param bool $isSuccess
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function createResponseTransfer(bool $isSuccess): UnzerApiResponseTransfer
    {
        return (new UnzerApiResponseTransfer())
            ->setIsSuccess($isSuccess);
    }
}
