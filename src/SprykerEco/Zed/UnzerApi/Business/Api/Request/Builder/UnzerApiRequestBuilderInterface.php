<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;

interface UnzerApiRequestBuilderInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return string
     */
    public function buildRequestPayload(UnzerApiRequestTransfer $unzerApiRequestTransfer): string;
}
