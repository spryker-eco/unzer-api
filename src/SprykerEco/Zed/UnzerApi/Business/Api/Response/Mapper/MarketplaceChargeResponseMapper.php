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

class MarketplaceChargeResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiMarketplaceChargeResponseTransfer = (new UnzerApiChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccessful($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESSFUL] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setRedirectUrl($responseData[UnzerApiRequestConstants::PARAM_REDIRECT_URL] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setReturnUrl($responseData[UnzerApiRequestConstants::PARAM_RETURN_URL] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setOrderId($responseData[UnzerApiRequestConstants::PARAM_ORDER_ID] ?? null)
            ->setInvoiceId($responseData[UnzerApiRequestConstants::PARAM_INVOICE_ID] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiMarketplaceChargeResponseTransfer = $this->mapResourcesDataToUnzerApiMarketplaceChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiMarketplaceChargeResponseTransfer,
        );

        $unzerApiMarketplaceChargeResponseTransfer = $this->mapProcessingDataToUnzerApiMarketplaceChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING],
            $unzerApiMarketplaceChargeResponseTransfer,
        );

        $unzerApiMarketplaceChargeResponseTransfer = $this->mapMessageDataToUnzerApiMarketplaceChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE],
            $unzerApiMarketplaceChargeResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setChargeResponse($unzerApiMarketplaceChargeResponseTransfer);
    }

    /**
     * @param array<string,mixed> $resourcesData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiMarketplaceChargeResponseTransfer(
        array $resourcesData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setCustomerId($resourcesData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourcesData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourcesData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setTraceId($resourcesData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourcesData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array<string,mixed> $processingData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiMarketplaceChargeResponseTransfer(
        array $processingData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setUniqueId($processingData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($processingData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null);
    }

    /**
     * @param array<string,mixed> $messageData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapMessageDataToUnzerApiMarketplaceChargeResponseTransfer(
        array $messageData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        $messageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($messageData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($messageData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($messageData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiChargeResponseTransfer
            ->setMessage($messageTransfer);
    }
}
