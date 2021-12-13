<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi;

use Codeception\Actor;
use Codeception\Scenario;
use Generated\Shared\Transfer\UnzerAddressTransfer;
use Generated\Shared\Transfer\UnzerApiAuthorizeRequestTransfer;
use Generated\Shared\Transfer\UnzerApiChargeRequestTransfer;
use Generated\Shared\Transfer\UnzerApiCreateBasketRequestTransfer;
use Generated\Shared\Transfer\UnzerApiCreateCustomerRequestTransfer;
use Generated\Shared\Transfer\UnzerApiCreateMetadataRequestTransfer;
use Generated\Shared\Transfer\UnzerApiCreatePaymentResourceRequestTransfer;
use Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeRequestTransfer;
use Generated\Shared\Transfer\UnzerApiMarketplaceRefundRequestTransfer;
use Generated\Shared\Transfer\UnzerApiRefundRequestTransfer;
use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiSetWebhookRequestTransfer;
use Generated\Shared\Transfer\UnzerApiUpdateCustomerRequestTransfer;
use Generated\Shared\Transfer\UnzerBasketItemTransfer;
use Generated\Shared\Transfer\UnzerKeypairTransfer;
use SprykerEco\Shared\UnzerApi\UnzerApiConstants;
use SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceBridge;
use SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManager;
use SprykerEco\Zed\UnzerApi\UnzerApiConfig;

/**
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class UnzerApiZedTester extends Actor
{
    use _generated\UnzerApiZedTesterActions;

    /**
     * @var int
     */
    public const SPRYKER_CUSTOMER_ID = 1;

    /**
     * @var string
     */
    public const CUSTOMER_FIRSTNAME = 'Max';

    /**
     * @var string
     */
    public const CUSTOMER_LASTNAME = 'Mustermann';

    /**
     * @var string
     */
    public const CUSTOMER_CITY = 'Berlin';

    /**
     * @var string
     */
    public const CUSTOMER_COUNTRY = 'Germany';

    /**
     * @var string
     */
    public const CUSTOMER_ZIP = '0000';

    /**
     * @var string
     */
    public const CUSTOMER_STREET = 'Test street';

    /**
     * @var string
     */
    public const CUSTOMER_STATE = 'DE';

    /**
     * @var string
     */
    public const CUSTOMER_MOBILE = '000000';

    /**
     * @var string
     */
    public const CUSTOMER_PHONE = '1111111';

    /**
     * @var string
     */
    public const CUSTOMER_EMAIL = 'max@spryker.local';

    /**
     * @var string
     */
    public const CUSTOMER_BIRTHDATE = '01.01.1970';

    /**
     * @var string
     */
    public const CUSTOMER_COMPANY = 'Spryker';

    /**
     * @var string
     */
    public const CUSTOMER_SALUTATION = 'Mr';

    /**
     * @var string
     */
    public const METADATA_STORE = 'DE';

    /**
     * @var string
     */
    public const METADATA_PRICE_MODE = 'Gross';

    /**
     * @var string
     */
    public const METADATA_LOCALE = 'de';

    /**
     * @var string
     */
    public const PAYMENT_METHOD_SOFORT = 'sofort';

    /**
     * @var string
     */
    public const WEBHOOK_EVENT = 'all';

    /**
     * @var string
     */
    public const WEBHOOK_URL = 'https://unzer-spryker.com';

    /**
     * @var string
     */
    public const BASKET_ORDER_ID = 'spryker-order-id-2';

    /**
     * @var string
     */
    public const BASKET_NOTE = 'note';

    /**
     * @var string
     */
    public const BASKET_CURRENCY_CODE = 'EUR';
    public const BASKET_AMOUNT_TOTAL_GROSS = 723.46;

    /**
     * @var string
     */
    public const BASKET_ITEM_TYPE = 'Wire';

    /**
     * @var string
     */
    public const BASKET_ITEM_PARTICIPANT_ID = '000000';

    /**
     * @var string
     */
    public const BASKET_ITEM_TITLE = 'Canon Self-Shot';
    public const BASKET_ITEM_AMOUNT_PER_UNIT = 123.00;
    public const BASKET_ITEM_AMOUNT_GROSS = 123.00;

    /**
     * @var string
     */
    public const BASKET_ITEM_REFERENCE_ID = 'spryker-sku-1';

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->setUpConfig();
    }

    /**
     * @return void
     */
    protected function setUpConfig(): void
    {
        $this->setConfig(UnzerApiConstants::WEBHOOK_RESOURCE_URL, 'https://api.unzer.com/v1/webhooks');
        $this->setConfig(UnzerApiConstants::CUSTOMER_RESOURCE_URL, 'https://api.unzer.com/v1/customers/%s');
        $this->setConfig(UnzerApiConstants::BASKET_RESOURCE_URL, 'https://api.unzer.com/v1/baskets');
        $this->setConfig(UnzerApiConstants::MARKETPLACE_AUTHORIZE_URL, 'https://api.unzer.com/v1/marketplace/payments/authorize');
        $this->setConfig(UnzerApiConstants::AUTHORIZE_URL, 'https://api.unzer.com/v1/payments/authorize');
        $this->setConfig(UnzerApiConstants::METADATA_RESOURCE_URL, 'https://api.unzer.com/v1/metadata');
        $this->setConfig(UnzerApiConstants::MARKETPLACE_GET_PAYMENT_URL, 'https://api.unzer.com/v1/marketplace/payments');
        $this->setConfig(UnzerApiConstants::GET_PAYMENT_URL, 'https://api.unzer.com/v1/payments/%s');
        $this->setConfig(UnzerApiConstants::CHARGE_URL, 'https://api.unzer.com/v1/payments/charges');
        $this->setConfig(UnzerApiConstants::MARKETPLACE_CHARGE_URL, 'https://api.unzer.com/v1/marketplace/payments/charges');
        $this->setConfig(UnzerApiConstants::MARKETPLACE_CREDIT_CARD_CHARGE_URL, 'https://api.unzer.com/v1/marketplace/payments/%s/charges');
        $this->setConfig(UnzerApiConstants::CREDIT_CARD_CHARGE_URL, 'https://api.unzer.com/v1/payments/%s/charges');
        $this->setConfig(UnzerApiConstants::CREATE_PAYMENT_RESOURCE_URL, 'https://api.unzer.com/v1/types/%s');
        $this->setConfig(UnzerApiConstants::MARKETPLACE_REFUND_URL, 'https://api.unzer.com/v1/marketplace/payments/%s/charges/%s/cancels');
        $this->setConfig(UnzerApiConstants::REFUND_URL, 'https://api.unzer.com/v1/payments/%s/charges/%s/cancels');
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\UnzerApiConfig
     */
    public function createConfig(): UnzerApiConfig
    {
        return new UnzerApiConfig();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManager
     */
    public function createEntityManager(): UnzerApiEntityManager
    {
        return new UnzerApiEntityManager();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\Service\UnzerApiToUtilEncodingServiceBridge
     */
    public function createUtilEncodingService(): UnzerApiToUtilEncodingServiceBridge
    {
        return new UnzerApiToUtilEncodingServiceBridge($this->getLocator()->utilEncoding()->service());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiRequestTransfer
     */
    public function createUnzerApiRequestTransfer(): UnzerApiRequestTransfer
    {
        return (new UnzerApiRequestTransfer())
            ->setUnzerKeypair($this->createUnzerKeypairTransfer())
            ->setCreateCustomerRequest($this->createUnzerApiCreateCustomerTransfer())
            ->setUpdateCustomerRequest($this->createUnzerApiUpdateCustomerTransfer())
            ->setCreateMetadataRequest($this->createUnzerApiCreateMetadataRequestTransfer())
            ->setCreatePaymentResourceRequest($this->createUnzerApiCreatePaymentResourceRequestTransfer())
            ->setSetWebhookRequest($this->createUnzerApiSetWebhookRequestTransfer())
            ->setCreateBasketRequest($this->createUnzerApiCreateBasketRequestTransfer())
            ->setAuthorizeRequest($this->createUnzerApiAuthorizeRequestTransfer())
            ->setMarketplaceAuthorizeRequest($this->createUnzerApiMarketplaceAuthorizeRequestTransfer())
            ->setChargeRequest($this->createUnzerApiChargeRequestTransfer())
            ->setRefundRequest($this->createUnzerApiRefundRequestTransfer())
            ->setMarketplaceRefundRequest($this->createUnzerApiMarketplaceRefundRequestTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerKeypairTransfer
     */
    protected function createUnzerKeypairTransfer(): UnzerKeypairTransfer
    {
        return (new UnzerKeypairTransfer())->setPrivateKey('');
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiCreateCustomerRequestTransfer
     */
    protected function createUnzerApiCreateCustomerTransfer(): UnzerApiCreateCustomerRequestTransfer
    {
        return (new UnzerApiCreateCustomerRequestTransfer())
            ->setCustomerId(static::SPRYKER_CUSTOMER_ID)
            ->setLastname(static::CUSTOMER_LASTNAME)
            ->setFirstname(static::CUSTOMER_FIRSTNAME)
            ->setSalutation(static::CUSTOMER_SALUTATION)
            ->setCompany(static::CUSTOMER_COMPANY)
            ->setBirthDate(static::CUSTOMER_BIRTHDATE)
            ->setEmail(static::CUSTOMER_EMAIL)
            ->setPhone(static::CUSTOMER_PHONE)
            ->setMobile(static::CUSTOMER_MOBILE)
            ->setShippingAddress($this->createUnzerAddressTransfer())
            ->setBillingAddress($this->createUnzerAddressTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiUpdateCustomerRequestTransfer
     */
    protected function createUnzerApiUpdateCustomerTransfer(): UnzerApiUpdateCustomerRequestTransfer
    {
        return (new UnzerApiUpdateCustomerRequestTransfer())
            ->setCustomerId(static::SPRYKER_CUSTOMER_ID)
            ->setLastname(static::CUSTOMER_LASTNAME)
            ->setFirstname(static::CUSTOMER_FIRSTNAME)
            ->setSalutation(static::CUSTOMER_SALUTATION)
            ->setCompany(static::CUSTOMER_COMPANY)
            ->setBirthDate(static::CUSTOMER_BIRTHDATE)
            ->setEmail(static::CUSTOMER_EMAIL)
            ->setPhone(static::CUSTOMER_PHONE)
            ->setMobile(static::CUSTOMER_MOBILE)
            ->setShippingAddress($this->createUnzerAddressTransfer())
            ->setBillingAddress($this->createUnzerAddressTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerAddressTransfer
     */
    protected function createUnzerAddressTransfer(): UnzerAddressTransfer
    {
        return (new UnzerAddressTransfer())
            ->setState(static::CUSTOMER_STATE)
            ->setStreet(static::CUSTOMER_STREET)
            ->setZip(static::CUSTOMER_ZIP)
            ->setCountry(static::CUSTOMER_COUNTRY)
            ->setCity(static::CUSTOMER_CITY)
            ->setName(static::CUSTOMER_LASTNAME . ' ' . static::CUSTOMER_FIRSTNAME);
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiCreateMetadataRequestTransfer
     */
    protected function createUnzerApiCreateMetadataRequestTransfer(): UnzerApiCreateMetadataRequestTransfer
    {
        return (new UnzerApiCreateMetadataRequestTransfer())
            ->setCreatedAt(time())
            ->setStore(static::METADATA_STORE)
            ->setLocale(static::METADATA_LOCALE)
            ->setPriceMode(static::METADATA_PRICE_MODE);
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiCreateBasketRequestTransfer
     */
    protected function createUnzerApiCreateBasketRequestTransfer(): UnzerApiCreateBasketRequestTransfer
    {
        return (new UnzerApiCreateBasketRequestTransfer())
            ->setAmountTotalGross(static::BASKET_AMOUNT_TOTAL_GROSS)
            ->setCurrencyCode(static::BASKET_CURRENCY_CODE)
            ->setNote(static::BASKET_NOTE)
            ->setOrderId(static::BASKET_ORDER_ID)
            ->addBasketItem($this->createUnzerBasketItemTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiSetWebhookRequestTransfer
     */
    protected function createUnzerApiSetWebhookRequestTransfer(): UnzerApiSetWebhookRequestTransfer
    {
        return (new UnzerApiSetWebhookRequestTransfer())
            ->setRetrieveUrl(static::WEBHOOK_URL)
            ->setEvent(static::WEBHOOK_EVENT);
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiCreatePaymentResourceRequestTransfer
     */
    protected function createUnzerApiCreatePaymentResourceRequestTransfer(): UnzerApiCreatePaymentResourceRequestTransfer
    {
        return (new UnzerApiCreatePaymentResourceRequestTransfer())
            ->setPaymentMethod(static::PAYMENT_METHOD_SOFORT);
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerBasketItemTransfer
     */
    protected function createUnzerBasketItemTransfer(): UnzerBasketItemTransfer
    {
        return (new UnzerBasketItemTransfer())
            ->setBasketItemReferenceId(static::BASKET_ITEM_REFERENCE_ID)
            ->setQuantity(1)
            ->setAmountGross(static::BASKET_ITEM_AMOUNT_GROSS)
            ->setAmountPerUnit(static::BASKET_ITEM_AMOUNT_PER_UNIT)
            ->setTitle(static::BASKET_ITEM_TITLE)
            ->setParticipantId(static::BASKET_ITEM_PARTICIPANT_ID)
            ->setType(static::BASKET_ITEM_TYPE);
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiAuthorizeRequestTransfer
     */
    protected function createUnzerApiAuthorizeRequestTransfer(): UnzerApiAuthorizeRequestTransfer
    {
        return (new UnzerApiAuthorizeRequestTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceAuthorizeRequestTransfer
     */
    protected function createUnzerApiMarketplaceAuthorizeRequestTransfer(): UnzerApiMarketplaceAuthorizeRequestTransfer
    {
        return (new UnzerApiMarketplaceAuthorizeRequestTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiChargeRequestTransfer
     */
    protected function createUnzerApiChargeRequestTransfer(): UnzerApiChargeRequestTransfer
    {
        return (new UnzerApiChargeRequestTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiRefundRequestTransfer
     */
    protected function createUnzerApiRefundRequestTransfer(): UnzerApiRefundRequestTransfer
    {
        return (new UnzerApiRefundRequestTransfer());
    }

    /**
     * @return \Generated\Shared\Transfer\UnzerApiMarketplaceRefundRequestTransfer
     */
    protected function createUnzerApiMarketplaceRefundRequestTransfer(): UnzerApiMarketplaceRefundRequestTransfer
    {
        return (new UnzerApiMarketplaceRefundRequestTransfer());
    }
}
