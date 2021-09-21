<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Spryker\Service\UtilEncoding\UtilEncodingServiceInterface;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface;

class UnzerApiRequestBuilder implements UnzerApiRequestBuilderInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface
     */
    protected $unzerApiRequestConverter;

    /**
     * @var \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface
     */
    protected $utilEncodingService;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter\UnzerApiRequestConverterInterface $unzerApiRequestConverter
     * @param \Spryker\Service\UtilEncoding\UtilEncodingServiceInterface $utilEncodingService
     */
    public function __construct(
        UnzerApiRequestConverterInterface $unzerApiRequestConverter,
        UtilEncodingServiceInterface $utilEncodingService
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

        return $this->utilEncodingService->encodeJson($requestData);
    }
}
