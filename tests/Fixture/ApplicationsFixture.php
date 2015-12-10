<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsFixture
 *
 */
class ApplicationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'mission_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'accepted' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'rejected' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'type_mission_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'text' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'mission_id' => 8,
            'user_id' => 1,
            'accepted' => 0,
            'rejected' => 0,
			'text' => '',
			'email' => 'test@test.com',
			'type_mission_id' => 1
        ],
        [
            'id' => 2,
            'mission_id' => 8,
            'user_id' => 1,
            'accepted' => 1,
            'rejected' => 0
        ],
        [
            'id' => 3,
            'mission_id' => 8,
            'user_id' => 1,
            'accepted' => 0,
            'rejected' => 0
        ],
        [
            'id' => 4,
            'mission_id' => 9,
            'user_id' => 1,
            'accepted' => 0,
            'rejected' => 0
        ],
        [
            'id' => 5,
            'mission_id' => 9,
            'user_id' => 1,
            'accepted' => 0,
            'rejected' => 0
        ],
        [
            'id' => 6,
            'mission_id' => 1,
            'user_id' => 1,
            'accepted' => 0,
            'rejected' => 0
        ],
    ];
}
