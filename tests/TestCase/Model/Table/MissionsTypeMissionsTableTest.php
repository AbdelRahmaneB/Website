<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTypeMissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MissionsTypeMissionsTable Test Case
 */
class MissionsTypeMissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions_type_missions',
        'app.type_missions',
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_contributors',
        'app.projects_mentored',
        'app.organizations',
        'app.organizations_projects',
        'app.contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.type_users_users',
        'app.mentors',
        'app.type_applications',
        'app.mission_levels',
        'app.missions_mission_levels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MissionsTypeMissions') ? [] : ['className' => 'App\Model\Table\MissionsTypeMissionsTable'];
        $this->MissionsTypeMissions = TableRegistry::get('MissionsTypeMissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MissionsTypeMissions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
