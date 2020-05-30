<?php

namespace Tests\Unit;

use App\User;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function user_get_access_to_edit_product() 
    {
        $this->actingAsUser();

        $response = $this->get('/products/{id}/edit')
                ->assertRedirect('/products');
    }

    /** @test */
    public function a_more_product_info_button_works()
    {
        $response = $this->get('/products/{id}')
                ->assertOk();
    }

    /** @test */
    public function only_admin_can_get_acces_to_create_product_page()
    {
        $this->actingAsUser();
        $response = $this->get('/products/create')
                    ->assertRedirect('/products');
    }

    /** @test */
    public function a_categories_works_for_any_user()
    {
        $response = $this->get('/products/category/{id}')
                    ->assertOk();           
    }

    /** @test */
    public function a_searchbar_works()
    {
        $response = $this->get('/products/search?search=test')
                    ->assertOk();
    }

    /** @test */
    public function a_product_name_is_required()
    {
        $response = $this->post('/products/create', array_merge($this->data(), ['product_name' => '']));
        $response->assertSessionHasErrors('product_name');
    }

    /** @test */
    public function a_price_is_required()
    {
        $response = $this->post('/products/create', array_merge($this->data(), ['price' => '']));
        $response->assertSessionHasErrors('price');
    }

    /** @test */
    public function a_description_is_required()
    {
        $response = $this->post('/products/create', array_merge($this->data(), ['description' => '']));
        $response->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_category_name_is_required()
    {
        $response = $this->post('/products/create', array_merge($this->data(), ['category_name' => '']));
        $response->assertSessionHasErrors('category_name');
    }

    /** @test */
    public function a_new_product_can_be_added()
    {
        $response = $this->post('/products/create', $this->data());

        $products = Product::first();

        $this->assertCount(1, Product::all());
        $response->assertRedirect($products->path());
    }

    /** @test */
    public function a_product_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/products/create', $this->data());;

        $product = Product::first();

        $response = $this->patch('/products/'.$product->id, [
            'product_name' => 'Produkt testowy edytowany',
            'price' => '20',
            'discounted_price' => '10',
            'description' => 'Testowy opis produktu edytowany',
            'category_name' => 'Laptopy i komputery',
        ]);

        $this->assertSame('Produkt testowy edytowany', Product::first()->product_name);
        $this->assertEquals('20.00', Product::first()->price);
        $this->assertEquals('10.00', Product::first()->discounted_price);
        $this->assertEquals('Testowy opis produktu edytowany', Product::first()->description);
        $this->assertEquals('Laptopy i komputery', Product::first()->category_name);
    }

    /** @test */
    public function a_product_can_be_deleted()
    {
        $this->post('/products/create', $this->data());

        $product = Product::first();
        $this->assertCount(1, Product::all());

        $response = $this->delete('/products/'. $product->id);
        $this->assertCount(0, Product::all());
    }

    /** @test */
    private function actingAsUser()
    {
        $this->actingAs(factory(User::class)->create());
    }

    private function data()
    {
        return [
            'product_name' => 'Produkt testowy',
            'price' => '1000',
            'discounted_price' => '900',
            'description' => 'Testowy opis produktu',
            'category_name' => 'Laptopy i komputery',
        ];
    }
}
