<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;

class MarketplaceGetPaymentRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, mixed>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        return [];
    }
}
