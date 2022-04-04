<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class AuthorizableChargeApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'chargeResponseBody.json';

    /**
     * @return void
     */
    public function testPerformMarketplaceAuthorizeApiCall(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performAuthorizableChargeApiCall($unzerApiRequestTransfer);
        $unzerApiCreateBasketResponseTransfer = $unzerApiResponseTransfer->getChargeResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getId());
    }
}
