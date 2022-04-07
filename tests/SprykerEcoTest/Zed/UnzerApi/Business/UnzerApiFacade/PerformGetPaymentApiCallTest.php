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
class PerformGetPaymentApiCallTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'getPaymentResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performGetPaymentApiCall($unzerApiRequestTransfer);
        $unzerApiGetPaymentResponseTransfer = $unzerApiResponseTransfer->getGetPaymentResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiGetPaymentResponseTransfer->getId());
        $this->assertNotEmpty($unzerApiGetPaymentResponseTransfer->getStateName());
        $this->assertNotEmpty($unzerApiGetPaymentResponseTransfer->getAmountTotal());
        $this->assertNotEmpty($unzerApiGetPaymentResponseTransfer->getAmountRemaining());
        $this->assertNotEmpty($unzerApiGetPaymentResponseTransfer->getAmountCanceled());
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
        $unzerApiResponseTransfer = $this->facade->performGetPaymentApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertFalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertInstanceOf(UnzerApiErrorResponseTransfer::class, $unzerApiResponseTransfer->getErrorResponse());
    }
}