<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreditCardChargeResponseMapper implements UnzerApiResponseMapperInterface
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
    ): UnzerApiResponseTransfer
    {
        $unzerApiCreditCardChargeResponseTransfer = (new UnzerApiCreditCardChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccess($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESS] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setCard3ds($responseData[UnzerApiRequestConstants::PARAM_CARD3DS] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiCreditCardChargeResponseTransfer = $this->mapResourcesDataToUnzerApiCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiCreditCardChargeResponseTransfer
        );

        $unzerApiCreditCardChargeResponseTransfer = $this->mapProcessingDataToUnzerApiCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiCreditCardChargeResponseTransfer
        );

        $unzerApiCreditCardChargeResponseTransfer = $this->mapMessageDataToUnzerApiCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiCreditCardChargeResponseTransfer
        );

        return $unzerApiResponseTransfer
            ->setCreditCardChargeResponse($unzerApiCreditCardChargeResponseTransfer);
    }

    /**
     * @param array $resourceData
     * @param \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiCreditCardChargeResponseTransfer(
        array $resourceData,
        UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
    ): UnzerApiCreditCardChargeResponseTransfer
    {
        if (empty($resourceData)) {
            return $unzerApiCreditCardChargeResponseTransfer;
        }

        return $unzerApiCreditCardChargeResponseTransfer
            ->setCustomerId($resourceData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourceData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourceData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourceData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setPayPageId($resourceData[UnzerApiRequestConstants::PARAM_PAY_PAGE_ID] ?? null)
            ->setTraceId($resourceData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourceData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $processingData
     * @param \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiCreditCardChargeResponseTransfer(
        array $processingData,
        UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
    ): UnzerApiCreditCardChargeResponseTransfer
    {
        if (empty($processingData)) {
            return $unzerApiCreditCardChargeResponseTransfer;
        }

        return $unzerApiCreditCardChargeResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null)
            ->setTraceId($processingData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null);
    }

    /**
     * @param array $messageData
     * @param \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiCreditCardChargeResponseTransfer
     */
    protected function mapMessageDataToUnzerApiCreditCardChargeResponseTransfer(
        array $messageData,
        UnzerApiCreditCardChargeResponseTransfer $unzerApiCreditCardChargeResponseTransfer
    ): UnzerApiCreditCardChargeResponseTransfer
    {
        if (empty($messageData)) {
            return $unzerApiCreditCardChargeResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($messageData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiCreditCardChargeResponseTransfer->setMessage($unzerApiMessageTransfer);
    }
}
