<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External;

use Psr\Http\Message\StreamInterface;

class UnzerApiToGuzzleResponseAdapter implements UnzerApiToHttpResponseInterface
{
    /**
     * @var \Psr\Http\Message\StreamInterface|null
     */
    protected $responseBody;

    /**
     * @var array<string,mixed>
     */
    protected $headers;

    /**
     * @param \Psr\Http\Message\StreamInterface|null $responseBody
     * @param array<string,mixed> $headers
     */
    public function __construct(?StreamInterface $responseBody = null, array $headers = [])
    {
        $this->responseBody = $responseBody;
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return (string)$this->responseBody;
    }

    /**
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $header
     *
     * @return string|null
     */
    public function getHeader(string $header): ?string
    {
        if (!isset($this->headers[$header])) {
            return null;
        }

        return (string)reset($this->headers[$header]);
    }
}
