<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - string - contains the category description
     * $this->attributes['active'] - bool - contains whether the category is active
     * $this->attributes['created_at'] - timestamp - contains the category creation date
     * $this->attributes['updated_at'] - timestamp - contains the category update date
     * $this->products - Product[] - contains the associated products
     */
    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function setActive(bool $active): void
    {
        $this->attributes['active'] = $active;
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

    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function setProducts(Collection $products): void
    {
        $this->setRelation('products', $products);
    }

    public function activate(): void
    {
        $this->setActive(true);
        $this->save();
    }

    public function deactivate(): void
    {
        $this->setActive(false);
        $this->save();
    }
}
