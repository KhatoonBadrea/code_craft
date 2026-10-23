<?php

namespace App\Services;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService
{

    public function getAll()
    {
        try {
            return Category::all();
        } catch (Exception $e) {
            Log::error('Failed to fetch all categories :' . $e->getMessage());
            throw new Exception('Failed to fetch all categories ');
        }
    }

    public function create(array $data)
    {
        try {
            return Category::create($data);
        } catch (Exception $e) {
            Log::error('Failed to create category :' . $e->getMessage());
            throw new Exception('Failed to create  category ');
        }
    }


    public  function  getById(string $id)
    {

        try {
            $category = Category::findOrFail($id);
            return $category;
        } catch (Exception $e) {
            Log::error('Failed to fatch category :' . $e->getMessage());
            throw new Exception('Failed to fatch  category ');
        }
    }

    public function update(string $id, array $data)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($data);
            return $category->refresh();
        } catch (Exception $e) {
            Log::error('Failed to update category :' . $e->getMessage());
            throw new Exception('Failed to update  category ');
        }
    }
}
