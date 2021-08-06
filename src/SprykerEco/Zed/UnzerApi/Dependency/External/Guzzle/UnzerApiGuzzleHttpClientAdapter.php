<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Exception\UnzerApiGuzzleRequestException;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponse;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface;

class UnzerApiGuzzleHttpClientAdapter implements UnzerApiGuzzleHttpClientAdapterInterface
{
    protected const DEFAULT_TIMEOUT = 40;
    protected const HEADER_CONTENT_TYPE_KEY = 'Content-Type';
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
     * @throws \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Exception\UnzerApiGuzzleRequestException
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface
     */
    public function sendRequest(string $url, string $method, string $body, string $authKey): UnzerApiGuzzleResponseInterface
    {
        $options = [
            RequestOptions::BODY => $body,
            RequestOptions::AUTH => [$authKey],
        ];

        try {
            $response = $this->guzzleHttpClient->request($method, $url, $options);
        } catch (RequestException $requestException) {
            throw new UnzerApiGuzzleRequestException(
                $this->createUnzerApiGuzzleResponse($requestException->getResponse()),
                $requestException->getMessage(),
                $requestException->getCode(),
                $requestException
            );
        }

        return $this->createUnzerApiGuzzleResponse($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface|null $response
     *
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponse
     */
    protected function createUnzerApiGuzzleResponse(?ResponseInterface $response): UnzerApiGuzzleResponse
    {
        if ($response === null) {
            return new UnzerApiGuzzleResponse();
        }

        return new UnzerApiGuzzleResponse(
            $response->getBody(),
            $response->getHeaders()
        );
    }
}
