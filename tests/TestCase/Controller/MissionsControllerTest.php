<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MissionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MissionsController Test Case
 */
class MissionsControllerTest extends IntegrationTestCase
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
     * Test view - Ok
     *
     * @return void
     */
    public function testViewOk()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/missions/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [
            'id' => 3,
            'name' => 'Dev',
            'session' => 3,
            'length' => 3,
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'competence' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'internNbr' => 1,
            'project_id' => 1,
            'mentor_id' => 1,
            'created' => '2015-10-20 15:10:06',
            'modified' => '2015-10-20 15:10:06'
        ];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'view', 1]);
    }

    /**
     * Test add - Fail
     *
     * @return void
     */
    public function testAddFail()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/missions/add/1', $data);

        $this->assertResponseSuccess();
    }

    /**
     * Test add - No Permission
     *
     * @return void
     */
    public function testAddNoPerm()
    {
        $this->session(['Auth.User.id' => 3]);

        $data = [];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }
    /**
     * Test add - Ok
     *
     * @return void
     */
    public function testAddNoProject()
    {
        $this->session(['Auth.User.id' => 2]);

        $data = [];
        $this->post('/missions/add/', $data);

        $this->assertRedirect(['controller' => 'Projects', 'action' => 'index']);
    }


    /**
     * Test add - No Authentification
     *
     * @return void
     */
    public function testAddNoAuth()
    {
        $data = [];
        $this->post('/missions/add/1', $data);

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    }
}
