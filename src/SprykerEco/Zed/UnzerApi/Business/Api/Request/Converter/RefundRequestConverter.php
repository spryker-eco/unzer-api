<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class RefundRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiRefundRequestTransfer = $unzerApiRequestTransfer->getRefundRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => $unzerApiRefundRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE => $unzerApiRefundRequestTransfer->getPaymentReference(),
            UnzerApiRequestConstants::PARAM_PAYMENT_ID => $unzerApiRefundRequestTransfer->getPaymentId(),
            UnzerApiRequestConstants::PARAM_CHARGE_ID => $unzerApiRefundRequestTransfer->getChargeId(),
        ];
    }

    /**
     * @param \ArrayObject|array<\Generated\Shared\Transfer\UnzerBasketItemTransfer> $unzerBasketItemTransfers
     *
     * @return array<array<string>>
     */
    protected function convertBasketItems(ArrayObject $unzerBasketItemTransfers): array
    {
        $result = [];
        foreach ($unzerBasketItemTransfers as $unzerBasketItemTransfer) {
            $result[] = [
                UnzerApiRequestConstants::PARAM_BASKET_ITEM_REFERENCE_ID => $unzerBasketItemTransfer->getBasketItemReferenceId(),
                UnzerApiRequestConstants::PARAM_UNIT => $unzerBasketItemTransfer->getUnit(),
                UnzerApiRequestConstants::PARAM_QUANTITY => $unzerBasketItemTransfer->getQuantity(),
                UnzerApiRequestConstants::PARAM_AMOUNT_DISCOUNT => $unzerBasketItemTransfer->getAmountDiscount(),
                UnzerApiRequestConstants::PARAM_VAT => $unzerBasketItemTransfer->getVat(),
                UnzerApiRequestConstants::PARAM_AMOUNT_GROSS => $unzerBasketItemTransfer->getAmountGross(),
                UnzerApiRequestConstants::PARAM_AMOUNT_VAT => $unzerBasketItemTransfer->getAmountVat(),
                UnzerApiRequestConstants::PARAM_AMOUNT_PER_UNIT => $unzerBasketItemTransfer->getAmountPerUnit(),
                UnzerApiRequestConstants::PARAM_AMOUNT_NET => $unzerBasketItemTransfer->getAmountNet(),
                UnzerApiRequestConstants::PARAM_TITLE => $unzerBasketItemTransfer->getTitle(),
                UnzerApiRequestConstants::PARAM_PARTICIPANT_ID => $unzerBasketItemTransfer->getParticipantId(),
                UnzerApiRequestConstants::PARAM_TYPE => $unzerBasketItemTransfer->getType(),
            ];
        }

        return $result;
    }
}
