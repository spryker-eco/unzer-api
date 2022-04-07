<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacade;

use Generated\Shared\Transfer\UnzerApiErrorResponseTransfer;
use SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacadeBaseTest;
use SprykerEcoTest\Zed\UnzerApi\UnzerApiZedTester;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class PerformCreatePaymentResourceApiCallTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'createPaymentResourceResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performCreatePaymentResourceApiCall($unzerApiRequestTransfer);
        $unzerApiCreatePaymentResourceResponseTransfer = $unzerApiResponseTransfer->getCreatePaymentResourceResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreatePaymentResourceResponseTransfer->getId());
        $this->assertEquals(UnzerApiZedTester::PAYMENT_METHOD_SOFORT, $unzerApiCreatePaymentResourceResponseTransfer->getMethod());
        $this->assertIsBool($unzerApiCreatePaymentResourceResponseTransfer->getRecurring());
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
        $unzerApiResponseTransfer = $this->facade->performCreatePaymentResourceApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertFalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertInstanceOf(UnzerApiErrorResponseTransfer::class, $unzerApiResponseTransfer->getErrorResponse());
    }
}
