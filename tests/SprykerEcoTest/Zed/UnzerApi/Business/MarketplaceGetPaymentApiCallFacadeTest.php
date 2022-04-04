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
class MarketplaceGetPaymentApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'marketplaceGetPaymentResponseBody.json';

    /**
     * @return void
     */
    public function testPerformMarketplaceGetPaymentApiCall(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performMarketplaceGetPaymentApiCall($unzerApiRequestTransfer);
        $unzerApiCreateBasketResponseTransfer = $unzerApiResponseTransfer->getGetPaymentResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getId());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getStateName());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getAmountTotal());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getAmountRemaining());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getAmountCanceled());
    }
}
