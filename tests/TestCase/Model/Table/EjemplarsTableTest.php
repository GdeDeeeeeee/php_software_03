<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EjemplarsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EjemplarsTable Test Case
 */
class EjemplarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EjemplarsTable
     */
    protected $Ejemplars;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Ejemplars',
        'app.Libros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ejemplars') ? [] : ['className' => EjemplarsTable::class];
        $this->Ejemplars = $this->getTableLocator()->get('Ejemplars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ejemplars);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EjemplarsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EjemplarsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
