<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiChargeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class ChargeResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiChargeResponseTransfer = (new UnzerApiChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccess($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESS] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setRedirectUrl($responseData[UnzerApiRequestConstants::PARAM_REDIRECT_URL] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setReturnUrl($responseData[UnzerApiRequestConstants::PARAM_RETURN_URL] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiChargeResponseTransfer = $this->mapResourcesDataToUnzerApiResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiChargeResponseTransfer
        );

        $unzerApiChargeResponseTransfer = $this->mapProcessingDataToUnzerApiResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING],
            $unzerApiChargeResponseTransfer
        );

        $unzerApiChargeResponseTransfer = $this->mapMessageDataToUnzerApiResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE],
            $unzerApiChargeResponseTransfer
        );

        return $unzerApiResponseTransfer
            ->setChargeResponse($unzerApiChargeResponseTransfer);
    }

    /**
     * @param array $resourceData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiResponseTransfer(
        array $resourceData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (empty($resourceData)) {
            return $unzerApiChargeResponseTransfer;
        }

        return $unzerApiChargeResponseTransfer
            ->setCustomerId($resourceData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourceData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourceData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setTraceId($resourceData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourceData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $processingData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiResponseTransfer(
        array $processingData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (empty($processingData)) {
            return $unzerApiChargeResponseTransfer;
        }

        return $unzerApiChargeResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null);
    }

    /**
     * @param array $messageData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapMessageDataToUnzerApiResponseTransfer(
        array $messageData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        if (empty($messageData)) {
            return $unzerApiChargeResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($messageData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiChargeResponseTransfer
            ->setMessage($unzerApiMessageTransfer);
    }
}
