<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $image
 * @property int $category_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Basket[] $basket
 * @property \App\Model\Entity\Daily[] $dailies
 * @property \App\Model\Entity\OrderProduct[] $order_products
 */
class Product extends Entity
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
        '*' => true,
        'id' => false
    ];
}
