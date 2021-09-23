<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Exception;

use Exception;
use Throwable;

class UnzerApiToHttpClientException extends Exception
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface
     */
    protected $response;

    /**
     * @param \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface $response
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        UnzerApiToHttpResponseInterface $response,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpResponseInterface
     */
    public function getResponse(): UnzerApiToHttpResponseInterface
    {
        return $this->response;
    }
}
