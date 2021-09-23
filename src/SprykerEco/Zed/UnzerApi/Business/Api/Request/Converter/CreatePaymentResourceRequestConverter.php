<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;

class CreatePaymentResourceRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        return [];
    }
}
