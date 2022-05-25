<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Shared\UnzerApi;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface UnzerApiConstants
{
    /**
     * Specification:
     * - Webhook resource URL.
     *
     * @api
     *
     * @var string
     */
    public const WEBHOOK_RESOURCE_URL = 'UNZER_API:WEBHOOK_RESOURCE_URL';

    /**
     * Specification:
     * - Basket resource URL.
     *
     * @api
     *
     * @var string
     */
    public const BASKET_RESOURCE_URL = 'UNZER_API:BASKET_RESOURCE_URL';

    /**
     * Specification:
     * - Marketplace basket resource URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_BASKET_RESOURCE_URL = 'UNZER_API:MARKETPLACE_BASKET_RESOURCE_URL';

    /**
     * Specification:
     * - Customer resource URL.
     *
     * @api
     *
     * @var string
     */
    public const CUSTOMER_RESOURCE_URL = 'UNZER_API:CUSTOMER_RESOURCE_URL';

    /**
     * Specification:
     * - Metadata resource URL.
     *
     * @api
     *
     * @var string
     */
    public const METADATA_RESOURCE_URL = 'UNZER_API:METADATA_RESOURCE_URL';

    /**
     * Specification:
     * - Create payment resource URL.
     *
     * @api
     *
     * @var string
     */
    public const CREATE_PAYMENT_RESOURCE_URL = 'UNZER_API:CREATE_PAYMENT_RESOURCE_URL';

    /**
     * Specification:
     * - Charge URL.
     *
     * @api
     *
     * @var string
     */
    public const CHARGE_URL = 'UNZER_API:CHARGE_URL';

    /**
     * Specification:
     * - Marketplace charge URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_CHARGE_URL = 'UNZER_API:MARKETPLACE_CHARGE_URL';

    /**
     * Specification:
     * - CreditCard charge URL.
     *
     * @api
     *
     * @var string
     */
    public const CREDIT_CARD_CHARGE_URL = 'UNZER_API:CREDIT_CARD_CHARGE_URL';

    /**
     * Specification:
     * - Marketplace CreditCard charge URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_CREDIT_CARD_CHARGE_URL = 'UNZER_API:MARKETPLACE_CREDIT_CARD_CHARGE_URL';

    /**
     * Specification:
     * - Marketplace authorize URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_AUTHORIZE_URL = 'UNZER_API:MARKETPLACE_AUTHORIZE_URL';

    /**
     * Specification:
     * - Authorize URL.
     *
     * @api
     *
     * @var string
     */
    public const AUTHORIZE_URL = 'UNZER_API:AUTHORIZE_URL';

    /**
     * Specification:
     * - Marketplace get payment URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_GET_PAYMENT_URL = 'UNZER_API:MARKETPLACE_GET_PAYMENT_URL';

    /**
     * Specification:
     * - Get payment URL.
     *
     * @api
     *
     * @var string
     */
    public const GET_PAYMENT_URL = 'UNZER_API:GET_PAYMENT_URL';

    /**
     * Specification:
     * - Marketplace refund URL.
     *
     * @api
     *
     * @var string
     */
    public const MARKETPLACE_REFUND_URL = 'UNZER_API:MARKETPLACE_REFUND_URL';

    /**
     * Specification:
     * - Refund URL.
     *
     * @api
     *
     * @var string
     */
    public const REFUND_URL = 'UNZER_API:REFUND_URL';

    /**
     * Specification:
     * - Get payment methods URL.
     *
     * @api
     *
     * @var string
     */
    public const GET_PAYMENT_METHODS_URL = 'UNZER_API:GET_PAYMENT_METHODS_URL';

    /**
     * Specification:
     * - Log API calls flag.
     *
     * @api
     *
     * @var string
     */
    public const LOG_API_CALLS = 'UNZER_API:LOG_API_CALLS';
}
