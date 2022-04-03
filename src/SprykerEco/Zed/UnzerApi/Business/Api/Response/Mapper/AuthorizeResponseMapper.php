<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiMessageTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class AuthorizeResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiAuthorizeResponseTransfer = (new UnzerApiAuthorizeResponseTransfer())
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

        $unzerApiAuthorizeResponseTransfer = $this->mapMessageDataToUnzerApiAuthorizeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_MESSAGE] ?? [],
            $unzerApiAuthorizeResponseTransfer,
        );

        $unzerApiAuthorizeResponseTransfer = $this->mapResourceDataToUnzerApiAuthorizeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES] ?? [],
            $unzerApiAuthorizeResponseTransfer,
        );

        $unzerApiAuthorizeResponseTransfer = $this->mapProcessingDataToUnzerApiAuthorizeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_PROCESSING] ?? [],
            $unzerApiAuthorizeResponseTransfer,
        );

        return $unzerApiResponseTransfer->setAuthorizeResponse($unzerApiAuthorizeResponseTransfer);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer
     */
    protected function mapMessageDataToUnzerApiAuthorizeResponseTransfer(
        array $responseData,
        UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
    ): UnzerApiAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiAuthorizeResponseTransfer;
        }

        $unzerApiMessageTransfer = (new UnzerApiMessageTransfer())->setCode($responseData[UnzerApiRequestConstants::PARAM_CODE] ?? null)
            ->setCustomer($responseData[UnzerApiRequestConstants::PARAM_CUSTOMER] ?? null)
            ->setMerchant($responseData[UnzerApiRequestConstants::PARAM_MERCHANT] ?? null);

        return $unzerApiAuthorizeResponseTransfer->setMessage($unzerApiMessageTransfer);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer
     */
    protected function mapResourceDataToUnzerApiAuthorizeResponseTransfer(
        array $responseData,
        UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
    ): UnzerApiAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiAuthorizeResponseTransfer;
        }

        return $unzerApiAuthorizeResponseTransfer
            ->setCustomerId($responseData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($responseData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setTraceId($responseData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($responseData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }

    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiAuthorizeResponseTransfer
     */
    protected function mapProcessingDataToUnzerApiAuthorizeResponseTransfer(
        array $responseData,
        UnzerApiAuthorizeResponseTransfer $unzerApiAuthorizeResponseTransfer
    ): UnzerApiAuthorizeResponseTransfer {
        if (!$responseData) {
            return $unzerApiAuthorizeResponseTransfer;
        }

        return $unzerApiAuthorizeResponseTransfer->setUniqueId($responseData[UnzerApiRequestConstants::PARAM_UNIQUE_ID] ?? null)
            ->setShortId($responseData[UnzerApiRequestConstants::PARAM_SHORT_ID] ?? null)
            ->setTraceId($responseData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null);
    }
}
