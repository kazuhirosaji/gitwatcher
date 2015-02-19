<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Repo Entity.
 */
class Repo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'user_id' => true,
        'url' => true,
        'language_id' => true,
        'user' => true,
        'language' => true,
    ];
}
