<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter;

use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface;

class UnzerApiSetWebhookUrlResponseConverter implements UnzerApiResponseConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convertToResponseTransfer(UnzerApiGuzzleResponseInterface $response, bool $isSuccess = true): UnzerApiResponseTransfer
    {
        // TODO: Implement convertToResponseTransfer() method.
    }
}
