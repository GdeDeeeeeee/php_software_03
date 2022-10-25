<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EjemplarsFixture
 */
class EjemplarsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'isbn' => 'Lorem ipsum dolor ',
                'editorial' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 1,
                'libro_id' => 1,
                'modified' => '2022-10-25 04:42:42',
                'created' => '2022-10-25 04:42:42',
            ],
        ];
        parent::init();
    }
}
