<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer;
use Generated\Shared\Transfer\UnzerApiPaymentTransactionTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class GetPaymentResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array<string, mixed> $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(
        array $responseData,
        UnzerApiResponseTransfer $unzerApiResponseTransfer
    ): UnzerApiResponseTransfer {
        $unzerApiGetPaymentResponseTransfer = (new UnzerApiGetPaymentResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setOrderId($responseData[UnzerApiRequestConstants::PARAM_ORDER_ID] ?? null)
            ->setInvoiceId($responseData[UnzerApiRequestConstants::PARAM_INVOICE_ID] ?? null);

        $unzerApiGetPaymentResponseTransfer = $this->mapStateDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_STATE],
            $unzerApiGetPaymentResponseTransfer,
        );

        $unzerApiGetPaymentResponseTransfer = $this->mapAmountDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_AMOUNT],
            $unzerApiGetPaymentResponseTransfer,
        );

        $unzerApiGetPaymentResponseTransfer = $this->mapResourcesDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiGetPaymentResponseTransfer,
        );

        $unzerApiGetPaymentResponseTransfer = $this->mapTransactionsDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_TRANSACTIONS],
            $unzerApiGetPaymentResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setGetPaymentResponse($unzerApiGetPaymentResponseTransfer);
    }

    /**
     * @param array<string, mixed> $stateData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer
     */
    protected function mapStateDataToUnzerApiGetPaymentResponseTransfer(
        array $stateData,
        UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
    ): UnzerApiGetPaymentResponseTransfer {
        return $unzerApiGetPaymentResponseTransfer
            ->setStateId($stateData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setStateName($stateData[UnzerApiRequestConstants::PARAM_NAME] ?? null);
    }

    /**
     * @param array<string, mixed> $approveData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer
     */
    protected function mapAmountDataToUnzerApiGetPaymentResponseTransfer(
        array $approveData,
        UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
    ): UnzerApiGetPaymentResponseTransfer {
        return $unzerApiGetPaymentResponseTransfer
            ->setAmountTotal($approveData[UnzerApiRequestConstants::PARAM_TOTAL] ?? null)
            ->setAmountCanceled($approveData[UnzerApiRequestConstants::PARAM_CANCELED] ?? null)
            ->setAmountCharged($approveData[UnzerApiRequestConstants::PARAM_CHARGED] ?? null)
            ->setAmountRemaining($approveData[UnzerApiRequestConstants::PARAM_REMAINING] ?? null);
    }

    /**
     * @param array<string, mixed> $resourcesData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiGetPaymentResponseTransfer(
        array $resourcesData,
        UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
    ): UnzerApiGetPaymentResponseTransfer {
        return $unzerApiGetPaymentResponseTransfer
            ->setCustomerId($resourcesData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourcesData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourcesData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourcesData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setPayPageId($resourcesData[UnzerApiRequestConstants::PARAM_PAY_PAGE_ID] ?? null)
            ->setTraceId($resourcesData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourcesData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array<string, mixed> $transactionsData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer
     */
    protected function mapTransactionsDataToUnzerApiGetPaymentResponseTransfer(
        array $transactionsData,
        UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
    ): UnzerApiGetPaymentResponseTransfer {
        $transactionTransfers = new ArrayObject();
        foreach ($transactionsData as $transactionData) {
            $transactionTransfer = $this->mapTransactionDataToTransactionTransfer($transactionData);
            $transactionTransfers->append($transactionTransfer);
        }

        return $unzerApiGetPaymentResponseTransfer->setTransactions($transactionTransfers);
    }

    /**
     * @param array<string, mixed> $transactionData
     *
     * @return \Generated\Shared\Transfer\UnzerApiPaymentTransactionTransfer
     */
    protected function mapTransactionDataToTransactionTransfer(array $transactionData): UnzerApiPaymentTransactionTransfer
    {
        return (new UnzerApiPaymentTransactionTransfer())
            ->setDate($transactionData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setType($transactionData[UnzerApiRequestConstants::PARAM_TYPE] ?? null)
            ->setStatus($transactionData[UnzerApiRequestConstants::PARAM_STATUS] ?? null)
            ->setUrl($transactionData[UnzerApiRequestConstants::PARAM_URL] ?? null)
            ->setAmount($transactionData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setParticipantId($transactionData[UnzerApiRequestConstants::PARAM_PARTICIPANT_ID] ?? null);
    }
}
