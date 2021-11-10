<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreateBasketRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, <string, string|array>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiCreateBasketRequestTransfer = $unzerApiRequestTransfer->getCreateBasketRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT_TOTAL_GROSS => $unzerApiCreateBasketRequestTransfer->getAmountTotalGross(),
            UnzerApiRequestConstants::PARAM_CURRENCY_CODE => $unzerApiCreateBasketRequestTransfer->getCurrencyCode(),
            UnzerApiRequestConstants::PARAM_NOTE => $unzerApiCreateBasketRequestTransfer->getNote(),
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiCreateBasketRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_BASKET_ITEMS => $this->convertBasketItems($unzerApiCreateBasketRequestTransfer->getBasketItems()),
        ];
    }

    /**
     * @param \ArrayObject|array<\Generated\Shared\Transfer\UnzerBasketItemTransfer> $unzerBasketItemTransfers
     *
     * @return array<array<string, string>>
     */
    protected function convertBasketItems(ArrayObject $unzerBasketItemTransfers): array
    {
        $result = [];
        foreach ($unzerBasketItemTransfers as $unzerBasketItemTransfer) {
            $result[] = [
                UnzerApiRequestConstants::PARAM_BASKET_ITEM_REFERENCE_ID => $unzerBasketItemTransfer->getBasketItemReferenceId(),
                UnzerApiRequestConstants::PARAM_QUANTITY => (string)$unzerBasketItemTransfer->getQuantity(),
                UnzerApiRequestConstants::PARAM_AMOUNT_DISCOUNT => (string)$unzerBasketItemTransfer->getAmountDiscount(),
                UnzerApiRequestConstants::PARAM_AMOUNT_GROSS => (string)$unzerBasketItemTransfer->getAmountGross(),
                UnzerApiRequestConstants::PARAM_AMOUNT_VAT => (string)$unzerBasketItemTransfer->getAmountVat(),
                UnzerApiRequestConstants::PARAM_AMOUNT_PER_UNIT => (string)$unzerBasketItemTransfer->getAmountPerUnit(),
                UnzerApiRequestConstants::PARAM_AMOUNT_NET => (string)$unzerBasketItemTransfer->getAmountNet(),
                UnzerApiRequestConstants::PARAM_TITLE => $unzerBasketItemTransfer->getTitle(),
                UnzerApiRequestConstants::PARAM_PARTICIPANT_ID => $unzerBasketItemTransfer->getParticipantId(),
                UnzerApiRequestConstants::PARAM_TYPE => $unzerBasketItemTransfer->getType(),
            ];
        }

        return $result;
    }
}
