<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use SprykerEco\Zed\UnzerApi\Persistence\Propel\Mapper\UnzerApiMapper;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()()
 */
class UnzerApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \SprykerEco\Zed\UnzerApi\Persistence\Propel\Mapper\UnzerApiMapper
     */
    public function createUnzerApiMapper(): UnzerApiMapper
    {
        return new UnzerApiMapper();
    }
}
