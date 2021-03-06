<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceRefundRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, array<string, array<int, array<string, int|float|string|null>>>|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiMarketplaceRefundRequestTransfer = $unzerApiRequestTransfer->getMarketplaceRefundRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE => $unzerApiMarketplaceRefundRequestTransfer->getPaymentReference(),
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiMarketplaceRefundRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_INVOICE_ID => $unzerApiMarketplaceRefundRequestTransfer->getInvoiceId(),
            UnzerApiRequestConstants::PARAM_CANCELED_BASKET => $this->getCanceledBasket($unzerApiMarketplaceRefundRequestTransfer->getCanceledBasket()),
        ];
    }

    /**
     * @param \ArrayObject<int, \Generated\Shared\Transfer\UnzerRefundItemTransfer> $unzerRefundItemTransfers
     *
     * @return array<string, array<int, array<string, int|float|string|null>>>
     */
    protected function getCanceledBasket(ArrayObject $unzerRefundItemTransfers): array
    {
        $items = [];
        foreach ($unzerRefundItemTransfers as $unzerRefundItemTransfer) {
            $items[] = [
                UnzerApiRequestConstants::PARAM_PARTICIPANT_ID => $unzerRefundItemTransfer->getParticipantId(),
                UnzerApiRequestConstants::PARAM_BASKET_ITEM_REFERENCE_ID => $unzerRefundItemTransfer->getBasketItemReferenceId(),
                UnzerApiRequestConstants::PARAM_QUANTITY => $unzerRefundItemTransfer->getQuantity(),
                UnzerApiRequestConstants::PARAM_AMOUNT_GROSS => (string)$unzerRefundItemTransfer->getAmountGross(),
            ];
        }

        return [
            UnzerApiRequestConstants::PARAM_ITEMS => $items,
        ];
    }
}
