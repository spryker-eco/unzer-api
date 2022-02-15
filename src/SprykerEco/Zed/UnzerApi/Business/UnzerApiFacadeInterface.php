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
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiSetWebhookRequest` to be set.
     * - Performs Unzer Set Notification URL API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performSetNotificationUrlApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiCreateCustomerRequest` to be set.
     * - Performs Unzer Create Customer API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateCustomerApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiUpdateCustomerRequest` to be set.
     * - Performs Unzer Update Customer API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performUpdateCustomerApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiCreateMetadataRequest` to be set.
     * - Performs Unzer Create Metadata API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateMetadataApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiCreateBasketRequest` to be set.
     * - Performs Unzer Create Basket API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateBasketApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiCreateBasketRequest` to be set.
     * - Performs Unzer Create Marketplace Basket API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateMarketplaceBasketApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiCreatePaymentResourceRequest` to be set.
     * - Performs Unzer Create Payment resource API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreatePaymentResourceApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiMarketplaceAuthorizeRequest` to be set.
     * - Performs Unzer Authorize Marketplace payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceAuthorizeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiAuthorizeRequest` to be set.
     * - Performs Unzer Authorize payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performAuthorizeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiMarketplaceGetPaymentRequest` to be set.
     * - Performs Unzer Get Marketplace Payment Info API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceGetPaymentApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiGetPaymentRequest` to be set.
     * - Performs Unzer Get Payment Info API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performGetPaymentApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiChargeRequest` to be set.
     * - Performs Unzer Marketplace Charge for authorizable payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceAuthorizableChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiChargeRequest` to be set.
     * - Performs Unzer Marketplace Charge for regular payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiChargeRequest` to be set.
     * - Performs Unzer Charge for authorizable payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performAuthorizableChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiChargeRequest` to be set.
     * - Performs Unzer Charge for regular payment API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiRefundRequest` to be set.
     * - Performs Unzer refund API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performRefundApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;

    /**
     * Specification:
     * - Requires `UnzerApiRequestTransfer::unzerKeypair` to be set.
     * - Requires `UnzerApiRequestTransfer::unzerApiMarketplaceRefundRequest` to be set.
     * - Performs Unzer marketplace partial refund API call.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceRefundApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer;
}
