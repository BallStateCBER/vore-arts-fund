<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Image Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $weight
 * @property string $caption
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Application $application
 */
class Image extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'application_id' => true,
        'weight' => true,
        'caption' => true,
        'created' => true,
        'application' => true,
    ];
}
