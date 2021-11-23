<?php

namespace SprykerEcoTest\Zed\UnzerApi\Business;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class CreateBasketApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    protected const FIXTURE_FILE_NAME = 'createBasketResponseBody.json';

    /**
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        //Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        //Act
        $unzerApiResponseTransfer = $this->facade->performCreateBasketApiCall($unzerApiRequestTransfer);
        $unzerApiCreateBasketResponseTransfer = $unzerApiResponseTransfer->getCreateBasketResponseOrFail();

        //Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreateBasketResponseTransfer->getId());
    }
}
