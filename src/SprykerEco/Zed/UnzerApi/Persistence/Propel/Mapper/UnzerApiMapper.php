<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;
use Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog;

class UnzerApiMapper
{
    /**
     * @param \Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog $paymentUnzerApiLogEntity
     * @param \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    public function mapPaymentUnzerApiLogEntityToPaymentUnzerApiLogTransfer(
        SpyPaymentUnzerApiLog $paymentUnzerApiLogEntity,
        PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
    ): PaymentUnzerApiLogTransfer {
        return $paymentUnzerApiLogTransfer->fromArray($paymentUnzerApiLogEntity->toArray(), true);
    }
}
