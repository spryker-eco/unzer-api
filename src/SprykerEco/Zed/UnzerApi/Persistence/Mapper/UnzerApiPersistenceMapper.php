<?php

namespace SprykerEco\Zed\UnzerApi\Persistence\Mapper;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;
use Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog;

class UnzerApiPersistenceMapper
{
    /**
     * @param \Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog $paymentUnzerApiLogEntity
     * @param \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    public function mapEntityToPaymentUnzerApiLogTransfer(
        SpyPaymentUnzerApiLog $paymentUnzerApiLogEntity,
        PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
    ): PaymentUnzerApiLogTransfer {
        $paymentUnzerApiLogTransfer->fromArray($paymentUnzerApiLogEntity->toArray(), true);

        return $paymentUnzerApiLogTransfer;
    }
}
