<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use SprykerEco\Zed\UnzerApi\Exception\UnzerApiToHttpClientException;

class UnzerApiToGuzzleHttpClientAdapter implements UnzerApiToHttpClientInterface
{
    /**
     * @var int
     */
    protected const DEFAULT_TIMEOUT = 40;

    /**
     * @var string
     */
    protected const HEADER_CONTENT_TYPE_KEY = 'Content-Type';

    /**
     * @var string
     */
    protected const HEADER_CONTENT_TYPE_VALUE = 'application/json';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleHttpClient;

    public function __construct()
    {
        $this->guzzleHttpClient = new Client([
            RequestOptions::TIMEOUT => static::DEFAULT_TIMEOUT,
            RequestOptions::HEADERS => [
                static::HEADER_CONTENT_TYPE_KEY => static::HEADER_CONTENT_TYPE_VALUE,
            ],
        ]);
    }

    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param string $authKey
     *
     * @throws \SprykerEco\Zed\UnzerApi\Exception\UnzerApiToHttpClientException
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UnzerApiToHttpResponseInterface
    {
        $options = [
            RequestOptions::BODY => $body,
            RequestOptions::AUTH => [$authKey, ''],
        ];

        try {
            $response = $this->guzzleHttpClient->request($method, $url, $options);
        } catch (RequestException $requestException) {
            throw new UnzerApiToHttpClientException(
                $this->createUnzerApiGuzzleResponse($requestException->getResponse()),
                $requestException->getMessage(),
                (int)$requestException->getCode(),
                $requestException,
            );
        }

        return $this->createUnzerApiGuzzleResponse($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface
     */
    protected function createUnzerApiGuzzleResponse(?ResponseInterface $response): UnzerApiToHttpResponseInterface
    {
        return new UnzerApiToGuzzleResponseAdapter(
            $response ? $response->getBody() : null,
            $response ? $response->getHeaders() : [],
        );
    }
}
