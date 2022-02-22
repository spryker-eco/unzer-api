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
     * @var string
     */
    public const WEBHOOK_RESOURCE_URL = 'UNZERAPI:WEBHOOK_RESOURCE_URL';

    /**
     * @var string
     */
    public const BASKET_RESOURCE_URL = 'UNZERAPI:BASKET_RESOURCE_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_BASKET_RESOURCE_URL = 'UNZERAPI:MARKETPLACE_BASKET_RESOURCE_URL';

    /**
     * @var string
     */
    public const CUSTOMER_RESOURCE_URL = 'UNZERAPI:CUSTOMER_RESOURCE_URL';

    /**
     * @var string
     */
    public const METADATA_RESOURCE_URL = 'UNZERAPI:METADATA_RESOURCE_URL';

    /**
     * @var string
     */
    public const CREATE_PAYMENT_RESOURCE_URL = 'UNZERAPI:CREATE_PAYMENT_RESOURCE_URL';

    /**
     * @var string
     */
    public const CHARGE_URL = 'UNZERAPI:CHARGE_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_CHARGE_URL = 'UNZERAPI:MARKETPLACE_CHARGE_URL';

    /**
     * @var string
     */
    public const CREDIT_CARD_CHARGE_URL = 'UNZERAPI:CREDIT_CARD_CHARGE_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_CREDIT_CARD_CHARGE_URL = 'UNZERAPI:MARKETPLACE_CREDIT_CARD_CHARGE_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_AUTHORIZE_URL = 'UNZERAPI:MARKETPLACE_AUTHORIZE_URL';

    /**
     * @var string
     */
    public const AUTHORIZE_URL = 'UNZERAPI:AUTHORIZE_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_GET_PAYMENT_URL = 'UNZERAPI:MARKETPLACE_GET_PAYMENT_URL';

    /**
     * @var string
     */
    public const GET_PAYMENT_URL = 'UNZERAPI:GET_PAYMENT_URL';

    /**
     * @var string
     */
    public const MARKETPLACE_REFUND_URL = 'UNZERAPI:MARKETPLACE_REFUND_URL';

    /**
     * @var string
     */
    public const REFUND_URL = 'UNZERAPI:REFUND_URL';
}
