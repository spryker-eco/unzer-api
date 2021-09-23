<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiCreateCustomerResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreateCustomerResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiCreateCustomerResponseTransfer = (new UnzerApiCreateCustomerResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null);

        return $unzerApiResponseTransfer
            ->setCreateCustomerResponse($unzerApiCreateCustomerResponseTransfer);
    }
}
