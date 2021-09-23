<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Response\Converter;

use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface;

interface UnzerApiResponseConverterInterface
{
    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface $httpResponse
     * @param bool $isSuccess
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function convertUnzerApiGuzzleResponseToUnzerApiResponseTransfer(
        UnzerApiToHttpResponseInterface $httpResponse,
        bool $isSuccess = true
    ): UnzerApiResponseTransfer;
}
