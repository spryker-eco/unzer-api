<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class RefundRequestConverter implements UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<string, string|null>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array
    {
        $unzerApiRefundRequestTransfer = $unzerApiRequestTransfer->getRefundRequestOrFail();

        return [
            UnzerApiRequestConstants::PARAM_AMOUNT => (string)$unzerApiRefundRequestTransfer->getAmount(),
            UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE => $unzerApiRefundRequestTransfer->getPaymentReference(),
            UnzerApiRequestConstants::PARAM_PAYMENT_ID => $unzerApiRefundRequestTransfer->getPaymentId(),
            UnzerApiRequestConstants::PARAM_CHARGE_ID => $unzerApiRefundRequestTransfer->getChargeId(),
        ];
    }
}
