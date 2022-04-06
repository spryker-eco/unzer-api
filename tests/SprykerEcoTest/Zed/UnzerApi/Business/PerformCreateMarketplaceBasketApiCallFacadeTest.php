<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business;

use Generated\Shared\Transfer\UnzerApiCreateBasketResponseTransfer;
use Generated\Shared\Transfer\UnzerApiErrorResponseTransfer;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class PerformCreateMarketplaceBasketApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'createMarketplaceBasketResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performCreateMarketplaceBasketApiCall($unzerApiRequestTransfer);
        $unzerApiCreateBasketResponseTransfer = $unzerApiResponseTransfer->getCreateBasketResponseOrFail();

        // Assert
        $this->assertInstanceOf(UnzerApiCreateBasketResponseTransfer::class, $unzerApiCreateBasketResponseTransfer);
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getId());
    }

    /**
     * @return void
     */
    public function testReturnsErrorResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();
        $this->returnSuccessResponse = false;

        // Act
        $unzerApiResponseTransfer = $this->facade->performCreateMarketplaceBasketApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertfalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertInstanceOf(UnzerApiErrorResponseTransfer::class, $unzerApiResponseTransfer->getErrorResponse());
    }
}
