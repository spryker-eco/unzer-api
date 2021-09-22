<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External;

interface UnzerApiToHttpClientInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param string $authKey
     *
     * @throws UnzerApiToHttpClientException
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UnzerApiToHttpResponseInterface;
}
