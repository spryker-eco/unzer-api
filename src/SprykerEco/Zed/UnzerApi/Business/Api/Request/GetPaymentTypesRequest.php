<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;
use Symfony\Component\HttpFoundation\Request;

class GetPaymentTypesRequest extends UnzerApiAbstractRequest implements UnzerApiRequestInterface
{
    public function getUrl(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return sprintf(
            $this->unzerApiConfig->getUnzerApiGetPaymentTypes(),
            $unzerApiRequestTransfer->getGetPaymentTypesRequestOrFail()->getPaymentIdOrFail(),
        );
    }

    public function getHttpMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function getRequestBody(UnzerApiRequestTransfer $unzerApiRequestTransfer): string
    {
        return '';
    }

    public function getAuthorizationKey(): string
    {
        return $this->unzerApiConfig->getUnzerApiPrivateKey();
    }
}
