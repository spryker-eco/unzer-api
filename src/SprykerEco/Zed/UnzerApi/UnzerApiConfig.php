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
    public function getUnzerApiPrivateKey(): string
    {
        return $this->get(UnzerApiConstants::UNZER_PRIVATE_KEY);
    }
}
