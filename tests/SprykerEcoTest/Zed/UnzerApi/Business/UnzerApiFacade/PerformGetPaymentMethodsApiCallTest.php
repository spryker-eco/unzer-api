<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacade;

use Generated\Shared\Transfer\UnzerApiGetPaymentMethodsResponseTransfer;
use SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacadeBaseTest;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 * @group UnzerApiFacade
 */
class PerformGetPaymentMethodsApiCallTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'getPaymentMethodsResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performGetPaymentMethodsApiCall($unzerApiRequestTransfer);
        $unzerApiGetPaymentMethodsResponseTransfer = $unzerApiResponseTransfer->getGetPaymentMethodsResponseOrFail();

        // Assert
        $this->assertInstanceOf(UnzerApiGetPaymentMethodsResponseTransfer::class, $unzerApiGetPaymentMethodsResponseTransfer);
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiGetPaymentMethodsResponseTransfer->getPaymentMethods());
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
        $unzerApiResponseTransfer = $this->facade->performGetPaymentMethodsApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertFalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiResponseTransfer->getErrorResponse());
    }
}
