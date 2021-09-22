<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use Generated\Shared\Transfer\UnzerApiSetWebhookResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class SetWebhookUrlResponseMapper implements UnzerApiResponseMapperInterface
{
    /**
     * @param array $responseData
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $responseTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function mapResponseDataToUnzerApiResponseTransfer(
        array $responseData,
        UnzerApiResponseTransfer $responseTransfer
    ): UnzerApiResponseTransfer {
        $unzerApiSetWebhookResponseTransfer = (new UnzerApiSetWebhookResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null)
            ->setEvent($responseData[UnzerApiRequestConstants::PARAM_EVENT] ?? null)
            ->setUrl($responseData[UnzerApiRequestConstants::PARAM_URL] ?? null);

        return $responseTransfer
            ->setSetWebhookResponse($unzerApiSetWebhookResponseTransfer);
    }
}
