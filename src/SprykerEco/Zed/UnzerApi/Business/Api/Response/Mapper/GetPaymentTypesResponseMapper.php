<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use ArrayObject;
use Generated\Shared\Transfer\UnzerApiGetPaymentTypesResponseTransfer;
use Generated\Shared\Transfer\UnzerApiPaymentTypeTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class GetPaymentTypesResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(array $responseData, UnzerApiResponseTransfer $unzerApiResponseTransfer): UnzerApiResponseTransfer
    {
        $unzerApiGetPaymentTypesResponseTransfer = new UnzerApiGetPaymentTypesResponseTransfer();

        $unzerApiGetPaymentTypesResponseTransfer = $this->mapPaymentTypesDataToUnzerApiGetPaymentTypesResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_AVAILABLE_PAYMENT_TYPES],
            $unzerApiGetPaymentTypesResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setGetPaymentTypesResponse($unzerApiGetPaymentTypesResponseTransfer);
    }

    /**
     * @param array $paymentTypesData
     * @param \Generated\Shared\Transfer\UnzerApiGetPaymentTypesResponseTransfer $unzerApiGetPaymentTypesResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiGetPaymentTypesResponseTransfer
     */
    protected function mapPaymentTypesDataToUnzerApiGetPaymentTypesResponseTransfer(
        array $paymentTypesData,
        UnzerApiGetPaymentTypesResponseTransfer $unzerApiGetPaymentTypesResponseTransfer
    ): UnzerApiGetPaymentTypesResponseTransfer {
        $paymentTypes = new ArrayObject();
        foreach ($paymentTypesData as $paymentType) {
            $paymentTypeTransfer = $this->mapPaymentTypeDataToPaymentTypeTransfer($paymentType);
            $paymentTypes->append($paymentTypeTransfer);
        }

        return $unzerApiGetPaymentTypesResponseTransfer->setTypes($paymentTypes);
    }

    /**
     * @param string $paymentType
     *
     * @return \Generated\Shared\Transfer\UnzerApiPaymentTypeTransfer
     */
    protected function mapPaymentTypeDataToPaymentTypeTransfer(string $paymentType): UnzerApiPaymentTypeTransfer
    {
        return (new UnzerApiPaymentTypeTransfer())
            ->setType($paymentType);
    }
}
