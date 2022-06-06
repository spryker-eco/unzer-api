<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use SprykerEco\Shared\UnzerApi\UnzerApiConstants;

class UnzerApiConfig extends AbstractBundleConfig
{
    /**
     * Specification:
     * - Get Unzer API `Set webhook` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiSetWebhookUrl(): string
    {
        return $this->get(UnzerApiConstants::WEBHOOK_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Create customer` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateCustomerUrl(): string
    {
        return $this->get(UnzerApiConstants::CUSTOMER_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Create basket` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateBasketUrl(): string
    {
        return $this->get(UnzerApiConstants::BASKET_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Create marketplace basket` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateMarketplaceBasketUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_BASKET_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Marketplace change` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceChargeUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_CHARGE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Charge` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiChargeUrl(): string
    {
        return $this->get(UnzerApiConstants::CHARGE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Marketplace CreditCard charge` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceCreditCardChargeUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_CREDIT_CARD_CHARGE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `CreditCard charge` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreditCardChargeUrl(): string
    {
        return $this->get(UnzerApiConstants::CREDIT_CARD_CHARGE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Get marketplace payment` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceGetPaymentUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_GET_PAYMENT_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Get payment` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiGetPaymentUrl(): string
    {
        return $this->get(UnzerApiConstants::GET_PAYMENT_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Create metadata` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateMetadataUrl(): string
    {
        return $this->get(UnzerApiConstants::METADATA_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Marketplace authorize` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceAuthorizeUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_AUTHORIZE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Authorize` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiAuthorizeUrl(): string
    {
        return $this->get(UnzerApiConstants::AUTHORIZE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Create payment resource` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreatePaymentResourceUrl(): string
    {
        return $this->get(UnzerApiConstants::CREATE_PAYMENT_RESOURCE_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Marketplace refund` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceRefundUrl(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_REFUND_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Refund` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiRefundUrl(): string
    {
        return $this->get(UnzerApiConstants::REFUND_URL);
    }

    /**
     * Specification:
     * - Get Unzer API `Get payment methods` URL.
     *
     * @api
     *
     * @return string
     */
    public function getUnzerApiGetPaymentMethodsUrl(): string
    {
        return $this->get(UnzerApiConstants::GET_PAYMENT_METHODS_URL);
    }

    /**
     * Specification:
     * - Get `is API logging enabled` flag.
     *
     * @api
     *
     * @return bool
     */
    public function isApiCallLoggingEnabled(): bool
    {
        return $this->get(UnzerApiConstants::LOG_API_CALLS);
    }
}
