<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiChargeResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class MarketplaceCreditCardChargeResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array<string, mixed> $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(
        array $responseData,
        UnzerApiResponseTransfer $unzerApiResponseTransfer
    ): UnzerApiResponseTransfer {
        $unzerApiMarketplaceCreditCardChargeResponseTransfer = (new UnzerApiChargeResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setCurrency($responseData[UnzerApiRequestConstants::PARAM_CURRENCY] ?? null)
            ->setOrderId($responseData[UnzerApiRequestConstants::PARAM_ORDER_ID] ?? null)
            ->setInvoiceId($responseData[UnzerApiRequestConstants::PARAM_INVOICE_ID] ?? null)
            ->setAmount($responseData[UnzerApiRequestConstants::PARAM_AMOUNT] ?? null);

        $unzerApiMarketplaceCreditCardChargeResponseTransfer = $this->mapResourcesDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_RESOURCES],
            $unzerApiMarketplaceCreditCardChargeResponseTransfer,
        );

        return $unzerApiResponseTransfer->setChargeResponse($unzerApiMarketplaceCreditCardChargeResponseTransfer);
    }

    /**
     * @param array<string, mixed> $resourcesData
     * @param \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiChargeResponseTransfer
     */
    protected function mapResourcesDataToUnzerApiMarketplaceCreditCardChargeResponseTransfer(
        array $resourcesData,
        UnzerApiChargeResponseTransfer $unzerApiChargeResponseTransfer
    ): UnzerApiChargeResponseTransfer {
        return $unzerApiChargeResponseTransfer
            ->setCustomerId($resourcesData[UnzerApiRequestConstants::PARAM_CUSTOMER_ID] ?? null)
            ->setPaymentId($resourcesData[UnzerApiRequestConstants::PARAM_PAYMENT_ID] ?? null)
            ->setBasketId($resourcesData[UnzerApiRequestConstants::PARAM_BASKET_ID] ?? null)
            ->setMetadataId($resourcesData[UnzerApiRequestConstants::PARAM_METADATA_ID] ?? null)
            ->setTraceId($resourcesData[UnzerApiRequestConstants::PARAM_TRACE_ID] ?? null)
            ->setTypeId($resourcesData[UnzerApiRequestConstants::PARAM_TYPE_ID] ?? null);
    }
}
