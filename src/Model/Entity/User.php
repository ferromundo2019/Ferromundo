<?php
namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string|null $phone
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Purchase[] $purchases
 * @property \App\Model\Entity\Sale[] $sales
 */
class User extends Entity
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
        'role_id' => true,
        'email' => true,
        'password' => true,
        'name' => true,
        'surname' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'purchases' => true,
        'sales' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    // Add this method
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
