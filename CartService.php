<?php

interface CartService
{
    public function getCart(int $userId): array;
    public function addToCart(int $userId, string $productId, int $quantity): bool;
    public function updateCart(int $userId, string $productId, int $quantity): bool;
    public function removeFromCart(int $userId, string $productId): bool;
    public function clearCart(int $userId): bool;
}