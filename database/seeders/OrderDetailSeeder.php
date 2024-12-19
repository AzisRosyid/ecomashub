<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderDetail::truncate();

        // OrderDetail::factory()->createMany([
        //     [
        //         'order_id' => 1,
        //         'product_id' => 1,
        //         'quantity' => 2,
        //     ],
        // ]);

        // Get all orders and products
        $orders = Order::all();
        $products = Product::all();

        // Track used combinations to ensure uniqueness
        $usedCombinations = [];

        // Loop to insert 35 unique order details
        $counter = 0;
        while ($counter < 35) {
            // Randomly select an order and a product
            $order = $orders->random();
            $product = $products->random();

            // Create a unique combination of order_id and product_id
            $combination = $order->id . '-' . $product->id;

            // Check if the combination has been used
            if (!in_array($combination, $usedCombinations)) {
                // Insert the order detail
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 10), // Random quantity between 1 and 10
                ]);

                // Mark this combination as used
                $usedCombinations[] = $combination;
                $counter++; // Increment counter
            }
        }
    }
}
