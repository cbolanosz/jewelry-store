<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['material'] - string - contains the product material
     * $this->attributes['price'] - float - contains the product price
     * $this->attributes['stock'] - int - contains the product available units
     * $this->attributes['weight'] - float - contains the product weight in grams
     * $this->attributes['image_url'] - string - contains the product image url
     * $this->attributes['active'] - bool - contains whether the product is active
     * $this->attributes['category_id'] - int - contains the associated category id
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->attributes['units_sold'] - int - contains the units sold (only loaded by topSelling)
     * $this->category - Category - contains the associated category
     * $this->orderItems - OrderItem[] - contains the associated order items
     */
    protected $fillable = [
        'name',
        'description',
        'material',
        'price',
        'stock',
        'weight',
        'image_url',
        'active',
        'category_id',
    ];

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function setMaterial(string $material): void
    {
        $this->attributes['material'] = $material;
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function setWeight(float $weight): void
    {
        $this->attributes['weight'] = $weight;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->attributes['image_url'] = $imageUrl;
    }

    public function setActive(bool $active): void
    {
        $this->attributes['active'] = $active;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function getMaterial(): string
    {
        return $this->attributes['material'];
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function getWeight(): float
    {
        return $this->attributes['weight'];
    }

    public function getImageUrl(): string
    {
        return $this->attributes['image_url'];
    }

    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getUnitsSold(): int
    {
        return (int) $this->attributes['units_sold'];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category()->associate($category);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function setOrderItems(Collection $orderItems): void
    {
        $this->setRelation('orderItems', $orderItems);
    }

    public function updateStock(int $quantity): void
    {
        $this->setStock($this->getStock() + $quantity);
        $this->save();
    }

    public function checkAvailability(int $quantity): bool
    {
        return $this->getActive() && $this->getStock() >= $quantity;
    }

    public function applyDiscount(float $percentage): float
    {
        return round($this->getPrice() * (1 - $percentage / 100), 2);
    }

    public static function search(?string $term, ?int $categoryId, ?float $minPrice, ?float $maxPrice): Collection
    {
        $query = Product::with('category')
            ->where('active', true)
            ->whereHas('category', function ($categoryQuery) {
                $categoryQuery->where('active', true);
            });

        if ($term !== null) {
            $query->where(function ($termQuery) use ($term) {
                $termQuery->where('name', 'like', '%'.$term.'%')
                    ->orWhere('material', 'like', '%'.$term.'%');
            });
        }

        if ($categoryId !== null) {
            $query->where('category_id', $categoryId);
        }

        if ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice !== null) {
            $query->where('price', '<=', $maxPrice);
        }

        return $query->orderBy('name')->get();
    }

    public static function topSelling(int $limit): Collection
    {
        return Product::with('category')
            ->where('active', true)
            ->whereHas('orderItems.order', function ($orderQuery) {
                $orderQuery->where('status', '!=', 'cancelled');
            })
            ->withSum(['orderItems as units_sold' => function ($itemQuery) {
                $itemQuery->whereHas('order', function ($orderQuery) {
                    $orderQuery->where('status', '!=', 'cancelled');
                });
            }], 'quantity')
            ->orderBy('units_sold', 'desc')
            ->orderBy('name')
            ->take($limit)
            ->get();
    }
}
