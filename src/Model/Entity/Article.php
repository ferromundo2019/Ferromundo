<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property float $price
 * @property int $brand_id
 * @property int $category_id
 * @property float $stack
 * @property float $quantity
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\PurchaseDetail[] $purchase_details
 * @property \App\Model\Entity\SaleDetail[] $sale_details
 */
class Article extends Entity
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
        'name' => true,
        'code' => true,
        'description' => true,
        'price' => true,
        'brand_id' => true,
        'category_id' => true,
        'stack' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'brand' => true,
        'category' => true,
        'purchase_details' => true,
        'sale_details' => true
    ];
}
