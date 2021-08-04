<?php

namespace SprykerEco\Zed\UnzerApi\Business;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;

interface UnzerApiFacadeInterface
{
    /**
     * Specification:
     * - Send payment parameters for authorize payment systems.
     *
     * @api
     *
     * @param UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return UnzerApiResponseTransfer
     */
    public function performSetNotificationUrlApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Query available payment types for provided Unzer keypair.
     *
     * @api
     *
     * @param UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return UnzerApiResponseTransfer
     */
    public function performGetPaymentTypesForKeypairApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;
}
