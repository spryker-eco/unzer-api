<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreateMetadataRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array{createdAt: null|string, locale: null|string, priceMode: null|string, store: null|string}
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiCreateMetadataRequestTransfer = $unzerApiRequestTransfer->getCreateMetadataRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_STORE => $unzerApiCreateMetadataRequestTransfer->getStore(),
            UnzerApiRequestConstants::PARAM_LOCALE => $unzerApiCreateMetadataRequestTransfer->getLocale(),
            UnzerApiRequestConstants::PARAM_PRICE_MODE => $unzerApiCreateMetadataRequestTransfer->getPriceMode(),
            UnzerApiRequestConstants::PARAM_CREATED_AT => $unzerApiCreateMetadataRequestTransfer->getCreatedAt(),
        ];
    }
}
