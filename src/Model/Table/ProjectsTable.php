<?php
/**
 * Projects Model
 *
 * @category Table
 * @package  Website
 * @author   Raphael St-Arnaud <am21830@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 */
namespace App\Model\Table;

use App\Model\Entity\Project;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @category Table
 * @package  Website
 * @author   Simon Bégin <simon.begin.1@ens.etsmtl.ca>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 * @link     https://github.com/MaisonLogicielLibre/Website
 * @property \Cake\ORM\Association\HasMany $Missions
 * @property \Cake\ORM\Association\BelongsToMany $Organizations
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class ProjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('projects');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany(
            'Missions',
            [
            'foreignKey' => 'project_id'
            ]
        );
        $this->hasMany(
            'Applications',
            [
                'foreignKey' => 'application_id'
            ]
        );
/*        $this->belongsToMany(
            'Organizations',
            [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'organization_id',
            'joinTable' => 'organizations_projects'
            ]
        );*/
        $this->belongsToMany(
            'Contributors',
            [
            'className' => 'Users',
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'projects_contributors'
            ]
        );
        $this->belongsToMany(
            'Mentors',
            [
            'className' => 'Users',
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'projects_mentors'
            ]
        );
        $this->belongsTo('Organizations');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('link')
            ->add(
                'link',
                'custom',
                [
                    'rule' => function ($value) {
                        if (!preg_match('/^(https?):\/\/(.*)\.(.+)/', $value)) {
                            return false;
                        }
                        return true;
                    },
                    'message' => __('Is not an url (Ex : http://website.ca).')
                ]
            );

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('organization_id', 'create')
            ->notEmpty('organization_id');

        $validator
            ->notEmpty('accepted');

        $validator
            ->notEmpty('archived');

        return $validator;
    }
}
