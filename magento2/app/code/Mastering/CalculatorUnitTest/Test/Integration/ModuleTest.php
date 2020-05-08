<?php


namespace Mastering\CalculatorUnitTest\Test\Integration;

use Magento\Framework\Module\ModuleList\Loader;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    /**
     * @var Loader
     */
    private $config;

    /**
     * @var string
     */
    private $moduleName;

    protected function setUp()
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->config = $objectManager->create(Loader::class);
        $this->moduleName = 'Mastering_CalculatorUnitTest';
    }

    public function testModuleExistInCalculatorModule()
    {
        $modulesList = $this->config->load();
        $this->assertArrayHasKey($this->moduleName, $modulesList);
    }

    public function testModuleWidgetExistInCalculatorModule()
    {

        $modulesList = $this->config->load();

        $expectedDependencies = 'Magento_Catalog';
        $moduleConfig = $modulesList[$this->moduleName];
        $this->assertContains($expectedDependencies, $moduleConfig['sequence']);
    }

//    /**
//     * @param $moduleDependency
//     * @dataProvider modulesLoadProvider
//     */
//    public function testModuleWidgetExistInCalculatorModule($moduleDependency, $result)
//    {
//
//        $modulesList = $this->config->load();
//
//        $expectedDependencies = $moduleDependency;
//        $moduleConfig = $modulesList[$this->moduleName];
//        $this->assertEquals($result, $this->assertContains($expectedDependencies, $moduleConfig['sequence']));
//    }
//
//    public function modulesLoadProvider()
//    {
//        return [
//            ['Magento_Widget', null],
//            ['Magento_Catalog', ExpectationFailedException::class]
//        ];
//    }

}
