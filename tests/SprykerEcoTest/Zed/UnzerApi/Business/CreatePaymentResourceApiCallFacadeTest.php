<?php

namespace SprykerEcoTest\Zed\UnzerApi\Business;

use SprykerEcoTest\Zed\UnzerApi\UnzerApiZedTester;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 */
class CreatePaymentResourceApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    protected const FIXTURE_FILE_NAME = 'createPaymentResourceResponseBody.json';

    /**
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        //Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        //Act
        $unzerApiResponseTransfer = $this->facade->performCreatePaymentResourceApiCall($unzerApiRequestTransfer);
        $unzerApiCreatePaymentResourceResponseTransfer = $unzerApiResponseTransfer->getCreatePaymentResourceResponseOrFail();

        //Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiCreatePaymentResourceResponseTransfer->getId());
        $this->assertEquals(UnzerApiZedTester::PAYMENT_METHOD_SOFORT, $unzerApiCreatePaymentResourceResponseTransfer->getMethod());
        $this->assertIsBool($unzerApiCreatePaymentResourceResponseTransfer->getRecurring());
    }
}
