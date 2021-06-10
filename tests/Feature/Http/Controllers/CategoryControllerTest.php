<?php

namespace Tests\Feature\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CategoryController
 */
class CategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $categories = factory(Category::class, 3)->create();

        $response = $this->get(route('category.index'));

        $response->assertOk();
        $response->assertViewIs('category.index');
        $response->assertViewHas('categories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('category.create'));

        $response->assertOk();
        $response->assertViewIs('category.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'store',
            \App\Http\Requests\CategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $min_price = $this->faker->randomFloat(/** double_attributes **/);
        $image = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $is_active = $this->faker->boolean;

        $response = $this->post(route('category.store'), [
            'title' => $title,
            'min_price' => $min_price,
            'image' => $image,
            'position' => $position,
            'is_active' => $is_active,
        ]);

        $categories = Category::query()
            ->where('title', $title)
            ->where('min_price', $min_price)
            ->where('image', $image)
            ->where('position', $position)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $categories);
        $category = $categories->first();

        $response->assertRedirect(route('category.index'));
        $response->assertSessionHas('category.id', $category->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $category = factory(Category::class)->create();

        $response = $this->get(route('category.show', $category));

        $response->assertOk();
        $response->assertViewIs('category.show');
        $response->assertViewHas('category');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $category = factory(Category::class)->create();

        $response = $this->get(route('category.edit', $category));

        $response->assertOk();
        $response->assertViewIs('category.edit');
        $response->assertViewHas('category');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoryController::class,
            'update',
            \App\Http\Requests\CategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $category = factory(Category::class)->create();
        $title = $this->faker->sentence(4);
        $min_price = $this->faker->randomFloat(/** double_attributes **/);
        $image = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $is_active = $this->faker->boolean;

        $response = $this->put(route('category.update', $category), [
            'title' => $title,
            'min_price' => $min_price,
            'image' => $image,
            'position' => $position,
            'is_active' => $is_active,
        ]);

        $category->refresh();

        $response->assertRedirect(route('category.index'));
        $response->assertSessionHas('category.id', $category->id);

        $this->assertEquals($title, $category->title);
        $this->assertEquals($min_price, $category->min_price);
        $this->assertEquals($image, $category->image);
        $this->assertEquals($position, $category->position);
        $this->assertEquals($is_active, $category->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $category = factory(Category::class)->create();

        $response = $this->delete(route('category.destroy', $category));

        $response->assertRedirect(route('category.index'));

        $this->assertSoftDeleted($category);
    }
}
