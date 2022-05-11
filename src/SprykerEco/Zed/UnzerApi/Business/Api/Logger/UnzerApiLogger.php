<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Logger;

use Generated\Shared\Transfer\PaymentUnzerApiLogTransfer;
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
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param string $requestBody
     * @param string $requestType
     * @param string $url
     *
     * @return void
     */
    public function logApiCall(
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        string $requestBody,
        string $requestType,
        string $url
    ): void {
        $paymentUnzerApiLogTransfer = $this->createPaymentUnzerApiLogTransfer(
            $requestBody,
            $unzerApiResponseTransfer,
            $requestType,
            $url,
        );

        $this->unzerApiEntityManager->savePaymentUnzerApiLog($paymentUnzerApiLogTransfer);
    }

    /**
     * @param string $requestBody
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $responseTransfer
     * @param string $requestType
     * @param string $url
     *
     * @return \Generated\Shared\Transfer\PaymentUnzerApiLogTransfer
     */
    protected function createPaymentUnzerApiLogTransfer(
        string $requestBody,
        UnzerApiResponseTransfer $responseTransfer,
        string $requestType,
        string $url
    ): PaymentUnzerApiLogTransfer {
        return (new PaymentUnzerApiLogTransfer())
            ->setRequestType($requestType)
            ->setIsSuccessful($responseTransfer->getIsSuccessful())
            ->setRequest($requestBody)
            ->setResponse($responseTransfer->serialize())
            ->setUrl($url);
    }
}
