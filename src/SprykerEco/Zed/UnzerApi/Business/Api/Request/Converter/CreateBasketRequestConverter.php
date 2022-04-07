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
     * @return array<string, array<int, array<string, string|null>>|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiCreateBasketRequestTransfer = $unzerApiRequestTransfer->getCreateBasketRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_TOTAL_VALUE_GROSS => (string)$unzerApiCreateBasketRequestTransfer->getAmountTotalGross(),
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiCreateBasketRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_CURRENCY_CODE => $unzerApiCreateBasketRequestTransfer->getCurrencyCode(),
            UnzerApiRequestConstants::PARAM_NOTE => $unzerApiCreateBasketRequestTransfer->getNote(),
            UnzerApiRequestConstants::PARAM_BASKET_ITEMS => $this->convertBasketItems($unzerApiCreateBasketRequestTransfer->getBasketItems()),
        ];
    }

    /**
     * @param \ArrayObject<\Generated\Shared\Transfer\UnzerBasketItemTransfer> $unzerBasketItemTransfers
     *
     * @return array<int, array<string, string|null>>
     */
    protected function convertBasketItems(ArrayObject $unzerBasketItemTransfers): array
    {
        $unzerBasketItems = [];
        foreach ($unzerBasketItemTransfers as $unzerBasketItemTransfer) {
            $unzerBasketItem = [
                UnzerApiRequestConstants::PARAM_TYPE => $unzerBasketItemTransfer->getType(),
                UnzerApiRequestConstants::PARAM_BASKET_ITEM_REFERENCE_ID => $unzerBasketItemTransfer->getBasketItemReferenceId(),
                UnzerApiRequestConstants::PARAM_QUANTITY => (string)$unzerBasketItemTransfer->getQuantity(),
                UnzerApiRequestConstants::PARAM_AMOUNT_PER_UNIT_GROSS => (string)$unzerBasketItemTransfer->getAmountPerUnit(),
                UnzerApiRequestConstants::PARAM_TITLE => $unzerBasketItemTransfer->getTitle(),
                UnzerApiRequestConstants::PARAM_VAT => $unzerBasketItemTransfer->getVat(),
                UnzerApiRequestConstants::PARAM_AMOUNT_DISCOUNT_PER_UNIT_GROSS => $unzerBasketItemTransfer->getAmountDiscount(),
            ];

            if ($unzerBasketItemTransfer->getParticipantId() !== null) {
                $unzerBasketItem[UnzerApiRequestConstants::PARAM_PARTICIPANT_ID] = $unzerBasketItemTransfer->getParticipantId();
            }

            $unzerBasketItems[] = $unzerBasketItem;
        }

        return $unzerBasketItems;
    }
}
