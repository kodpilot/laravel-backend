<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\products;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(products $products)
    {

    }
    /**
     * Handle the products "created" event.
     *
     * @param  \App\Models\products  $products
     * @return void
     */
    public function created(products $products)
    {
        //
        $products->slug = Str::slug($products->name.' '.$products->id);
        $products->saveQuietly();

    }

    /**
     * Handle the products "updated" event.
     *
     * @param  \App\Models\products  $products
     * @return void
     */
    public function updated(products $products)
    {
        //
    }

    /**
     * Handle the products "deleted" event.
     *
     * @param  \App\Models\products  $products
     * @return void
     */
    public function deleted(products $products)
    {
        //
    }

    /**
     * Handle the products "restored" event.
     *
     * @param  \App\Models\products  $products
     * @return void
     */
    public function restored(products $products)
    {
        //
    }

    /**
     * Handle the products "force deleted" event.
     *
     * @param  \App\Models\products  $products
     * @return void
     */
    public function forceDeleted(products $products)
    {
        //
    }
}
