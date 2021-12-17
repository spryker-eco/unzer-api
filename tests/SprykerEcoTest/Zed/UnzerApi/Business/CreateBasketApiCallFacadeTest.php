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
class CreateBasketApiCallFacadeTest extends UnzerApiFacadeBaseTest
{
    /**
     * @var string
     */
    protected const FIXTURE_FILE_NAME = 'createBasketResponseBody.json';

    /**
     * @return void
     */
    public function testPerformCreateBasketApiCall(): void
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