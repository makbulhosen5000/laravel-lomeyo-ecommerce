<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_example(): void
    {
         $admin = Admin::factory()->create();
        $this->actingAs($admin);
        Storage::fake('public');

        $data = [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('category_image.jpg'),
            'status' => $this->faker->status,
        ];
        $response = $this->post(route('store.category'), $data);
    }
}
