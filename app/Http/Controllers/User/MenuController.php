<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Tampilkan semua menu, dikelompokkan per kategori
    public function index()
    {
        $menus = Menu::where('is_active', 1)->get()->groupBy('category');
        return view('user.menu.index', compact('menus'));
    }

    // Tampilkan menu per kategori
    public function kategori($category)
    {
        $menus = Menu::where('category', $category)->where('is_active', 1)->get();
        return view('user.menu.kategori', compact('menus', 'category'));
    }

    // Detail produk
    public function show($id)
    {
        $produk = Menu::findOrFail($id);
        return view('user.menu.show', compact('produk'));
    }
}
