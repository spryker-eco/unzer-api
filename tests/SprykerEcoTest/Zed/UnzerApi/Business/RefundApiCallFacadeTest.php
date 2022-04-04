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
class RefundApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'refundResponseBody.json';

    /**
     * @return void
     */
    public function testPerformRefundApiCall(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performRefundApiCall($unzerApiRequestTransfer);
        $unzerApiUpdateCustomerResponseTransfer = $unzerApiResponseTransfer->getRefundResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiUpdateCustomerResponseTransfer->getId());
    }
}
