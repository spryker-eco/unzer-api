<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request\Converter;

use Generated\Shared\Transfer\UnzerApiRequestTransfer;

interface UnzerApiRequestConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\UnzerApiRequestTransfer $unzerApiRequestTransfer
     *
     * @return array<array-key, array<string, mixed>|float|string|null>
     *
     * @return array<string, array<array-key, mixed>|string|float>
     */
    public function convertUnzerApiRequestTransferToArray(UnzerApiRequestTransfer $unzerApiRequestTransfer): array;
}
