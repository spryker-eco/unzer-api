<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiCreatePaymentResourceResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreatePaymentResourceResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiCreatePaymentResourceResponseTransfer = (new UnzerApiCreatePaymentResourceResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setMethod($responseData[UnzerApiRequestConstants::PARAM_METHOD] ?? null)
            ->setRecurring($responseData[UnzerApiRequestConstants::PARAM_RECURRING] ?? null);

        $unzerApiCreatePaymentResourceResponseTransfer = $this->mapGeolocationDataArrayToUnzerApiCreatePaymentResourceResponseTransfer(
            $responseData[UnzerApiRequestConstants::PARAM_GEO_LOCATION] ?? [],
            $unzerApiCreatePaymentResourceResponseTransfer,
        );

        return $unzerApiResponseTransfer
            ->setCreatePaymentResourceResponse($unzerApiCreatePaymentResourceResponseTransfer);
    }

    /**
     * @param array $geolocationData
     * @param \Generated\Shared\Transfer\UnzerApiCreatePaymentResourceResponseTransfer $unzerApiCreatePaymentResourceResponseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiCreatePaymentResourceResponseTransfer
     */
    protected function mapGeolocationDataArrayToUnzerApiCreatePaymentResourceResponseTransfer(
        array $geolocationData,
        UnzerApiCreatePaymentResourceResponseTransfer $unzerApiCreatePaymentResourceResponseTransfer
    ): UnzerApiCreatePaymentResourceResponseTransfer {
        if (!$geolocationData) {
            return $unzerApiCreatePaymentResourceResponseTransfer;
        }

        return $unzerApiCreatePaymentResourceResponseTransfer
            ->setClientIp($geolocationData[UnzerApiRequestConstants::PARAM_CLIENT_IP] ?? null)
            ->setCountryIsoA2($geolocationData[UnzerApiRequestConstants::PARAM_COUNTRY_ISO_A2] ?? null);
    }
}
