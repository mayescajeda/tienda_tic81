<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] + 1 > $product->stock) {
                return redirect()->back()->with('error', 'No hay más stock disponible de ' . $product->name);
            }
            $cart[$id]['quantity']++;
        }
        else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "stock" => $product->stock
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto añadido al carrito correctamente.');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $product = Product::find($request->id);
            $cart = session()->get('cart');

            if ($request->quantity > $product->stock) {
                return redirect()->back()->with('error', 'Solo hay ' . $product->stock . ' unidades disponibles.');
            }

            if ($request->quantity < 1) {
                return redirect()->back()->with('error', 'La cantidad mínima es 1.');
            }

            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Carrito actualizado.');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'El carrito está vacío.');
        }
        return view('cart.checkout', compact('cart'));
    }

    public function confirmPurchase(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->route('home');
        }

        try {
            DB::beginTransaction();

            foreach ($cart as $id => $details) {
                $product = Product::lockForUpdate()->find($id);

                if ($product->stock < $details['quantity']) {
                    throw new \Exception("Lo sentimos, el producto {$product->name} se agotó mientras realizabas la compra.");
                }

                $product->decrement('stock', $details['quantity']);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('home')->with('success', '¡Compra realizada con éxito! Tu pedido está en camino.');

        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', $e->getMessage());
        }
    }
}