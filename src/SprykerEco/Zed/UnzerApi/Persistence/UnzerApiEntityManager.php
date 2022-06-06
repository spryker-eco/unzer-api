<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Persistence;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;
use Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiPersistenceFactory getFactory()
 */
class UnzerApiEntityManager extends AbstractEntityManager implements UnzerApiEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    public function savePaymentUnzerApiLog(
        PaymentUnzerApiLogTransfer $paymentUnzerApiLogTransfer
    ): PaymentUnzerApiLogTransfer {
        $paymentUnzerApiLogEntity = (new SpyPaymentUnzerApiLog())
            ->fromArray($paymentUnzerApiLogTransfer->modifiedToArray());

        $paymentUnzerApiLogEntity->save();

        return $this->getFactory()->createUnzerApiMapper()
            ->mapPaymentUnzerApiLogEntityToPaymentUnzerApiLogTransfer(
                $paymentUnzerApiLogEntity,
                $paymentUnzerApiLogTransfer,
            );
    }
}
