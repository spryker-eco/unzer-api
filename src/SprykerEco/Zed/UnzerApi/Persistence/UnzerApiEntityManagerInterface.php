<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Persistence;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;

interface UnzerApiEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    public function savePaymentUnzerApiLog(
        PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
    ): PaymentUnzerApiLogTransfer;
}
