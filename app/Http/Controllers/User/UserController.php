<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Admin;
use App\Models\FlashSale;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    public function index()
    {
        // Ambil semua produk sebagai contoh
        $products = Product::all();
        $flashsale = FlashSale::all();
        return view('pages.user.index', compact('products', 'flashsale'));
       
    }

    public function detail_product($id)
    {
        $products = Product::findOrFail($id);
        return view('pages.user.detail', compact('products'));

    }
    public function detail_flashsale($id)
    {
        $flashsale = FlashSale::findOrFail($id);
        return view('pages.user.detail.flashsale', compact('flashsale'));
    }

    
    public function purchase($productId, $userId) {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);
        if ($user -> point >= $product -> price) {
            $totalPoints = $user->point - $product->price;

            $user -> update([
                'point' => $totalPoints,
            ]);
            Alert::success('Berhasil','Produk berhasil dibeli!');
            return redirect()->back();

        } else {
            Alert::error('Gagal!','Point anda tidak cukup!');
            return redirect()->back();
        }
    }
}
