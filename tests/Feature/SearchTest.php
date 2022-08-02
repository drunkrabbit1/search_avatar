<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enums\AppType;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search_image_success_response()
    {
        $response = $this->postJson(route('api.search.avatar', [
            AppType::VK->value => 'durov'
        ]));

        $response->assertSee(['app_icon']);
        $response->assertStatus(200);
    }

    public function test_search_image_error_not_found_link_404_response()
    {
        $response = $this->postJson(route('api.search.avatar', [
            AppType::VK->value => 'not_found_link'
        ]));

        $response->assertSee(['message' => __('app.errors.not_found')]);
        $response->assertStatus(404);
    }

    public function test_search_image_error_not_found_app_422_response()
    {
        $response = $this->postJson(route('api.search.avatar', [
            'not_found' => 'not_found_link'
        ]));
        $response->assertSee(['message' => __('validation.required_app_type')]);
        $response->assertStatus(422);
    }
}
