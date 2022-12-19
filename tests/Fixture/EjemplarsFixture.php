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
                'precio' => 1.5,
                'stock' => 1,
                'cantidad' => 1,
                'libro_id' => 1,
                'modified' => '2022-12-19 10:32:37',
                'created' => '2022-12-19 10:32:37',
            ],
        ];
        parent::init();
    }
}
