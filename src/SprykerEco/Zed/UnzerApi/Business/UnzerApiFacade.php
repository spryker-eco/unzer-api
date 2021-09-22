<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Generated\Shared\Transfer\UnzerApiResponseTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @api
 *
 * @method \SprykerEco\Zed\UnzerApi\Business\UnzerApiBusinessFactory getFactory()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()
 */
class UnzerApiFacade extends AbstractFacade implements UnzerApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performSetNotificationUrlApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createSetWebhookApiClient()->sendRequest($unzerApiRequestTransfer);
    }
}
