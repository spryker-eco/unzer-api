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

class MarketplaceGetPaymentResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiMarketplaceGetPaymentResponseTransfer = (new UnzerApiGetPaymentResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setOrderId($responseData[UnzerApiRequestConstants::PARAM_ORDER_ID] ?? null)
            ->setInvoiceId($responseData[UnzerApiRequestConstants::PARAM_INVOICE_ID] ?? null);

        $unzerApiMarketplaceGetPaymentResponseTransfer = $this->mapStateDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_STATE],
            $unzerApiMarketplaceGetPaymentResponseTransfer,
        );

        $unzerApiMarketplaceGetPaymentResponseTransfer = $this->mapAmountDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_AMOUNT],
            $unzerApiMarketplaceGetPaymentResponseTransfer,
        );

        $unzerApiMarketplaceGetPaymentResponseTransfer = $this->mapResourcesDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiMarketplaceGetPaymentResponseTransfer,
        );

        $unzerApiMarketplaceGetPaymentResponseTransfer = $this->mapTransactionsDataToUnzerApiGetPaymentResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_TRANSACTIONS],
            $unzerApiMarketplaceGetPaymentResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setGetPaymentResponse($unzerApiMarketplaceGetPaymentResponseTransfer);
    }

    /**
     * @param array $stateData
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
     * @param array $approveData
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
     * @param array $resourcesData
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
     * @param array $transactionsData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentResponseTransfer
     */
    protected function mapTransactionsDataToUnzerApiGetPaymentResponseTransfer(
        array $transactionsData,
        UnzerApiGetPaymentResponseTransfer $unzerApiGetPaymentResponseTransfer
    ): UnzerApiGetPaymentResponseTransfer {
        $transactionTransfers = new ArrayObject();
        foreach ($transactionsData as $transaction) {
            $transactionTransfer = $this->mapDataToTransactionTransfer($transaction);
            $transactionTransfers->append($transactionTransfer);
        }

        $unzerApiGetPaymentResponseTransfer->setTransactions($transactionTransfers);

        return $unzerApiGetPaymentResponseTransfer;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\UnzerApiPaymentTransactionTransfer
     */
    protected function mapDataToTransactionTransfer(array $data): UnzerApiPaymentTransactionTransfer
    {
        return (new UnzerApiPaymentTransactionTransfer())
            ->setDate($data[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setType($data[UnzerApiRequestConstants::PARAM_TYPE] ?? null)
            ->setStatus($data[UnzerApiRequestConstants::PARAM_STATUS] ?? null)
            ->setUrl($data[UnzerApiRequestConstants::PARAM_URL] ?? null)
            ->setAmount($data[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null);
    }
}
