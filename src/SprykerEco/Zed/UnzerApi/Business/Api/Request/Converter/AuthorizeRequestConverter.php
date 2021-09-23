<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class AuthorizeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string,string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $request = $unzerApiRequestTransfer->getMarketplaceAuthorizeRequest();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => $request->getAmount(),
            UnzerApiRequestConstants::PARAM_CURRENCY => $request->getCurrency(),
            UnzerApiRequestConstants::PARAM_RETURN_URL => $request->getReturnUrl(),
            UnzerApiRequestConstants::PARAM_RESOURCES => [
                UnzerApiRequestConstants::PARAM_CUSTOMER_ID => $request->getCustomerId(),
                UnzerApiRequestConstants::PARAM_TYPE_ID => $request->getTypeId(),
            ],
        ];
    }
}
