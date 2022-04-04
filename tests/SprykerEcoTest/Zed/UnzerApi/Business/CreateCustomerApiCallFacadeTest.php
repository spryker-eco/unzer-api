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
class CreateCustomerApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'createCustomerResponseBody.json';

    /**
     * @return void
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performCreateCustomerApiCall($unzerApiRequestTransfer);
        $unzerApiCreateCustomerResponseTransfer = $unzerApiResponseTransfer->getCreateCustomerResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateCustomerResponseTransfer->getId());
    }
}
