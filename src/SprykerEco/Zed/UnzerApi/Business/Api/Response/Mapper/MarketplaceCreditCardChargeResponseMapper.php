<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiChargeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiPaymentTransactionTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceCreditCardChargeResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(
        array $responseData,
        UnzerApiResponseTransfer $unzerApiResponseTransfer
    ): UnzerApiResponseTransfer {
        $unzerApiMarketplaceCreditCardChargeResponseTransfer = (new UnzerApiChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setOrderId($responseData[UnzerApiRequestConstants::PARAM_ORDER_ID] ?? null)
            ->setInvoiceId($responseData[UnzerApiRequestConstants::PARAM_INVOICE_ID] ?? null);

        $unzerApiMarketplaceCreditCardChargeResponseTransfer = $this->mapStateDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_STATE],
            $unzerApiMarketplaceCreditCardChargeResponseTransfer
        );

        $unzerApiMarketplaceCreditCardChargeResponseTransfer = $this->mapAmountDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_AMOUNT],
            $unzerApiMarketplaceCreditCardChargeResponseTransfer
        );

        $unzerApiMarketplaceCreditCardChargeResponseTransfer = $this->mapResourcesDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiMarketplaceCreditCardChargeResponseTransfer
        );

        $unzerApiMarketplaceCreditCardChargeResponseTransfer = $this->mapTransactionsDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_TRANSACTIONS],
            $unzerApiMarketplaceCreditCardChargeResponseTransfer
        );

        return $unzerApiResponseTransfer->setChargeResponse($unzerApiMarketplaceCreditCardChargeResponseTransfer);
    }

    /**
     * @param array $amountData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapAmountDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
        array $amountData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setAmountTotal($amountData[UnzerApiRequestConstants::PARAM_TOTAL] ?? null)
            ->setAmountCanceled($amountData[UnzerApiRequestConstants::PARAM_CANCELED] ?? null)
            ->setAmountCharged($amountData[UnzerApiRequestConstants::PARAM_CHARGED] ?? null)
            ->setAmountRemaining($amountData[UnzerApiRequestConstants::PARAM_REMAINING] ?? null);
    }

    /**
     * @param array $stateData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapStateDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
        array $stateData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setStateId($stateData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setStateName($stateData[UnzerApiRequestConstants::PARAM_NAME] ?? null);
    }

    /**
     * @param array $resourcesData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
        array $resourcesData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setCustomerId($resourcesData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourcesData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourcesData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourcesData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setTraceId($resourcesData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourcesData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $transactionsData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapTransactionsDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
        array $transactionsData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        $transactionTransfers = new ArrayObject();
        foreach ($transactionsData as $transactionData) {
            $transactionTransfer = $this->mapTransactionDataToTransactionTransfer($transactionData);

            $transactionTransfers->append($transactionTransfer);
        }

        $unzerApiChargeResponseTransfer->setTransactions($transactionTransfers);

        return $unzerApiChargeResponseTransfer;
    }

    /**
     * @param array $transactionData
     *
     * @return \Generated\Shared\Transfer\UnzerApiPaymentTransactionTransfer
     */
    protected function mapTransactionDataToTransactionTransfer(array $transactionData): UnzerApiPaymentTransactionTransfer
    {
        return (new UnzerApiPaymentTransactionTransfer())
            ->setParticipantId($transactionData[UnzerApiRequestConstants::PARAM_PARTICIPANT_ID] ?? null)
            ->setDate($transactionData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setType($transactionData[UnzerApiRequestConstants::PARAM_TYPE] ?? null)
            ->setStatus($transactionData[UnzerApiRequestConstants::PARAM_STATUS] ?? null)
            ->setUrl($transactionData[UnzerApiRequestConstants::PARAM_URL] ?? null)
            ->setAmount($transactionData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null);
    }
}
