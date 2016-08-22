<?php
/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\Auth;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for PagesController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class PagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_users_users',
        'app.organizations',
        'app.organizations_owners',
        'app.organizations_members',
        'app.users',
        'app.type_users',
        'app.svn_users',
        'app.svns',
        'app.universities',
        'app.projects',
        'app.projects_contributors',
        'app.projects_mentors',
        'app.missions',
        'app.permissions',
        'app.permissions_type_users',
        'app.hashes',
        'app.hash_types',
        'app.statistics',
        'app.notifications',
        'app.news'
    ];

    /**
     * Test statistics - Ok
     *
     * @return void
     */
    public function testStatisticsOk()
    {
        $this->session(['Auth.User.id' => 2]);

        $this->get('/pages/statistics');
        $this->assertResponseOk();
    }

    /**
     * Test statistics - No Authentification
     *
     * @return void
     */
    public function testStatisticsNoAuth()
    {
        $this->get('/pages/statistics');
        $this->assertResponseOk();
    }

    /**
     * Test statistics - No Perm
     *
     * @return void
     */
    public function testStatisticsNoPerm()
    {
        $this->get('/pages/statistics');
        $this->assertResponseOk();
    }

    /**
     * Test tv 1 - View television page
     *
     * @return void
     */
    public function testTv1()
    {
        $this->get('/pages/tv/1');
        $this->assertResponseOk();
    }

    /**
     * Test tv 2 - View television page
     *
     * @return void
     */
    public function testTv2()
    {
        $this->get('/pages/tv/2');
        $this->assertResponseOk();
    }

    /**
     * Test tv 3 - View television page
     *
     * @return void
     */
    public function testTv3()
    {
        $this->get('/pages/tv/3');
        $this->assertResponseOk();
    }

    /**
     * Test tv 2 - View television page
     *
     * @return void
     */
    public function testTv4()
    {
        $this->get('/pages/tv/4');
        $this->assertResponseOk();
    }

    /**
     * Test tv 2 - View television page
     *
     * @return void
     */
    public function testTv5()
    {
        $this->get('/pages/tv/5');
        $this->assertResponseOk();
    }
}
