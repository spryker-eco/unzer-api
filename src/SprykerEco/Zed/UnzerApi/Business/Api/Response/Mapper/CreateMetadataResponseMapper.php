<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Mapper;

use Generated\Shared\Transfer\UnzerApiCreateMetadataResponseTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Business\Api\Request\UnzerApiRequestConstants;

class CreateMetadataResponseMapper implements UnzerApiResponseMapperInterface
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
        $unzerApiCreateMetadataResponseTransfer = (new UnzerApiCreateMetadataResponseTransfer())
            ->setId($responseData[UnzerApiRequestConstants::PARAM_ID] ?? null);

        return $unzerApiResponseTransfer
            ->setCreateMetadataResponse($unzerApiCreateMetadataResponseTransfer);
    }
}
