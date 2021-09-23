<?php

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Symfony\Component\HttpFoundation\Request;

class CreatePaymentResourceRequest extends UnzerApiAbstractRequest implements UnzerApiRequestInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function getUrl(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return sprintf(
            $this->unzerApiConfig->getUnzerApiCreatePaymentResource(),
            $unzerApiRequestTransfer->getCreatePaymentResourceRequest()->getPaymentMethod()
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
