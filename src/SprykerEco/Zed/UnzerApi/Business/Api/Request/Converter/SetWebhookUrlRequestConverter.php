<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class SetWebhookUrlRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string,string>
     */
    public function convertRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiSetWebhookRequestTransfer = $unzerApiRequestTransfer->getSetWebhookRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_URL => $unzerApiSetWebhookRequestTransfer->getRetrieveUrl(),
            UnzerApiRequestConstants::PARAM_EVENT => $unzerApiSetWebhookRequestTransfer->getEventOrFail(),
        ];
    }
}
