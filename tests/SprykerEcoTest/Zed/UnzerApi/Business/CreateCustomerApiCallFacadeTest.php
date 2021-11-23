<?php

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
    protected const FIXTURE_FILE_NAME = 'createCustomerResponseBody.json';

    /**
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        //Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        //Act
        $unzerApiResponseTransfer = $this->facade->performCreateCustomerApiCall($unzerApiRequestTransfer);
        $unzerApiCreateCustomerResponseTransfer = $unzerApiResponseTransfer->getCreateCustomerResponseOrFail();

        //Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateCustomerResponseTransfer->getId());
    }
}
