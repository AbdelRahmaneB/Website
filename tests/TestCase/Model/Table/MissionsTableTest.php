<?php
/**
 * Tests for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

/**
 * Tests for MissionsTable
 *
 * @category Test
 * @package  Website
 * @author   Simon Begin <ak36250@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Site
 */
class MissionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.missions',
        'app.projects',
        'app.applications',
        'app.users',
        'app.universities',
        'app.comments',
        'app.projects_contributors',
        'app.organizations',
        'app.organizations_projects',
        'app.projects_mentors',
        'app.type_users',
        'app.permissions',
        'app.permissions_type_users',
        'app.type_users_users',
        'app.mission_levels',
        'app.missions_mission_levels',
        'app.type_missions',
        'app.missions_type_missions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Missions') ? [] : ['className' => 'App\Model\Table\MissionsTable'];
        $this->Missions = TableRegistry::get('Missions', $config);
        $config = TableRegistry::exists('Projects') ? [] : ['className' => 'App\Model\Table\ProjectsTable'];
        $this->Projects = TableRegistry::get('Projects', $config);
        $config = TableRegistry::exists('MissionLevels') ? [] : ['className' => 'App\Model\Table\MissionLevelsTable'];
        $this->Levels = TableRegistry::get('MissionLevels', $config);
        $config = TableRegistry::exists('TypeMissions') ? [] : ['className' => 'App\Model\Table\TypeMissionsTable'];
        $this->Type = TableRegistry::get('TypeMissions', $config);
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Missions);

        parent::tearDown();
    }

    /**
     * Test getName
     * @return void
     */
    public function testGetName()
    {
        $id = 1;
        $expected = 'Dev';

        $mission = $this->Missions->get($id);

        $result = $mission->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProjectId
     * @return void
     */
    public function testGetProjectId()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getProjectId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentorId
     * @return void
     */
    public function testGetMentorId()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getMentorId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getProject
     * @return void
     */
    public function testGetProject()
    {
        $id = 1;

        $expected = $this->Projects->get(1);

        $mission = $this->Missions->get($id, ['contain' => 'Projects']);

        $result = $mission->getProject();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getDescription
     * @return void
     */
    public function testGetDescription()
    {
        $id = 1;
        $expected = 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.';

        $mission = $this->Missions->get($id);

        $result = $mission->getDescription();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getCompetence
     * @return void
     */
    public function testGetCompetence()
    {
        $id = 1;
        $expected = 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.';

        $mission = $this->Missions->get($id);

        $result = $mission->getCompetence();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getInternNbr
     * @return void
     */
    public function testGetInternNbr()
    {
        $id = 1;
        $expected = 1;

        $mission = $this->Missions->get($id);

        $result = $mission->getInternNbr();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession1
     * @return void
     */
    public function testGetSession1()
    {
        $id = 1;
        $expected = __('Winter');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession2
     * @return void
     */
    public function testGetSession2()
    {
        $id = 2;
        $expected = __('Summer');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession3
     * @return void
     */
    public function testGetSession3()
    {
        $id = 3;
        $expected = __('Fall');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getSession4
     * @return void
     */
    public function testGetSession4()
    {
        $id = 4;
        $expected = __('Not specified');

        $mission = $this->Missions->get($id);

        $result = $mission->getSession();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength1
     * @return void
     */
    public function testGetLength1()
    {
        $id = 1;
        $expected = __('1 term');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength2
     * @return void
     */
    public function testGetLength2()
    {
        $id = 2;
        $expected = __('2 terms');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength3
     * @return void
     */
    public function testGetLength3()
    {
        $id = 3;
        $expected = __('3 terms');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLength4
     * @return void
     */
    public function testGetLength4()
    {
        $id = 4;
        $expected = __('Not specified');

        $mission = $this->Missions->get($id);

        $result = $mission->getLength();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getLevels
     * @return void
     */
    public function testGetLevels()
    {
        $id = 1;

        $expected = $this->Levels->get(1)->getName();

        $mission = $this->Missions->get($id, ['contain' => 'MissionLevels']);

        $result = $mission->getLevels()[0]->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getType
     * @return void
     */
    public function testGetType()
    {
        $id = 1;

        $expected = $this->Type->get(1)->getName();

        $mission = $this->Missions->get($id, ['contain' => 'TypeMissions']);

        $result = $mission->getType()[0]->getName();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test getMentor
     * @return object user
     */
    public function testGetMentor()
    {
        $id = 1;

        $expected = $this->Users->get(1)->getId();

        $mission = $this->Missions->get($id, ['contain' => 'Users']);

        $result = $mission->getMentor()->getId();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setProjectId
     * @return void
     */
    public function testSetProjectId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Missions->get($id);

        $result = $user->editProjectId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test setMentorId
     * @return void
     */
    public function testSetMentorId()
    {
        $id = 1;
        $expected = 1;

        $user = $this->Missions->get($id);

        $result = $user->editMentorId($expected);

        $this->assertEquals($expected, $result);
    }

    /**
     * Test validation
     * @return void
     */
    public function testValidation()
    {
        $validator = new Validator();

        $expected = $validator;

        $result = $this->Missions->validationDefault($validator);

        $this->assertEquals($validator, $result);
    }

    /**
     * Test buildRules
     * @return void
     */
    public function testBuildRules()
    {
        $rule = new RulesChecker();

        $expected = $rule;

        $result = $this->Missions->buildRules($rule);

        $this->assertEquals($expected, $result);
    }
}
