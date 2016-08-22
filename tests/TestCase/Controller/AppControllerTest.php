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

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Tests for UsersController
 *
 * @category Test
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
class AppControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_users_users',
        'app.organizations',
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
        'app.news',
        'app.notifications',
        'app.type_missions',
        'app.organizations_members',
        'app.organizations_owners'
    ];

    /**
     * SetUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notifications') ? [] : ['className' => 'App\Model\Table\NotificationsTable'];
        $this->Notifications = TableRegistry::get('Notifications', $config);
    }

    /**
     * TearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notifications);

        parent::tearDown();
    }

    /**
     * Test language - Ok
     *
     * @return void
     */
    public function testCheckLanguageSet()
    {
        $expected = "fr_CA";

        $this->get('/pages/home?lang=fr_CA');
        $actual = I18n::locale();

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test language - empty
     *
     * @return void
     */
    public function testCheckLanguageEmpty()
    {
        $expected = I18n::locale();

        $this->get('/pages/home');
        $actual = I18n::locale();

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test language - empty
     *
     * @return void
     */
    public function testCheckLanguageGetNotEmpty()
    {
        $expected = "fr_CA";
        $_GET['lang'] = $expected;

        $this->get('/pages/home');
        $actual = I18n::locale();

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test beforeFilter updateNotifications - empty
     *
     * @return void
     */
    public function testBeforeFilterUpdateNotificationsMarkAsRead()
    {
        $notificationId = 2;
        $expected = true;

        $this->session(['Auth.User.id' => 1]);

        $this->get('projects/view/1');

        $isRead = $this->Notifications->get($notificationId)->isRead();

        $this->assertEquals($expected, $isRead);
    }
}
