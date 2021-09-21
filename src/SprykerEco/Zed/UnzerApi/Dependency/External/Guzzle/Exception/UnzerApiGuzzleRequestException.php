<?php

namespace SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Exception;

use Exception;
use SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface;
use Throwable;

class UnzerApiGuzzleRequestException extends Exception
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface
     */
    protected $response;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface $response
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        UnzerApiGuzzleResponseInterface $response,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\Guzzle\Response\UnzerApiGuzzleResponseInterface
     */
    public function getResponse(): UnzerApiGuzzleResponseInterface
    {
        return $this->response;
    }
}
