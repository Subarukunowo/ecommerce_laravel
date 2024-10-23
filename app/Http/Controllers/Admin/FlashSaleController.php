<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class FlashsaleController extends Controller
{
    // Menampilkan daftar Flash Sale
    public function index()
    {
        $flashsales = FlashSale::all(); // Mengambil semua data flash sale
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?'); // Pesan konfirmasi hapus
        return view('pages.admin.flashsale.index', compact('flashsales')); // Kirim data flashsale ke view
    }

    // Menampilkan form create Flash Sale
    public function create()
    {
        return view('pages.admin.flashsale.create'); // Menampilkan halaman form create
    }

    // Menyimpan data Flash Sale baru
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'original_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'stock' => 'required|integer',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        }

        // Simpan data Flash Sale
        $flashsale = FlashSale::create([
            'product_name' => $request->product_name,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        // Tampilkan pesan sesuai hasil
        if ($flashsale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil ditambahkan!');
            return redirect()->route('admin.flashsale');
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // Menampilkan detail Flash Sale
    public function detail($id)
    {
        $flashsale = FlashSale::findOrFail($id); // Mengambil data flash sale berdasarkan ID
        return view('pages.admin.flashsale.detail', compact('flashsale')); // Kirim data ke view detail
    }

    // Menampilkan form edit Flash Sale
    public function edit($id)
    {
        $flashsale = FlashSale::findOrFail($id); // Mengambil data flash sale berdasarkan ID
        return view('pages.admin.flashsale.edit', compact('flashsale')); // Kirim data ke view edit
    }

    // Mengupdate data Flash Sale
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'original_price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'stock' => 'required|integer',
            'image' => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $flashsale = FlashSale::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            $oldPath = public_path('images/' . $flashsale->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath); // Hapus gambar lama
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $imageName);
        } else {
            $imageName = $flashsale->image; // Pertahankan gambar lama jika tidak ada yang baru
        }

        // Update data flash sale
        $flashsale->update([
            'product_name' => $request->product_name,
            'original_price' => $request->original_price,
            'discount_price' => $request->discount_price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        // Tampilkan pesan sesuai hasil
        if ($flashsale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil diperbarui!');
            return redirect()->route('admin.flashsale');
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal diperbarui!');
            return redirect()->back();
        }
    }

    // Menghapus data Flash Sale
    public function delete($id)
    {
        $flashsale = FlashSale::findOrFail($id);
        $oldPath = public_path('images/' . $flashsale->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath); // Hapus gambar terkait
        }
        $flashsale->delete();

        // Tampilkan pesan sesuai hasil
        if ($flashsale) {
            Alert::success('Berhasil!', 'Flash Sale berhasil dihapus!');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Flash Sale gagal dihapus!');
            return redirect()->back();
        }
    }
}
