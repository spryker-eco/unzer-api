<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface;

class UnzerApiRequestBuilder implements UnzerApiRequestBuilderInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    protected $unzerApiRequestConverter;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface $unzerApiRequestConverter
     * @param \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceInterface $utilEncodingService
     */
    public function __construct(
        UnzerApiRequestConverterInterface $unzerApiRequestConverter,
        UnzerApiToUtilEncodingServiceInterface $utilEncodingService
    ) {
        $this->unzerApiRequestConverter = $unzerApiRequestConverter;
        $this->utilEncodingService = $utilEncodingService;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function buildRequestPayload(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        $requestData = $this->unzerApiRequestConverter->convertRequestTransferToArray($unzerApiRequestTransfer);

        return (string)$this->utilEncodingService->encodeJson($requestData);
    }
}
