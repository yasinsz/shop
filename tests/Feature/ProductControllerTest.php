<?php

namespace Tests\Feature\Http\Controllers\Backend\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexRouteDisplaysProductsView()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->get(route('admin.products.index'));

        $response->assertViewIs('backend.products.index');
        $response->assertStatus(200);
    }

    // TODO finish implementation
    // public function testImageCanBeAdded()
    // {
    //     $data = [];
    //     $response = $this->get(route('admin.products.create'));
    //     $response->assertCreated($data);
    //     $response->assertStatus(201);
    // }
}
