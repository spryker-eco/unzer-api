<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiRefundResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class RefundResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiRefundResponseTransfer = (new UnzerApiRefundResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccessful($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESSFUL] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null);

        $unzerApiRefundResponseTransfer = $this->mapResourcesToUnzerApiRefundResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES] ?? [],
            $unzerApiRefundResponseTransfer,
        );

        $unzerApiRefundResponseTransfer = $this->mapProcessingDataToUnzerApiRefundResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiRefundResponseTransfer,
        );

        $unzerApiRefundResponseTransfer = $this->mapMessageDataToUnzerApiRefundResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiRefundResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setRefundResponse($unzerApiRefundResponseTransfer);
    }

    /**
     * @param array $data
     * @param \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer
     */
    protected function mapResourcesToUnzerApiRefundResponseTransfer(
        array $data,
        UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
    ): UnzerApiRefundResponseTransfer {
        if (!$data) {
            return $unzerApiRefundResponseTransfer;
        }

        return $unzerApiRefundResponseTransfer
            ->setCustomerId($data[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($data[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($data[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($data[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setTypeId($data[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $processingData
     * @param \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiRefundResponseTransfer(
        array $processingData,
        UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
    ): UnzerApiRefundResponseTransfer {
        if (!$processingData) {
            return $unzerApiRefundResponseTransfer;
        }

        return $unzerApiRefundResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null);
    }

    /**
     * @param array $messageData
     * @param \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiRefundResponseTransfer
     */
    protected function mapMessageDataToUnzerApiRefundResponseTransfer(
        array $messageData,
        UnzerApiRefundResponseTransfer $unzerApiRefundResponseTransfer
    ): UnzerApiRefundResponseTransfer {
        if (!$messageData) {
            return $unzerApiRefundResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null);

        return $unzerApiRefundResponseTransfer->setMessage($unzerApiMessageTransfer);
    }
}
