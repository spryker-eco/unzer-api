<?php

use SprykerEco\Shared\UnzerApi\UnzerApiConstants;

$config[UnzerApiConstants::WEBHOOK_RESOURCE_URL] = 'https://api.unzer.com/v1/webhooks';
$config[UnzerApiConstants::BASKET_RESOURCE_URL] = 'https://api.unzer.com/v1/baskets';
$config[UnzerApiConstants::CUSTOMER_RESOURCE_URL] = 'https://api.unzer.com/v1/customers';
$config[UnzerApiConstants::METADATA_RESOURCE_URL] = 'https://api.unzer.com/v1/metadata';
$config[UnzerApiConstants::CREATE_PAYMENT_RESOURCE_URL] = 'https://api.unzer.com/v1/types/%s';
$config[UnzerApiConstants::MARKETPLACE_AUTHORIZE_URL] = 'https://api.unzer.com/v1/marketplace/payments/authorize';
$config[UnzerApiConstants::MARKETPLACE_CHARGE_URL] = 'https://api.unzer.com/v1/marketplace/payments/charges';
$config[UnzerApiConstants::MARKETPLACE_CREDIT_CARD_CHARGE_URL] = 'https://api.unzer.com/v1/marketplace/payments/%s/charges';
$config[UnzerApiConstants::MARKETPLACE_GET_PAYMENT_URL] = 'https://api.unzer.com/v1/marketplace/payments/%s';
$config[UnzerApiConstants::MARKETPLACE_REFUND_URL] = 'https://api.unzer.com/v1/marketplace/payments/%s/charges/%s/cancels';
