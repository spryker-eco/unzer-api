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
     * @api
     *
     * @return string
     */
    public function getUnzerApiSetWebhookUrl(): string
    {
        return $this->get(UnzerApiConstants::WEBHOOK_RESOURCE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateCustomer(): string
    {
        return $this->get(UnzerApiConstants::CUSTOMER_RESOURCE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateBasket(): string
    {
        return $this->get(UnzerApiConstants::BASKET_RESOURCE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceCharge(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_CHARGE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCharge(): string
    {
        return $this->get(UnzerApiConstants::CHARGE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceCreditCardCharge(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_CREDIT_CARD_CHARGE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreditCardCharge(): string
    {
        return $this->get(UnzerApiConstants::CREDIT_CARD_CHARGE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceGetPayment(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_GET_PAYMENT_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiGetPayment(): string
    {
        return $this->get(UnzerApiConstants::GET_PAYMENT_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreateMetadata(): string
    {
        return $this->get(UnzerApiConstants::METADATA_RESOURCE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceAuthorize(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_AUTHORIZE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiAuthorize(): string
    {
        return $this->get(UnzerApiConstants::AUTHORIZE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiCreatePaymentResource(): string
    {
        return $this->get(UnzerApiConstants::CREATE_PAYMENT_RESOURCE_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiMarketplaceRefund(): string
    {
        return $this->get(UnzerApiConstants::MARKETPLACE_REFUND_URL);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getUnzerApiRefund(): string
    {
        return $this->get(UnzerApiConstants::REFUND_URL);
    }
}
