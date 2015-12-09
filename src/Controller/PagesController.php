<?php
/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use GithubApi;

/**
 * Pages controller
 *
 * @category Controller
 * @package  Website
 * @author   CakePHP <cakephp@email.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://cakephp.org CakePHP(tm) Project
 */
class PagesController extends AppController
{
    /**
     * Filter preparation
     *
     * @param Event $event event
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'home', 'tv', 'statistics', 'administration']);
    }
    
    /**
     * Display method
     * @return redirect
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    /**
     * Home method
     * @return void
     */
    public function home()
    {
        $this->viewBuilder()->layout(false);
        $this->loadModel("Users");
        $numberUsers = $this->Users->find('all')->count();
        $numberStudents = $this->Users->find('all')->where(['isStudent' => true])->count();

        $this->loadModel("Projects");
        $numberProjects = $this->Projects->find('all')->count();

        $this->loadModel("Missions");
        $numberMissions = $this->Missions->find('all')->count();

        $this->set(compact('numberUsers', 'numberProjects', 'numberMissions', 'numberStudents'));
    }

    /**
     * TV Method
     * @param null $id tv page
     * @return redirect
     */
    public function tv($id = null)
    {
        $this->loadModel("Users");
        $users = $this->Users->find('all')->toArray();

        $this->loadModel("Projects");
        $projects = $this->Projects->find('all')->toArray();

        $this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all')->toArray();

        $this->loadModel("Missions");
        $missions = $this->Missions->find('all')->toArray();

        $this->loadModel("Universities");
        $universities = $this->Universities->find('all')->toArray();

        $countUni = [];

        $loopCount = count($universities) + 1;
        for ($i = 0; $i < $loopCount; $i++) {
            $countUni[] = 0;
        }

        $mentors = 0;
        $students = 0;

        foreach ($users as $user) {
            $user = $this->Users->get(
                $user->getId(),
                [
                    'contain' => ['Universities']
                ]
            );

            if ($user->getUniversity()) {
                // @codingStandardsIgnoreStart
                switch ($user->getUniversity()->getId()) {
                    case 1:
                        $countUni[0] = $countUni[0] + 1;
                        break;
                    case 2:
                        $countUni[1] = $countUni[1] + 1;
                        break;
                    case 3:
                        $countUni[2] = $countUni[2] + 1;
                        break;
                    case 4:
                        $countUni[3] = $countUni[3] + 1;
                        break;
                    case 5:
                        $countUni[4] = $countUni[4] + 1;
                        break;
                    case 6:
                        $countUni[5] = $countUni[5] + 1;
                        break;
                    case 7:
                        $countUni[6] = $countUni[6] + 1;
                        break;
                    default:
                        $countUni[7] = $countUni[7] + 1;
                        break;
                    // @codingStandardsIgnoreEnd
                }
            } else {
                $countUni[7] = $countUni[7] + 1;
            }


            if ($user->isAvailableMentoring()) {
                $mentors++;
            }

            if ($user->isStudent()) {
                $students++;
            }
        }

        $statsUni = [];

        $loopCount = count($universities);
        for ($i = 0; $i < $loopCount; $i++) {
            $statsUni[] = [
                $this->Universities->findById($i + 1)->first()->getName(),
                $countUni[$i]
            ];
        }

        $statsUni[] = [
            __('Not specified'),
            $countUni[count($universities)]
        ];

        $statsUsers = [
            'universities' => $statsUni,
            'mentors' => $mentors,
            'students' => $students,
            'count' => count($users)
        ];

        $statsWeb = [
            'organizations' => count($organizations),
            'projects' => count($projects),
            'missions' => count($missions)

        ];

        $stats = [
            'users' => $statsUsers,
            'website' => $statsWeb
        ];

        $this->set(compact('stats'));

        $this->viewBuilder()->layout(false);
        // @codingStandardsIgnoreStart
        switch ($id) {
            case 1:
                $this->render('tv1');
                break;
            case 2:
                $this->render('tv2');
                break;
            case 3:
                $this->render('tv1');
                break;
            case 4:
                $this->render('tv1');
                break;
            case 5:
                $this->render('tv1');
                break;
            default:
                $this->render('tv1');
                break;
        }
        // @codingStandardsIgnoreEnd
    }

    
    /**
     * Statistics method
     * @return void
     */
    public function statistics()
    {
        $this->loadModel("Statistics");
        $statistics = $this->Statistics->find('all')->toArray();
        
        $this->loadModel("Users");
        $users = $this->Users->find('all')->toArray();
        
        $this->loadModel("Projects");
        $projects = $this->Projects->find('all')->toArray();
        
        $this->loadModel("Organizations");
        $organizations = $this->Organizations->find('all')->toArray();
        
        $this->loadModel("Missions");
        $missions = $this->Missions->find('all')->toArray();
        
        $this->loadModel("Universities");
        $universities = $this->Universities->find('all')->toArray();
    
        $issues = 0;
        $prs = 0;
        $commits = 0;
        
        $contributions = [];
        
        if ($statistics) {
            foreach ($statistics as $statistic) {
                $contributions[] = [
                $statistic->getContributionDate(),
                $statistic->getContribution()
                ];
                
                $issues += $statistic->getIssues();
                $prs += $statistic->getPullRequests();
                $commits += $statistic->getCommits();
            }
        }
        
        $countUni = [];
        
        $loopCount = count($universities) + 1;
        for ($i = 0; $i < $loopCount; $i++) {
            $countUni[] = 0;
        }
        
        $mentors = 0;
        $students = 0;
        
        foreach ($users as $user) {
            $user = $this->Users->get(
                $user->getId(),
                [
                'contain' => ['Universities']
                ]
            );
            
            if ($user->getUniversity()) {
				// @codingStandardsIgnoreStart
                switch ($user->getUniversity()->getId()) {
                    case 1: 
                        $countUni[0] = $countUni[0] + 1;
                        break;
                    case 2:
                        $countUni[1] = $countUni[1] + 1;
                        break;
                    case 3:
                        $countUni[2] = $countUni[2] + 1;
                        break;
                    case 4:
                        $countUni[3] = $countUni[3] + 1;
                        break;
                    case 5:
                        $countUni[4] = $countUni[4] + 1;
                        break;
                    case 6:
                        $countUni[5] = $countUni[5] + 1;
                        break;
                    case 7:
                        $countUni[6] = $countUni[6] + 1;
                        break;
                    default:
                        $countUni[7] = $countUni[7] + 1;
                        break;
				// @codingStandardsIgnoreEnd
                }
            } else {
                $countUni[7] = $countUni[7] + 1;
            }
            
            
            if ($user->isAvailableMentoring()) {
                $mentors++;
            }
            
            if ($user->isStudent()) {
                $students++;
            }
        }
       
        $statsUni = [];
        
        $loopCount = count($universities);
        for ($i = 0; $i < $loopCount; $i++) {
            $statsUni[] = [
                $this->Universities->findById($i + 1)->first()->getName(),
                $countUni[$i]
            ];
        }
        
        $statsUni[] = [
            __('Not specified'),
            $countUni[count($universities)]
        ];
        
        $statsRepo = [
            'issues' => $issues,
            'pullRequests' => $prs,
            'commits' => $commits
        ];
        
        $statsUsers = [
            'universities' => $statsUni,
            'mentors' => $mentors,
            'students' => $students,
            'count' => count($users)
        ];
        
        $statsWeb = [
            'organizations' => count($organizations),
            'projects' => count($projects),
            'missions' => count($missions)
            
        ];
        
        $stats = [
            'repository' => $statsRepo,
            'users' => $statsUsers,
            'website' => $statsWeb
        ];
        
        $this->set(compact('contributions', 'stats'));
    }

    /**
     * Administration method
     * @return void
     */
    public function administration()
    {
        $this->loadModel("Projects");
        $projects = $this->Projects->find('all', ['conditions' => ['accepted' => 0, 'archived' => 0]])->toArray();

        $this->set(compact('projects',));
    }
}
