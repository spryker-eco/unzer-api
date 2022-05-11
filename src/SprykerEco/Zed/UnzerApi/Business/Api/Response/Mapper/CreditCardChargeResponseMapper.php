<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiChargeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreditCardChargeResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array<string,mixed> $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(
        array $responseData,
        UnzerApiResponseTransfer $unzerApiResponseTransfer
    ): UnzerApiResponseTransfer {
        $unzerApiChargeResponseTransfer = (new UnzerApiChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccessful($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESSFUL] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiChargeResponseTransfer = $this->mapResourcesDataToUnzerApiChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiChargeResponseTransfer,
        );

        $unzerApiChargeResponseTransfer = $this->mapProcessingDataToUnzerApiChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiChargeResponseTransfer,
        );

        $unzerApiChargeResponseTransfer = $this->mapMessageDataToUnzerApiChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiChargeResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setChargeResponse($unzerApiChargeResponseTransfer);
    }

    /**
     * @param array<string,mixed> $resourceData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiChargeResponseTransfer(
        array $resourceData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (!$resourceData) {
            return $unzerApiChargeResponseTransfer;
        }

        return $unzerApiChargeResponseTransfer
            ->setCustomerId($resourceData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourceData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourceData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourceData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setTraceId($resourceData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourceData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array<string,mixed> $processingData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiChargeResponseTransfer(
        array $processingData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (!$processingData) {
            return $unzerApiChargeResponseTransfer;
        }

        return $unzerApiChargeResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null)
            ->setTraceId($processingData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null);
    }

    /**
     * @param array<string,mixed> $messageData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapMessageDataToUnzerApiChargeResponseTransfer(
        array $messageData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (!$messageData) {
            return $unzerApiChargeResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($messageData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiChargeResponseTransfer->setMessage($unzerApiMessageTransfer);
    }
}
