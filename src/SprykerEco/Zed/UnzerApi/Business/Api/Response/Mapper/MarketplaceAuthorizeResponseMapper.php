<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceAuthorizeResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiMarketplaceAuthorizeResponseTransfer = (new UnzerApiMarketplaceAuthorizeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setIsSuccessful($responseData[UnzerApiRequestConstants::PARAM_IS_SUCCESSFUL] ?? null)
            ->setIsPending($responseData[UnzerApiRequestConstants::PARAM_IS_PENDING] ?? null)
            ->setIsError($responseData[UnzerApiRequestConstants::PARAM_IS_ERROR] ?? null)
            ->setCard3ds($responseData[UnzerApiRequestConstants::PARAM_CARD3DS] ?? null)
            ->setRedirectUrl($responseData[UnzerApiRequestConstants::PARAM_REDIRECT_URL] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setReturnUrl($responseData[UnzerApiRequestConstants::PARAM_RETURN_URL] ?? null)
            ->setDate($responseData[UnzerApiRequestConstants::PARAM_DATE] ?? null)
            ->setPaymentReference($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_REFERENCE] ?? null);

        $unzerApiMarketplaceAuthorizeResponseTransfer = $this->mapMessageDataToResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiMarketplaceAuthorizeResponseTransfer,
        );
        $unzerApiMarketplaceAuthorizeResponseTransfer = $this->mapResourceDataToResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES] ?? [],
            $unzerApiMarketplaceAuthorizeResponseTransfer,
        );
        $unzerApiMarketplaceAuthorizeResponseTransfer = $this->mapProcessingDataToUnzerApiMarketplaceAuthorizeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiMarketplaceAuthorizeResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setMarketplaceAuthorizeResponse($unzerApiMarketplaceAuthorizeResponseTransfer);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer
     */
    protected function mapMessageDataToResponseTransfer(
        array $responseData,
        UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
    ): UnzerApiMarketplaceAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiMarketplaceAuthorizeResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())
            ->setCode($responseData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($responseData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($responseData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiMarketplaceAuthorizeResponseTransfer->setMessage($unzerApiMessageTransfer);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer
     */
    protected function mapResourceDataToResponseTransfer(
        array $responseData,
        UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
    ): UnzerApiMarketplaceAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiMarketplaceAuthorizeResponseTransfer;
        }

        return $unzerApiMarketplaceAuthorizeResponseTransfer
            ->setCustomerId($responseData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($responseData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setTraceId($responseData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($responseData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiMarketplaceAuthorizeResponseTransfer(
        array $responseData,
        UnzerApiMarketplaceAuthorizeResponseTransfer $unzerApiMarketplaceAuthorizeResponseTransfer
    ): UnzerApiMarketplaceAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiMarketplaceAuthorizeResponseTransfer;
        }

        return $unzerApiMarketplaceAuthorizeResponseTransfer
            ->setUniqueId($responseData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($responseData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null)
            ->setTraceId($responseData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setParticipantId($responseData[UnzerApiRequestConstants::PARAM_PARTICIPANT_ID] ?? null);
    }
}
