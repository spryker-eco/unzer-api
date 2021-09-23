<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class AuthorizableChargeRequestConverter implements UnzerApiRequestConverterInterface
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
        ];
    }
}
