<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'setNotificationUrlResponseBody.json';

    /**
     * @return void
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
