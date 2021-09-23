<?php

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

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateCustomerApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createCreateCustomerApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateMetadataApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createCreateMetadataApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreateBasketApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createCreateBasketApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceAuthorizeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createMarketplaceAuthorizeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performAuthorizeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createAuthorizeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceGetPaymentApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createMarketplaceGetPaymentApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performGetPaymentApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createGetPaymentApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createMarketplaceChargeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceAuthorizableChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createMarketplaceAuthorizableChargeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performAuthorizableChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createAuthorizableChargeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performChargeApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createChargeApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performCreatePaymentResourceApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createCreatePaymentResourceApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performRefundApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createRefundApiClient()->sendRequest($unzerApiRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UnzerApiResponseTransfer
     */
    public function performMarketplaceRefundApiCall(UnzerApiRequestTransfer $unzerApiRequestTransfer): UnzerApiResponseTransfer
    {
        return $this->getFactory()->createMarketplaceRefundApiClient()->sendRequest($unzerApiRequestTransfer);
    }
}
