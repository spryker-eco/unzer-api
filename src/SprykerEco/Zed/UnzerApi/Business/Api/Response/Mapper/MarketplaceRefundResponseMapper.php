<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceRefundResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiMarketplaceRefundResponseTransfer = (new UnzerApiMarketplaceRefundResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccess($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESS] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setCard3ds($responseData[UnzerApiRequestConstants::PARAM_CARD3DS] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiMarketplaceRefundResponseTransfer = $this->mapResourceDataToUnzerApiMarketplaceRefundResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES] ?? [],
            $unzerApiMarketplaceRefundResponseTransfer
        );

        $unzerApiMarketplaceRefundResponseTransfer = $this->mapProcessingDataToUnzerApiMarketplaceRefundResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiMarketplaceRefundResponseTransfer
        );

        $unzerApiMarketplaceRefundResponseTransfer = $this->mapMessageDataToResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiMarketplaceRefundResponseTransfer
        );

        return $unzerApiResponseTransfer
            ->setMarketplaceRefundResponse($unzerApiMarketplaceRefundResponseTransfer);
    }

    /**
     * @param array $resourceData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer
     */
    protected function mapResourceDataToUnzerApiMarketplaceRefundResponseTransfer(
        array $resourceData,
        UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
    ): UnzerApiMarketplaceRefundResponseTransfer {
        if (empty($resourceData)) {
            return $unzerApiMarketplaceRefundResponseTransfer;
        }

        return $unzerApiMarketplaceRefundResponseTransfer
            ->setCustomerId($resourceData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourceData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourceData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourceData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setTypeId($resourceData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null)
            ->setPayPageId($resourceData[UnzerApiRequestConstants::PARAM_PAY_PAGE_ID] ?? null)
            ->setTraceId($resourceData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null);
    }

    /**
     * @param array $processingData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiMarketplaceRefundResponseTransfer(
        array $processingData,
        UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
    ): UnzerApiMarketplaceRefundResponseTransfer {
        if (empty($processingData)) {
            return $unzerApiMarketplaceRefundResponseTransfer;
        }

        return $unzerApiMarketplaceRefundResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null)
            ->setParticipantId($processingData[UnzerApiRequestConstants::PARAM_PARTICIPANT_ID] ?? null);
    }

    /**
     * @param array $messageData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceRefundResponseTransfer
     */
    protected function mapMessageDataToResponseTransfer(
        array $messageData,
        UnzerApiMarketplaceRefundResponseTransfer $unzerApiMarketplaceRefundResponseTransfer
    ): UnzerApiMarketplaceRefundResponseTransfer {
        if (empty($messageData)) {
            return $unzerApiMarketplaceRefundResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setMerchant($messageData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null);

        return $unzerApiMarketplaceRefundResponseTransfer->setMessage($unzerApiMessageTransfer);
    }
}
