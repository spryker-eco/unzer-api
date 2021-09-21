<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Business\Api\Request;

use SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface;
use SprykerEco\Zed\UnzerApi\UnzerApiConfig;

abstract class UnzerApiAbstractRequest
{
    /**
     * @var \SprykerEco\Zed\UnzerApi\UnzerApiConfig
     */
    protected $unzerApiConfig;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface
     */
    protected $unzerApiRequestBuilder;

    /**
     * @param \SprykerEco\Zed\UnzerApi\UnzerApiConfig $unzerApiConfig
     * @param \SprykerEco\Zed\UnzerApi\Business\Api\Request\Builder\UnzerApiRequestBuilderInterface $unzerApiRequestBuilder
     */
    public function __construct(
        UnzerApiConfig $unzerApiConfig,
        UnzerApiRequestBuilderInterface $unzerApiRequestBuilder
    ) {
        $this->unzerApiConfig = $unzerApiConfig;
        $this->unzerApiRequestBuilder = $unzerApiRequestBuilder;
    }
}
