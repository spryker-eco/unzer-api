<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Logger;

use Generated\Shared\Transfer\UnzerApiResponseTransfer;

interface UnzerApiLoggerInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param string $requestBody
     * @param string $requestType
     * @param string $url
     *
     * @return void
     */
    public function logApiCall(
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        string $requestBody,
        string $requestType,
        string $url
    ): void;
}
