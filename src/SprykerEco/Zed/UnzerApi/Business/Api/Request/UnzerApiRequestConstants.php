<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

interface UnzerApiRequestConstants
{
    public const PARAM_ID = 'id';
    public const PARAM_LASTNAME = 'lastname';
    public const PARAM_FIRSTNAME = 'firstname';
    public const PARAM_SALUTATION = 'salutation';
    public const PARAM_COMPANY = 'company';
    public const PARAM_CUSTOMER_ID = 'customerId';
    public const PARAM_BIRTH_DATE = 'birthDate';
    public const PARAM_EMAIL = 'email';
    public const PARAM_PHONE = 'phone';
    public const PARAM_MOBILE = 'mobile';

    public const PARAM_URL = 'url';
    public const PARAM_TIMESTAMP = 'timestamp';
    public const PARAM_EVENT = 'event';

    public const PARAM_BILLING_ADDRESS = 'billingAddress';
    public const PARAM_SHIPPING_ADDRESS = 'shippingAddress';

    public const PARAM_ADDRESS_NAME = 'name';
    public const PARAM_ADDRESS_STREET = 'street';
    public const PARAM_ADDRESS_STATE = 'state';
    public const PARAM_ADDRESS_ZIP = 'zip';
    public const PARAM_ADDRESS_CITY = 'city';
    public const PARAM_ADDRESS_COUNTRY = 'country';

    public const PARAM_AMOUNT_TOTAL_GROSS = 'amountTotalGross';
    public const PARAM_CURRENCY_CODE = 'currencyCode';
    public const PARAM_NOTE = 'note';
    public const PARAM_ORDER_ID = 'orderId';
    public const PARAM_BASKET_ITEMS = 'basketItems';
    public const PARAM_BASKET_ITEM_REFERENCE_ID = 'basketItemReferenceId';
    public const PARAM_UNIT = 'unit';
    public const PARAM_QUANTITY = 'quantity';
    public const PARAM_AMOUNT_DISCOUNT = 'amountDiscount';
    public const PARAM_VAT = 'vat';
    public const PARAM_AMOUNT_GROSS = 'amountGross';
    public const PARAM_AMOUNT_VAT = 'amountVat';
    public const PARAM_AMOUNT_PER_UNIT = 'amountPerUnit';
    public const PARAM_AMOUNT_NET = 'amountNet';
    public const PARAM_TITLE = 'title';
    public const PARAM_PARTICIPANT_ID = 'participantId';
    public const PARAM_TYPE = 'type';

    public const PARAM_AMOUNT = 'amount';
    public const PARAM_CURRENCY = 'currency';
    public const PARAM_RETURN_URL = 'returnUrl';
    public const PARAM_RESOURCES = 'resources';
    public const PARAM_TYPE_ID = 'typeId';
    public const PARAM_BASKET_ID = 'basketId';

    public const PARAM_REDIRECT_URL = 'redirectUrl';
    public const PARAM_MESSAGE = 'message';
    public const PARAM_CODE = 'code';
    public const PARAM_MERCHANT = 'merchant';
    public const PARAM_CUSTOMER = 'customer';
    public const PARAM_DATE = 'date';
    public const PARAM_PAYMENT_ID = 'paymentId';
    public const PARAM_CHARGE_ID = 'chargeId';
    public const PARAM_TRACE_ID = 'traceId';
    public const PARAM_PAYMENT_REFERENCE = 'paymentReference';
    public const PARAM_METHOD = 'method';
    public const PARAM_PROCESSING = 'processing';
    public const PARAM_UNIQUE_ID = 'uniqueId';
    public const PARAM_SHORT_ID = 'shortId';

    public const PARAM_IS_SUCCESS = 'isSuccess';
    public const PARAM_IS_PENDING = 'isPending';
    public const PARAM_IS_ERROR = 'isError';
    public const PARAM_CARD3DS = 'card3ds';

    public const PARAM_STORE = 'store';
    public const PARAM_LOCALE = 'locale';
    public const PARAM_PRICE_MODE = 'priceMode';
    public const PARAM_CREATED_AT = 'createdAt';

    public const PARAM_INVOICE_ID = 'invoiceId';
    public const PARAM_TOTAL = 'total';
    public const PARAM_CHARGED = 'charged';
    public const PARAM_CANCELED = 'canceled';
    public const PARAM_REMAINING = 'remaining';

    public const PARAM_STATE = 'state';
    public const PARAM_NAME = 'name';
    public const PARAM_TRANSACTIONS = 'transactions';
    public const PARAM_METADATA_ID = 'metadataId';
    public const PARAM_PAY_PAGE_ID = 'payPageId';
    public const PARAM_STATUS = 'status';

    public const PARAM_RECURRING = 'recurring';
    public const PARAM_GEO_LOCATION = 'geoLocation';
    public const PARAM_CLIENT_IP = 'clientIp';
    public const PARAM_COUNTRY_ISO_A2 = 'countryIsoA2';

    public const PARAM_CANCELED_BASKET = 'canceledBasket';
    public const PARAM_ITEMS = 'items';
}
