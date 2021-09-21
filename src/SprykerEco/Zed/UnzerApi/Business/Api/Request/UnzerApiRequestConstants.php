<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

interface UnzerApiRequestConstants
{
    /**
     * @var string
     */
    public const PARAM_ID = 'id';
    /**
     * @var string
     */
    public const PARAM_LASTNAME = 'lastname';
    /**
     * @var string
     */
    public const PARAM_FIRSTNAME = 'firstname';
    /**
     * @var string
     */
    public const PARAM_SALUTATION = 'salutation';
    /**
     * @var string
     */
    public const PARAM_COMPANY = 'company';
    /**
     * @var string
     */
    public const PARAM_CUSTOMER_ID = 'customerId';
    /**
     * @var string
     */
    public const PARAM_BIRTH_DATE = 'birthDate';
    /**
     * @var string
     */
    public const PARAM_EMAIL = 'email';
    /**
     * @var string
     */
    public const PARAM_PHONE = 'phone';
    /**
     * @var string
     */
    public const PARAM_MOBILE = 'mobile';

    /**
     * @var string
     */
    public const PARAM_URL = 'url';
    /**
     * @var string
     */
    public const PARAM_TIMESTAMP = 'timestamp';
    /**
     * @var string
     */
    public const PARAM_EVENT = 'event';

    /**
     * @var string
     */
    public const PARAM_BILLING_ADDRESS = 'billingAddress';
    /**
     * @var string
     */
    public const PARAM_SHIPPING_ADDRESS = 'shippingAddress';

    /**
     * @var string
     */
    public const PARAM_ADDRESS_NAME = 'name';
    /**
     * @var string
     */
    public const PARAM_ADDRESS_STREET = 'street';
    /**
     * @var string
     */
    public const PARAM_ADDRESS_STATE = 'state';
    /**
     * @var string
     */
    public const PARAM_ADDRESS_ZIP = 'zip';
    /**
     * @var string
     */
    public const PARAM_ADDRESS_CITY = 'city';
    /**
     * @var string
     */
    public const PARAM_ADDRESS_COUNTRY = 'country';

    /**
     * @var string
     */
    public const PARAM_AMOUNT_TOTAL_GROSS = 'amountTotalGross';
    /**
     * @var string
     */
    public const PARAM_CURRENCY_CODE = 'currencyCode';
    /**
     * @var string
     */
    public const PARAM_NOTE = 'note';
    /**
     * @var string
     */
    public const PARAM_ORDER_ID = 'orderId';
    /**
     * @var string
     */
    public const PARAM_BASKET_ITEMS = 'basketItems';
    /**
     * @var string
     */
    public const PARAM_BASKET_ITEM_REFERENCE_ID = 'basketItemReferenceId';
    /**
     * @var string
     */
    public const PARAM_UNIT = 'unit';
    /**
     * @var string
     */
    public const PARAM_QUANTITY = 'quantity';
    /**
     * @var string
     */
    public const PARAM_AMOUNT_DISCOUNT = 'amountDiscount';
    /**
     * @var string
     */
    public const PARAM_VAT = 'vat';
    /**
     * @var string
     */
    public const PARAM_AMOUNT_GROSS = 'amountGross';
    /**
     * @var string
     */
    public const PARAM_AMOUNT_VAT = 'amountVat';
    /**
     * @var string
     */
    public const PARAM_AMOUNT_PER_UNIT = 'amountPerUnit';
    /**
     * @var string
     */
    public const PARAM_AMOUNT_NET = 'amountNet';
    /**
     * @var string
     */
    public const PARAM_TITLE = 'title';
    /**
     * @var string
     */
    public const PARAM_PARTICIPANT_ID = 'participantId';
    /**
     * @var string
     */
    public const PARAM_TYPE = 'type';

    /**
     * @var string
     */
    public const PARAM_AMOUNT = 'amount';
    /**
     * @var string
     */
    public const PARAM_CURRENCY = 'currency';
    /**
     * @var string
     */
    public const PARAM_RETURN_URL = 'returnUrl';
    /**
     * @var string
     */
    public const PARAM_RESOURCES = 'resources';
    /**
     * @var string
     */
    public const PARAM_TYPE_ID = 'typeId';
    /**
     * @var string
     */
    public const PARAM_BASKET_ID = 'basketId';

    /**
     * @var string
     */
    public const PARAM_REDIRECT_URL = 'redirectUrl';
    /**
     * @var string
     */
    public const PARAM_MESSAGE = 'message';
    /**
     * @var string
     */
    public const PARAM_CODE = 'code';
    /**
     * @var string
     */
    public const PARAM_MERCHANT = 'merchant';
    /**
     * @var string
     */
    public const PARAM_CUSTOMER = 'customer';
    /**
     * @var string
     */
    public const PARAM_DATE = 'date';
    /**
     * @var string
     */
    public const PARAM_PAYMENT_ID = 'paymentId';
    /**
     * @var string
     */
    public const PARAM_CHARGE_ID = 'chargeId';
    /**
     * @var string
     */
    public const PARAM_TRACE_ID = 'traceId';
    /**
     * @var string
     */
    public const PARAM_PAYMENT_REFERENCE = 'paymentReference';
    /**
     * @var string
     */
    public const PARAM_METHOD = 'method';
    /**
     * @var string
     */
    public const PARAM_PROCESSING = 'processing';
    /**
     * @var string
     */
    public const PARAM_UNIQUE_ID = 'uniqueId';
    /**
     * @var string
     */
    public const PARAM_SHORT_ID = 'shortId';

    /**
     * @var string
     */
    public const PARAM_IS_SUCCESS = 'isSuccess';
    /**
     * @var string
     */
    public const PARAM_IS_PENDING = 'isPending';
    /**
     * @var string
     */
    public const PARAM_IS_ERROR = 'isError';
    /**
     * @var string
     */
    public const PARAM_CARD3DS = 'card3ds';

    /**
     * @var string
     */
    public const PARAM_STORE = 'store';
    /**
     * @var string
     */
    public const PARAM_LOCALE = 'locale';
    /**
     * @var string
     */
    public const PARAM_PRICE_MODE = 'priceMode';
    /**
     * @var string
     */
    public const PARAM_CREATED_AT = 'createdAt';

    /**
     * @var string
     */
    public const PARAM_INVOICE_ID = 'invoiceId';
    /**
     * @var string
     */
    public const PARAM_TOTAL = 'total';
    /**
     * @var string
     */
    public const PARAM_CHARGED = 'charged';
    /**
     * @var string
     */
    public const PARAM_CANCELED = 'canceled';
    /**
     * @var string
     */
    public const PARAM_REMAINING = 'remaining';

    /**
     * @var string
     */
    public const PARAM_STATE = 'state';
    /**
     * @var string
     */
    public const PARAM_NAME = 'name';
    /**
     * @var string
     */
    public const PARAM_TRANSACTIONS = 'transactions';
    /**
     * @var string
     */
    public const PARAM_METADATA_ID = 'metadataId';
    /**
     * @var string
     */
    public const PARAM_PAY_PAGE_ID = 'payPageId';
    /**
     * @var string
     */
    public const PARAM_STATUS = 'status';

    /**
     * @var string
     */
    public const PARAM_RECURRING = 'recurring';
    /**
     * @var string
     */
    public const PARAM_GEO_LOCATION = 'geoLocation';
    /**
     * @var string
     */
    public const PARAM_CLIENT_IP = 'clientIp';
    /**
     * @var string
     */
    public const PARAM_COUNTRY_ISO_A2 = 'countryIsoA2';

    /**
     * @var string
     */
    public const PARAM_CANCELED_BASKET = 'canceledBasket';
    /**
     * @var string
     */
    public const PARAM_ITEMS = 'items';
}
