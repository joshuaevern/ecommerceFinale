<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

include_once "../models/product_class.php";
final class Testing extends TestCase
{
    public function testMenuClassExists(): void
    {
        $this->assertTrue(class_exists('Product'));
    }

    public function testadd_products(): void
    {
        $product = new Product(); 
        $this->assertTrue(
            $product->add_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image)
        );
    }

    public function testadd_brand(): void
    {
        $product = new Product(); 
        $this->assertTrue(
            $product->add_brands($name)
        );
    }

    public function testadd_categories(): void
    {
        $product = new Product(); 
        $this->assertTrue(
            $product->add_categories($name)
        );
    }

    public function testselect_all_products(): void
    {
        $product = new Product();      
        $this->assertTrue(
            $product->select_all_products()
        );
    }

    public function testselect_all_categories(): void
    {
        $product = new Product();      
        $this->assertTrue(
            $product->select_all_categories()
        );
    }

    public function testselect_all_brands(): void
    {
        $product = new Product();      
        $this->assertTrue(
            $product->select_all_brands()
        );
    }

    public function testselect_one_products(): void
    {
        $product = new Product(); 
        $id=1;      
        $this->assertTrue(
            $product->select_one_products($id)
        );
    }

    public function testselect_one_brands(): void
    {
        $product = new Product(); 
        $id=1;      
        $this->assertTrue(
            $product->select_one_brands($id)
        );
    }

    public function testselect_one_categories(): void
    {
        $product = new Product(); 
        $id=1;      
        $this->assertTrue(
            $product->select_one_categories($id)
        );
    }

    public function testupdate_one_products(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->update_one_products($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_id)
        );
    }

    public function testupdate_one_brands(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->update_one_brands($brand_id, $brand_name)
        );
    }

    public function testupdate_one_categories(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->update_one_categories($cat_id, $cat_name)
        );
    }

    public function testdelete_one_products(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->delete_one_products($id)
        );
    }

    public function testdelete_one_brands(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->delete_one_brands($id)
        );
    }

    public function testdelete_one_categories(): void
    {
        $product = new Product(); 
        
        $this->assertTrue(
            $product->delete_one_categories($id)
        );
    }

    
    

}
 ?>
