<?php

use SprykerEco\Shared\UnzerApi\UnzerApiConstants;

$config[UnzerApiConstants::WEBHOOK_RESOURCE_URL] = 'https://api.unzer.com/v1/webhooks';
$config[UnzerApiConstants::CUSTOMER_RESOURCE_URL] = 'https://api.unzer.com/v1/customers/%s';
$config[UnzerApiConstants::BASKET_RESOURCE_URL] = 'https://api.unzer.com/v2/baskets';
$config[UnzerApiConstants::MARKETPLACE_BASKET_RESOURCE_URL] = 'https://api.unzer.com/v2/marketplace/baskets';
$config[UnzerApiConstants::MARKETPLACE_AUTHORIZE_URL] = 'https://api.unzer.com/v1/marketplace/payments/authorize';
$config[UnzerApiConstants::AUTHORIZE_URL] = 'https://api.unzer.com/v1/payments/authorize';
$config[UnzerApiConstants::METADATA_RESOURCE_URL] = 'https://api.unzer.com/v1/metadata';
$config[UnzerApiConstants::MARKETPLACE_GET_PAYMENT_URL] = 'https://api.unzer.com/v1/marketplace/payments';
$config[UnzerApiConstants::GET_PAYMENT_URL] = 'https://api.unzer.com/v1/payments/%s';
$config[UnzerApiConstants::CHARGE_URL] = 'https://api.unzer.com/v1/payments/charges';
$config[UnzerApiConstants::MARKETPLACE_CHARGE_URL] = 'https://api.unzer.com/v1/marketplace/payments/charges';
$config[UnzerApiConstants::MARKETPLACE_CREDIT_CARD_CHARGE_URL] = 'https://api.unzer.com/v1/marketplace/payments/%s/authorize/%s/charges';
$config[UnzerApiConstants::CREDIT_CARD_CHARGE_URL] = 'https://api.unzer.com/v1/payments/%s/charges';
$config[UnzerApiConstants::CREATE_PAYMENT_RESOURCE_URL] = 'https://api.unzer.com/v1/types/%s';
$config[UnzerApiConstants::MARKETPLACE_REFUND_URL] = 'https://api.unzer.com/v1/marketplace/payments/%s/charges/%s/cancels';
$config[UnzerApiConstants::REFUND_URL] = 'https://api.unzer.com/v1/payments/%s/charges/%s/cancels';
