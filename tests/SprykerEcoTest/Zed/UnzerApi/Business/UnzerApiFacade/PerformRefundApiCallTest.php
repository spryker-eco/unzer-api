<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacade;

use Generated\Shared\Transfer\UnzerApiErrorResponseTransfer;
use SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacadeBaseTest;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class PerformRefundApiCallTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'refundResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performRefundApiCall($unzerApiRequestTransfer);
        $unzerApiRefundResponseTransfer = $unzerApiResponseTransfer->getRefundResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiRefundResponseTransfer->getId());
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
        $unzerApiResponseTransfer = $this->facade->performRefundApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertFalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertInstanceOf(UnzerApiErrorResponseTransfer::class, $unzerApiResponseTransfer->getErrorResponse());
    }
}
