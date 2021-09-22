<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;

interface UnzerApiFacadeInterface
{
    /**
     * Specification:
     * - Converts UnzerApiRequestTransfer to HTTP request.
     * - Performs Unzer Set Notification URL API call.
     * - Converts HTTP response to UnzerApiResponseTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performSetNotificationUrlApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;
}
