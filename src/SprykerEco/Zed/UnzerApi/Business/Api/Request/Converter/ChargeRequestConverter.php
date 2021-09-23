<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class ChargeRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string,string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiChargeRequestTransfer = $unzerApiRequestTransfer->getChargeRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => $unzerApiChargeRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_CURRENCY => $unzerApiChargeRequestTransfer->getCurrency(),
            UnzerApiRequestConstants::PARAM_RETURN_URL => $unzerApiChargeRequestTransfer->getReturnUrl(),
            UnzerApiRequestConstants::PARAM_RESOURCES => [
                UnzerApiRequestConstants::PARAM_TYPE_ID => $unzerApiChargeRequestTransfer->getTypeId(),
            ],
        ];
    }
}
