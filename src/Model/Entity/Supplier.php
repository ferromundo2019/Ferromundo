<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $id
 * @property string $ruc
 * @property string|null $social_reason
 * @property string $contact_name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Purchase[] $purchases
 */
class Supplier extends Entity
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
        'ruc' => true,
        'social_reason' => true,
        'contact_name' => true,
        'phone' => true,
        'address' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'purchases' => true
    ];
}
