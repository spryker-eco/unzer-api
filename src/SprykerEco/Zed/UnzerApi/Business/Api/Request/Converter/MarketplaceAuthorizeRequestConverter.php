<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceAuthorizeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, array<string, string|null>|string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiMarketplaceAuthorizeRequestTransfer = $unzerApiRequestTransfer->getMarketplaceAuthorizeRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => (string)$unzerApiMarketplaceAuthorizeRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_CURRENCY => $unzerApiMarketplaceAuthorizeRequestTransfer->getCurrency(),
            UnzerApiRequestConstants::PARAM_RETURN_URL => $unzerApiMarketplaceAuthorizeRequestTransfer->getReturnUrl(),
            UnzerApiRequestConstants::PARAM_ORDER_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getOrderId(),
            UnzerApiRequestConstants::PARAM_RESOURCES => [
                UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getCustomerId(),
                UnzerApiRequestConstants::PARAM_TYPE_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getTypeId(),
                UnzerApiRequestConstants::PARAM_BASKET_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getBasketId(),
            ],
        ];
    }
}
