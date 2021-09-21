<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Logger;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;

interface UnzerApiLoggerInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     * @param \Generated\Shared\Transfer\UnzerApiResponseTransfer $unzerApiResponseTransfer
     * @param string $requestType
     * @param string $url
     *
     * @return void
     */
    public function logApiCall(
        UnzerApiRequestTransfer $unzerApiRequestTransfer,
        UnzerApiResponseTransfer $unzerApiResponseTransfer,
        string $requestType,
        string $url
    ): void;
}
