<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\OrderDetail; // Import OrderDetail model to fetch details of the order

class OrderTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch orders to associate transactions
        $orders = Order::all();

        if ($orders->isEmpty()) {
            $this->command->warn('No orders found. Please seed the orders table first.');
            return;
        }

        // Create 10 transactions for the first 10 orders
        foreach ($orders as $order) {
            // Sum the total value of the order by multiplying product price by quantity
            $totalValue = $order->details->sum(function ($orderDetail) {
                return $orderDetail->product->price ?? 100 * $orderDetail->quantity ?? 1;
            });

            // Create a transaction for the current order with the calculated value
            Transaction::create([
                'store_id' => $order->store_id,
                'category_id' => $order->id, // or any other category you want
                'category' => 'Pesanan', // You can adjust this as needed
                'value' => $totalValue, // Set the value as the total value of the order
                'type' => 'Untung', // Set the type to "Untung" for profit
                'date' => now()->subDays(rand(1, 30)), // Set a random transaction date in the past 30 days
                'status' => fake()->randomElement(['Menunggu', 'Selesai']), // Set status to either "Menunggu" or "Selesai"
                'description' => fake()->sentence(), // Add a random description
            ]);
        }
    }
}
