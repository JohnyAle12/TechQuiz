<?php

namespace Tests\Unit\Services;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    use RefreshDatabase;
    
    public function testGetAllCategoriesList()
    {
        $data = [
            ['name' => 'Cliente'],
            ['name' => 'Proveedor'],
            ['name' => 'Funcionario Interno'],
        ];

        Category::factory()->createMany($data);

        $service = new CategoryService;
        $result = $service->getAll();

        $this->assertDatabaseCount('categories', count($data));
        $this->assertIsArray($result);
        $this->assertArrayHasKey('name', $result[0]);
    }
}
