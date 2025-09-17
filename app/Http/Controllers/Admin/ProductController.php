<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function kopi()
    {
        $products = Menu::where('category', 'kopi')->get();
        return view('admin.stok_produk.kopi.stok_kopi', compact('products'));
    }
    public function iceCream()
    {
        $products = Menu::where('category', 'ice_cream')->get();
        return view('admin.stok_produk.ice.stok_ice', compact('products'));
    }

    // Tampilkan halaman form tambah Ice Cream
    public function createIceCreamForm()
    {
        return view('admin.stok_produk.ice.create_ice');
    }

    // Tampilkan halaman form tambah Kopi
    public function createKopiForm()
    {
        return view('admin.stok_produk.kopi.create_kopi');
    }


    // Tampilkan halaman form tambah Roti
    public function createRotiForm()
    {
        return view('admin.stok_produk.roti.create_roti');
    }


    public function roti()
    {
        $products = Menu::where('category', 'roti')->get();
        return view('admin.stok_produk.roti.stok_roti', compact('products'));
    }

    // Menampilkan halaman edit produk Kopi
    public function editKopi($id)
    {
        $product = Menu::findOrFail($id);
        return view('admin.stok_produk.kopi.edit_kopi', compact('product'));
    }


    // Menampilkan halaman edit produk Ice Cream
    public function editIceCream($id)
    {
        $product = Menu::findOrFail($id);
        return view('admin.stok_produk.ice.edit_ice', compact('product'));
    }



    // Menampilkan halaman edit produk Roti
    public function editRoti($id)
    {
        $product = Menu::findOrFail($id);
        return view('admin.stok_produk.roti.edit_roti', compact('product'));
    }

    // Menyimpan perubahan produk Kopi
    public function updateKopi(Request $request, $id)
    {
        $product = Menu::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        $product->update($data);

        return redirect()->route('stok.kopi');
    }

    // Menyimpan perubahan produk Ice Cream
    public function updateIceCream(Request $request, $id)
    {
        $product = Menu::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        $product->update($data);

        return redirect()->route('stok.iceCream');
    }

    // Menyimpan perubahan produk Roti
    public function updateRoti(Request $request, $id)
    {
        $product = Menu::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        $product->update($data);

        return redirect()->route('stok.roti');
    }

    // Menambahkan produk baru untuk Kopi
    public function createKopi(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['category'] = 'kopi';
        $data['is_active'] = 1;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('stok.index', ['category' => 'kopi']);
    }

    // Menambahkan produk baru untuk Ice Cream
    public function createIceCream(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['category'] = 'ice_cream';
        $data['is_active'] = 1;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('stok.index', ['category' => 'ice_cream']);
    }

    // Menambahkan produk baru untuk Roti
    public function createRoti(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();
        $data['category'] = 'roti';
        $data['is_active'] = 1;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('stok.index', ['category' => 'roti']);
    }


    // Menghapus produk ice cream
    public function destroyIceCream($id)
    {
        $product = Menu::findOrFail($id);
        $product->delete();

        return redirect()->route('stok.iceCream');
    }

    // Hapus produk Kopi
    public function destroyKopi($id)
    {
        $product = Menu::findOrFail($id);
        $product->delete();

        return redirect()->route('stok.kopi');
    }

    // Hapus produk Roti
    public function destroyRoti($id)
    {
        $product = Menu::findOrFail($id);
        $product->delete();

        return redirect()->route('stok.roti');
    }
}
