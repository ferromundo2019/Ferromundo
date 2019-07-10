<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $document_type
 * @property \Cake\I18n\FrozenDate|null $date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\SaleDetail[] $sale_details
 */
class Sale extends Entity
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
        'user_id' => true,
        'document_type' => true,
        'date' => true,
        'user' => true,
        'sale_details' => true
    ];
}
