<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceRefundRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string,string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
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
     * @param \ArrayObject|\Generated\Shared\Transfer\UnzerRefundItemTransfer[] $unzerRefundItemTransfers
     *
     * @return array<string<string,string>
     */
    protected function getCanceledBasket(ArrayObject $unzerRefundItemTransfers)
    {
        $items = [];
        foreach ($unzerRefundItemTransfers as $unzerRefundItemTransfer) {
            $items[] = [
                UnzerApiRequestConstants::PARAM_PARTICIPANT_ID => $unzerRefundItemTransfer->getParticipantId(),
                UnzerApiRequestConstants::PARAM_BASKET_ITEM_REFERENCE_ID => $unzerRefundItemTransfer->getBasketItemReferenceId(),
                UnzerApiRequestConstants::PARAM_QUANTITY => $unzerRefundItemTransfer->getQuantity(),
                UnzerApiRequestConstants::PARAM_AMOUNT_GROSS => $unzerRefundItemTransfer->getAmountGross(),
            ];
        }

        return [
            UnzerApiRequestConstants::PARAM_ITEMS => $items,
        ];
    }
}
