<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\UnzerApi\Business;

use Codeception\TestCase\Test;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use SprykerEco\Zed\UnzerApi\Business\UnzerApiBusinessFactory;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToGuzzleHttpClientAdapter;
use SprykerEco\Zed\UnzerApi\Dependency\External\UnzerApiToHttpClientInterface;

class UnzerApiFacadeBaseTest extends Test
{
    protected const SUCCESS_RESPONSE_STATUS = 200;
    protected const FIXTURES_FOLDER_NAME = 'Fixtures';
    protected const RESPONSE_HEADERS = [];
    protected const FIXTURE_FILE_NAME = '';

    /**
     * @var \SprykerEcoTest\Zed\UnzerApi\UnzerApiZedTester
     */
    protected $tester;

    /**
     * @var \SprykerEco\Zed\UnzerApi\Business\UnzerApiFacadeInterface
     */
    protected $facade;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->facade = $this->tester->getFacade()->setFactory($this->createFactoryMock());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\SprykerEco\Zed\UnzerApi\Business\UnzerApiBusinessFactory
     */
    protected function createFactoryMock(): UnzerApiBusinessFactory
    {
        $builder = $this->getMockBuilder(UnzerApiBusinessFactory::class);
        $builder->setMethods(
            [
                'getConfig',
                'getEntityManager',
                'getUtilEncodingService',
                'getUnzerApiService',
                'getUnzerApiHttpClient',
            ]
        );

        $stub = $builder->getMock();
        $stub->method('getConfig')
            ->willReturn($this->tester->createConfig());
        $stub->method('getEntityManager')
            ->willReturn($this->tester->createEntityManager());
        $stub->method('getUtilEncodingService')
            ->willReturn($this->tester->createUtilEncodingService());
        $stub->method('getUnzerApiHttpClient')
            ->willReturn($this->createUnzerApiToGuzzleHttpClientAdapterMock());

        return $stub;
    }

    /**
     * @return UnzerApiToHttpClientInterface
     *
     * @throws \Exception
     */
    protected function createUnzerApiToGuzzleHttpClientAdapterMock(): UnzerApiToHttpClientInterface
    {
        return $this->make(
            UnzerApiToGuzzleHttpClientAdapter::class,
            ['guzzleHttpClient' => $this->createGuzzleHttpClientMock()]
        );
    }

    /**
     * @throws \Exception
     *
     * @return \GuzzleHttp\ClientInterface|object
     */
    protected function createGuzzleHttpClientMock(): ClientInterface
    {
        return $this->makeEmpty(
            Client::class,
            ['request' => $this->createResponseMock()]
        );
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function createResponseMock(): ResponseInterface
    {
        return new Response(
            static::SUCCESS_RESPONSE_STATUS,
            static::RESPONSE_HEADERS,
            $this->getResponseBody()
        );
    }

    /**
     * @return string
     */
    protected function getResponseBody(): string
    {
        $fileName = $this->getFixtureDirectory() . DIRECTORY_SEPARATOR . static::FIXTURE_FILE_NAME;
        if (file_exists($fileName) && is_readable($fileName)) {
            return file_get_contents($fileName);
        }

        return '';
    }

    /**
     * @return string
     */
    protected function getFixtureDirectory(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . static::FIXTURES_FOLDER_NAME;
    }
}
