<?php
/**
 * Tests for OrganizationsOwnersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizationsProjectsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for OrganizationsOwnersTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class OrganizationsOwnersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizations_owners',
        'app.organizations',
        'app.projects',
        'app.missions',
        'app.applications',
        'app.users',
        'app.universities',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.organizations_members'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrganizationsOwners') ? [] : ['className' => 'App\Model\Table\OrganizationsOwnersTable'];
        $this->OrganizationsOwners = TableRegistry::get('OrganizationsOwners', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrganizationsOwners);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->OrganizationsOwners->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->OrganizationsOwners->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
