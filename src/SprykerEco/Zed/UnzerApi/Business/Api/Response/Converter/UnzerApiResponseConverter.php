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
     * @var string
     */
    protected const RESPONSE_DATA_KEY_IS_ERROR = 'isError';

    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface
     */
    protected $unzerApiResponseMapper;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface $utilEncodingService
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper\UnzerApiResponseMapperInterface $unzerApiResponseMapper
     */
    public function __construct(
        UnzerApiToUtilEncodingServiceInterface $utilEncodingService,
        UnzerApiResponseMapperInterface $unzerApiResponseMapper
    ) {
        $this->utilEncodingService = $utilEncodingService;
        $this->unzerApiResponseMapper = $unzerApiResponseMapper;
    }

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface $httpResponse
     * @param bool $isSuccessful
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer(
        UnzerApiToHttpResponseInterface $httpResponse,
        bool $isSuccessful = true
    ): UnzerApiResponseTransfer {
        $responseData = $this->utilEncodingService->decodeJson($httpResponse->getResponseBody(), true) ?? [];
        $unzerApiResponseTransfer = $this->createUnzerApiResponseTransfer($isSuccessful);
        $hasInternalError = isset($responseData[static::RESPONSE_DATA_KEY_IS_ERROR]) &&
            $responseData[static::RESPONSE_DATA_KEY_IS_ERROR] === true;

        if (!$isSuccessful || $hasInternalError) {
            return $this->addErrorToUnzerApiResponseTransfer($unzerApiResponseTransfer, $responseData);
        }

        return $this->unzerApiResponseMapper
            ->mapResponseDataToUnzerApiResponseTransfer($responseData, $unzerApiResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param array<string, mixed> $responseData
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function addErrorToUnzerApiResponseTransfer(
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        array $responseData = []
    ): UnzerApiResponseTransfer {
        $unzerApiErrorResponseTransfer = (new UnzerApiErrorResponseTransfer())
            ->fromArray($responseData, true);

        return $unzerApiResponseTransfer
            ->setIsSuccessful(false)
            ->setErrorResponse($unzerApiErrorResponseTransfer);
    }

    /**
     * @param bool $isSuccessful
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    protected function createUnzerApiResponseTransfer(bool $isSuccessful): UnzerApiResponseTransfer
    {
        return (new UnzerApiResponseTransfer())
            ->setIsSuccessful($isSuccessful);
    }
}
