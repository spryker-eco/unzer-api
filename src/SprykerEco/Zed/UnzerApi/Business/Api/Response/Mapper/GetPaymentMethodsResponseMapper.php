<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiGetPaymentMethodsResponseTransfer;
use Generated\Shared\Transfer\UnzerApiPaymentMethodTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class GetPaymentMethodsResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(array $responseData, UnzerApiResponseTransfer $unzerApiResponseTransfer): UnzerApiResponseTransfer
    {
        $unzerApiGetPaymentMethodsResponseTransfer = $this->mapPaymentMethodsDataToUnzerApiGetPaymentMethodsResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_AVAILABLE_PAYMENT_METHODS],
            new UnzerApiGetPaymentMethodsResponseTransfer(),
        );

        return $unzerApiResponseTransfer->setGetPaymentMethodsResponse($unzerApiGetPaymentMethodsResponseTransfer);
    }

    /**
     * @param array $paymentMethodsData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentMethodsResponseTransfer $unzerApiGetPaymentMethodsResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentMethodsResponseTransfer
     */
    protected function mapPaymentMethodsDataToUnzerApiGetPaymentMethodsResponseTransfer(
        array $paymentMethodsData,
        UnzerApiGetPaymentMethodsResponseTransfer $unzerApiGetPaymentMethodsResponseTransfer
    ): UnzerApiGetPaymentMethodsResponseTransfer {
        foreach ($paymentMethodsData as $paymentMethodKey) {
            $unzerApiPaymentMethodTransfer = (new UnzerApiPaymentMethodTransfer())->setPaymentMethodKey(strtolower($paymentMethodKey));

            $unzerApiGetPaymentMethodsResponseTransfer->addPaymentMethod($unzerApiPaymentMethodTransfer);
        }

        return $unzerApiGetPaymentMethodsResponseTransfer;
    }
}
