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
class SetNotificationUrlApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    protected const FIXTURE_FILE_NAME = 'setNotificationUrlResponseBody.json';

    /**
     * @throws \Spryker\Shared\Kernel\Transfer\Exception\NullValueException
     */
    public function testPerformCreateCustomerApiCall(): void
    {
        //Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        //Act
        $unzerApiResponseTransfer = $this->facade->performSetNotificationUrlApiCall($unzerApiRequestTransfer);
        $unzerApiSetWebhookResponseTransfer = $unzerApiResponseTransfer->getSetWebhookResponseOrFail();

        //Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiSetWebhookResponseTransfer->getId());
        $this->assertEquals(UnzerApiZedTester::WEBHOOK_URL, $unzerApiSetWebhookResponseTransfer->getUrl());
        $this->assertEquals(UnzerApiZedTester::WEBHOOK_EVENT, $unzerApiSetWebhookResponseTransfer->getEvent());
    }
}
