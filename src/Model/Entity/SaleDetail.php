<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleDetail Entity
 *
 * @property int $id
 * @property int $article_id
 * @property int $sale_id
 * @property float $quantity
 * @property float|null $cost
 *
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\Sale $sale
 */
class SaleDetail extends Entity
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
        'article_id' => true,
        'sale_id' => true,
        'quantity' => true,
        'cost' => true,
        'article' => true,
        'sale' => true
    ];
}
