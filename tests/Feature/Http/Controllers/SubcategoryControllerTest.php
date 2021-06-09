<?php

namespace Tests\Feature\Http\Controllers;

use App\Subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubcategoryController
 */
class SubcategoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $subcategories = factory(Subcategory::class, 3)->create();

        $response = $this->get(route('subcategory.index'));

        $response->assertOk();
        $response->assertViewIs('subcategory.index');
        $response->assertViewHas('subcategories');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('subcategory.create'));

        $response->assertOk();
        $response->assertViewIs('subcategory.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubcategoryController::class,
            'store',
            \App\Http\Requests\SubcategoryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $image = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $is_active = $this->faker->boolean;

        $response = $this->post(route('subcategory.store'), [
            'title' => $title,
            'image' => $image,
            'position' => $position,
            'is_active' => $is_active,
        ]);

        $subcategories = Subcategory::query()
            ->where('title', $title)
            ->where('image', $image)
            ->where('position', $position)
            ->where('is_active', $is_active)
            ->get();
        $this->assertCount(1, $subcategories);
        $subcategory = $subcategories->first();

        $response->assertRedirect(route('subcategory.index'));
        $response->assertSessionHas('subcategory.id', $subcategory->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $subcategory = factory(Subcategory::class)->create();

        $response = $this->get(route('subcategory.show', $subcategory));

        $response->assertOk();
        $response->assertViewIs('subcategory.show');
        $response->assertViewHas('subcategory');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $subcategory = factory(Subcategory::class)->create();

        $response = $this->get(route('subcategory.edit', $subcategory));

        $response->assertOk();
        $response->assertViewIs('subcategory.edit');
        $response->assertViewHas('subcategory');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubcategoryController::class,
            'update',
            \App\Http\Requests\SubcategoryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $subcategory = factory(Subcategory::class)->create();
        $title = $this->faker->sentence(4);
        $image = $this->faker->word;
        $position = $this->faker->numberBetween(-10000, 10000);
        $is_active = $this->faker->boolean;

        $response = $this->put(route('subcategory.update', $subcategory), [
            'title' => $title,
            'image' => $image,
            'position' => $position,
            'is_active' => $is_active,
        ]);

        $subcategory->refresh();

        $response->assertRedirect(route('subcategory.index'));
        $response->assertSessionHas('subcategory.id', $subcategory->id);

        $this->assertEquals($title, $subcategory->title);
        $this->assertEquals($image, $subcategory->image);
        $this->assertEquals($position, $subcategory->position);
        $this->assertEquals($is_active, $subcategory->is_active);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $subcategory = factory(Subcategory::class)->create();

        $response = $this->delete(route('subcategory.destroy', $subcategory));

        $response->assertRedirect(route('subcategory.index'));

        $this->assertSoftDeleted($subcategory);
    }
}
