<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Symfony\Component\HttpFoundation\Request;

class MarketplaceRefundRequest extends UnzerApiAbstractRequest implements UnzerApiRequestInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function getUrl(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        $request = $unzerApiRequestTransfer->getMarketplaceRefundRequest();

        return sprintf(
            $this->unzerApiConfig->getUnzerApiMarketplaceRefund(),
            $request->getPaymentIdOrFail(),
            $request->getChargeIdOrFail()
        );
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return Request::METHOD_POST;
    }

    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function getRequestBody(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return $this->unzerApiRequestBuilder->buildRequestPayload($unzerApiRequestTransfer);
    }

    /**
     * @return string
     */
    public function getAuthorizationKey(): string
    {
        return $this->unzerApiConfig->getUnzerApiPrivateKey();
    }
}
