<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $products = Product::count();
        $users = User::count();
        $distributors = Distributor::count();
        $flashsale = FlashSale::count();
        return view('pages.admin.index', compact('products','users','distributors','flashsale'));
    }
}
