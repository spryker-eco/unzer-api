<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle;

use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface;

interface UnzerApiGuzzleHttpClientAdapterInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param string $authKey
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UnzerApiGuzzleResponseInterface;
}
