<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ejemplar Entity
 *
 * @property int $id
 * @property string|null $isbn
 * @property string|null $editorial
 * @property int|null $cantidad
 * @property int $libro_id
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Libro $libro
 */
class Ejemplar extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'isbn' => true,
        'editorial' => true,
        'cantidad' => true,
        'libro_id' => true,
        'modified' => true,
        'created' => true,
        'libro' => true,
    ];
}
