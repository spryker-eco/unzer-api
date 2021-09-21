<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Client;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;

interface UnzerApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function sendRequest(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;
}
