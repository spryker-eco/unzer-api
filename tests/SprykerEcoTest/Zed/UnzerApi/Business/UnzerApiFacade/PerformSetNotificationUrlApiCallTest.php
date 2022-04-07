<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacade;

use SprykerEcoTest\Zed\UnzerApi\Business\UnzerApiFacadeBaseTest;
use SprykerEcoTest\Zed\UnzerApi\UnzerApiZedTester;

/**
 * @group Functional
 * @group SprykerEco
 * @group Zed
 * @group UnzerApi
 * @group Business
 * @group UnzerApiFacade
 */
class PerformSetNotificationUrlApiCallTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'setNotificationUrlResponseBody.json';

    /**
     * @return void
     */
    public function testReturnsSuccessfulResponse(): void
    {
        // Arrange
        $unzerApiRequestTransfer = $this->tester->createUnzerApiRequestTransfer();

        // Act
        $unzerApiResponseTransfer = $this->facade->performSetNotificationUrlApiCall($unzerApiRequestTransfer);
        $unzerApiSetWebhookResponseTransfer = $unzerApiResponseTransfer->getSetWebhookResponseOrFail();

        // Assert
        $this->assertTrue($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiSetWebhookResponseTransfer->getId());
        $this->assertEquals(UnzerApiZedTester::WEBHOOK_URL, $unzerApiSetWebhookResponseTransfer->getUrl());
        $this->assertEquals(UnzerApiZedTester::WEBHOOK_EVENT, $unzerApiSetWebhookResponseTransfer->getEvent());
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
        $unzerApiResponseTransfer = $this->facade->performSetNotificationUrlApiCall($unzerApiRequestTransfer);

        // Assert
        $this->assertFalse($unzerApiResponseTransfer->getIsSuccessful());
        $this->assertNotEmpty($unzerApiResponseTransfer->getErrorResponse());
    }
}
