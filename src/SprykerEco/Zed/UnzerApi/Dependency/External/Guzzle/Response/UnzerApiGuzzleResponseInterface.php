<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response;

interface UnzerApiGuzzleResponseInterface
{
    /**
     * @return string
     */
    public function getResponseBody(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param string $header
     *
     * @return string|null
     */
    public function getHeader(string $header): ?string;
}
