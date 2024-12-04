<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Category/Index', [
            'categories' => Category::query()->paginate(2),
        ]);
    }
}
