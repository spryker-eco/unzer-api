<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketPlaceAuthorizeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string,string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiMarketplaceAuthorizeRequestTransfer = $unzerApiRequestTransfer->getMarketplaceAuthorizeRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => $unzerApiMarketplaceAuthorizeRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_CURRENCY => $unzerApiMarketplaceAuthorizeRequestTransfer->getCurrency(),
            UnzerApiRequestConstants::PARAM_RETURN_URL => $unzerApiMarketplaceAuthorizeRequestTransfer->getReturnUrl(),
            UnzerApiRequestConstants::PARAM_RESOURCES => [
                UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getCustomerId(),
                UnzerApiRequestConstants::PARAM_TYPE_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getTypeId(),
                UnzerApiRequestConstants::PARAM_BASKET_ID => $unzerApiMarketplaceAuthorizeRequestTransfer->getBasketId(),
            ],
        ];
    }
}
