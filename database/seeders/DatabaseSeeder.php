<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(MediaSeeder::class);
        $this->call(OrganizationSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(AssetUnitSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(EntrustSeeder::class);
        $this->call(AssetSeeder::class);
        $this->call(CollaborationSeeder::class);
        $this->call(ExpenseSeeder::class);
        $this->call(DebtSeeder::class);
        $this->call(StoreUserSeeder::class);
        $this->call(WasteTypeSeeder::class);
        $this->call(WasteSeeder::class);
        $this->call(CashSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(OrderDetailSeeder::class);
        // $this->call(OrderTransactionSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
