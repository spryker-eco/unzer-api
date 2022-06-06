<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceChargeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, array<string, string|null>|float|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiChargeRequestTransfer = $unzerApiRequestTransfer->getChargeRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => (string)$unzerApiChargeRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_CURRENCY => $unzerApiChargeRequestTransfer->getCurrency(),
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiChargeRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_INVOICE_ID => $unzerApiChargeRequestTransfer->getInvoiceId(),
            UnzerApiRequestConstants::PARAM_RETURN_URL => $unzerApiChargeRequestTransfer->getReturnUrl(),
            UnzerApiRequestConstants::PARAM_RESOURCES => [
                UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $unzerApiChargeRequestTransfer->getCustomerId(),
                UnzerApiRequestConstants::PARAM_TYPE_ID => $unzerApiChargeRequestTransfer->getTypeId(),
                UnzerApiRequestConstants::PARAM_BASKET_ID => $unzerApiChargeRequestTransfer->getBasketId(),
            ],
        ];
    }
}
