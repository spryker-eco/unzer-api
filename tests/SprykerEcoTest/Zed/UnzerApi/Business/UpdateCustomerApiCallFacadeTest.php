<?php

namespace SprykerEcoTest\Zed\UnzerApi\Business;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class UpdateCustomerApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    protected const FIXTURE_FILE_NAME = 'updateCustomerResponseBody.json';

    /**
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        //Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        //Act
        $unzerApiResponseTransfer = $this->facade->performUpdateCustomerApiCall($unzerApiRequestTransfer);
        $unzerApiUpdateCustomerResponseTransfer = $unzerApiResponseTransfer->getUpdateCustomerResponseOrFail();

        //Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiUpdateCustomerResponseTransfer->getId());
    }
}
