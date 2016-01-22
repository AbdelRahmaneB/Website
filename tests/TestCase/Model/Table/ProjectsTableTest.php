<?php
/**
 * Tests for ProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsTable;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * Tests for ProjectsTable
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class ProjectsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
    'app.type_users_users',
    'app.organizations',
    'app.organizations_Projects',
    'app.users',
    'app.type_users',
    'app.svn_users',
    'app.svns',
    'app.universities',
    'app.comments',
    'app.projects',
    'app.projects_contributors',
    'app.projects_mentors',
    'app.missions'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Projects') ? [] : ['className' => 'App\Model\Table\ProjectsTable'];
        $this->Projects = TableRegistry::get('Projects', $config);
        $config = TableRegistry::exists('Organizations') ? [] : ['className' => 'App\Model\Table\OrganizationsTable'];
        $this->Organizations = TableRegistry::get('Organizations', $config);
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projects);

        parent::tearDown();
    }

    /**
     * Test getId
     *
     * @return void
     */
    public function testGetId()
    {
        $id = 1;
        $expected = 1;

        $project = $this->Projects->get($id);

        $result = $project->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getName
     *
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'projet1';

        $project = $this->Projects->get($id);

        $result = $project->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLink
     *
     * @return void
     */
    public function testGetLink()
    {
        $id = 1;
        $expected = 'www.website.com';

        $project = $this->Projects->get($id);

        $result = $project->getLink();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getDescription
     *
     * @return void
     */
    public function testGetDescription()
    {
        $id = 1;
        $expected = 'bla bla';

        $project = $this->Projects->get($id);

        $result = $project->getDescription();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isAccepted
     *
     * @return void
     */
    public function testIsAccepted()
    {
        $id = 1;
        $expected = 1;

        $project = $this->Projects->get($id);

        $result = $project->isAccepted();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test isArchived
     *
     * @return void
     */
    public function testIsArchived()
    {
        $id = 4;
        $expected = 1;

        $project = $this->Projects->get($id);

        $result = $project->isArchived();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentors
     *
     * @return void
     */
    public function testGetMentors()
    {
        $id = 1;

        $expected = $this->Users->get(1)->getId();

        $projects = $this->Projects->get($id, ['contain' => 'Mentors']);

        $result = $projects->getMentors()[0]->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentors
     *
     * @return void
     */
    public function testGetOrganizations()
    {
        $id = 1;

        $expected = $this->Users->get(1)->getId();

        $org = $this->Projects->get($id, ['contain' => 'Organizations']);

        $result = $org->getOrganizations()[0]->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editName
     *
     * @return void
     */
    public function testSetName()
    {
        $id = 1;
        $expected = 'projet';

        $project = $this->Projects->get($id);

        $result = $project->editName($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMissions
     *
     * @return void
     */
    public function testGetMissions()
    {
        $id = 1;
        $expected = 9;

        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Missions']
            ]
        );

        $result = count($project->getMissions());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editLink
     *
     * @return void
     */
    public function testSetLink()
    {
        $id = 1;
        $expected = 'www.allo.com';

        $project = $this->Projects->get($id);

        $result = $project->editLink($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editDescription
     *
     * @return void
     */
    public function testSetDescription()
    {
        $id = 1;
        $expected = 'chose a lire';

        $project = $this->Projects->get($id);

        $result = $project->editDescription($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editAccepted
     *
     * @return void
     */
    public function testSetAccepted()
    {
        $id = 1;
        $expected = 0;

        $project = $this->Projects->get($id);

        $result = $project->editAccepted($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editArchived
     *
     * @return void
     */
    public function testSetArchived()
    {
        $id = 1;
        $expected = 0;

        $project = $this->Projects->get($id);

        $result = $project->editArchived($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test editMentors
     *
     * @return void
     */
    public function testSetMentors()
    {
        $id = 1;
        $expected = [$this->Users->get($id)];

        $project = $this->Projects->get($id);

        $result = $project->editMentors($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test modifyMentors
     *
     * @return void
     */
    public function testModifyMentors()
    {
        $id = 1;
        $expected = 1;

        $project = $this->Projects->get($id);

        $project->modifyMentors([$id]);
        $result = count($project->getMentors());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test checkMentorless
     *
     * @return void
     */
    public function testCheckMentorless()
    {
        $id = 1;
        $expected = 9;

        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Missions']
            ]
        );

        $mentor = $this->Users->get(2);

        $project->editMentors([$mentor]);
        $result = count($project->checkMentorless());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test checkMentorless - No mentorless
     *
     * @return void
     */
    public function testCheckMentorlessNo()
    {
        $id = 5;
        $expected = 0;

        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Missions']
            ]
        );

        $mentor = $this->Users->get(5);

        $project->editMentors([$mentor]);
        $result = count($project->checkMentorless());

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     *
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->Projects->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     *
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->Projects->buildRules($rule);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation Link Rules
     *
     * @return void
     */
    public function testValidationWebsite()
    {
        $id = 1;
        $project = $this->Projects->get($id);

        $this->Projects->patchEntity($project, ['link' => 'www.website.com']);
        $result = $this->Projects->save($project);

        if ($result != false) {
            $result = true;
        }

        $this->assertFalse($result);
    }
}
