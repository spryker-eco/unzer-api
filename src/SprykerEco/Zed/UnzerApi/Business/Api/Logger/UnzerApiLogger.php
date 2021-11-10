<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Logger;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface;

class UnzerApiLogger implements UnzerApiLoggerInterface
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface
     */
    protected $unzerApiEntityManager;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface $unzerApiEntityManager
     */
    public function __construct(UnzerApiEntityManagerInterface $unzerApiEntityManager)
    {
        $this->unzerApiEntityManager = $unzerApiEntityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param string $requestType
     * @param string $url
     *
     * @return void
     */
    public function logApiCall(
        UnzerApiRequestTransfer $unzerApiRequestTransfer,
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        string $requestType,
        string $url
    ): void {
        $paymentUnzerApiLog = $this->createPaymentUnzerApiLogTransfer(
            $unzerApiRequestTransfer,
            $unzerApiResponseTransfer,
            $requestType,
            $url,
        );

        $this->unzerApiEntityManager->savePaymentUnzerApiLog($paymentUnzerApiLog);
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $requestTransfer
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $responseTransfer
     * @param string $requestType
     * @param string $url
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    protected function createPaymentUnzerApiLogTransfer(
        UnzerApiRequestTransfer $requestTransfer,
        UnzerApiResponseTransfer $responseTransfer,
        string $requestType,
        string $url
    ): PaymentUnzerApiLogTransfer {
        return (new PaymentUnzerApiLogTransfer())
            ->setRequestType($requestType)
            ->setIsSuccess($responseTransfer->getIsSuccess())
            ->setRequest($requestTransfer->serialize())
            ->setResponse($responseTransfer->serialize())
            ->setUrl($url);
    }
}
