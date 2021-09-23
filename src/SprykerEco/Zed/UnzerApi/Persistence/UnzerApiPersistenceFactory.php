<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Zed\UnzerApi\Persistence;

use Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog;
use SprykerEco\Zed\UnzerApi\Persistence\Mapper\UnzerApiPersistenceMapper;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \SprykerEco\Zed\UnzerApi\UnzerApiConfig getConfig()
 * @method \SprykerEco\Zed\UnzerApi\Persistence\UnzerApiEntityManagerInterface getEntityManager()()
 */
class UnzerApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\UnzerApi\Persistence\SpyPaymentUnzerApiLog
     */
    public function createPaymentUnzerApiLogEntity(): SpyPaymentUnzerApiLog
    {
        return new SpyPaymentUnzerApiLog();
    }

    /**
     * @return \SprykerEco\Zed\UnzerApi\Persistence\Mapper\UnzerApiPersistenceMapper
     */
    public function createUnzerApiPersistenceMapper(): UnzerApiPersistenceMapper
    {
        return new UnzerApiPersistenceMapper();
    }
}
