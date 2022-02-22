<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceAuthorizableChargeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiChargeRequestTransfer = $unzerApiRequestTransfer->getChargeRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiChargeRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_INVOICE_ID => $unzerApiChargeRequestTransfer->getInvoiceId(),
            UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE => $unzerApiChargeRequestTransfer->getPaymentReference(),
            UnzerApiRequestConstants::PARAM_AMOUNT => (string)$unzerApiChargeRequestTransfer->getAmount(),
        ];
    }
}
