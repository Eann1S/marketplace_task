<?php

interface OrderService
{
    public function createOrder(int $userId): Order;
    public function getOrderById(int $orderId): Order;
    public function updateOrderStatus(int $orderId, string $status): bool;
    public function deleteOrder(int $orderId): bool;
    public function getOrdersByUser(int $userId): array;
}