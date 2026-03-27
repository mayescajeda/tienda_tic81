<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // 1. Muestra la vista del checkout
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home')->with('info', 'Tu carrito está vacío.');
        }
        return view('cart.checkout');
    }

    // 2. Procesa la compra y descuenta el stock
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'zip' => 'required',
        ]);

        $cart = session()->get('cart', []);

        try {
            DB::beginTransaction();

            // Calculamos el total antes de crear la orden
            $totalVenta = 0;
            foreach ($cart as $details) {
                $totalVenta += $details['price'] * $details['quantity'];
            }

            // Crear la orden
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $request->first_name . ' ' . $request->last_name,
                'address' => $request->address . ' CP: ' . $request->zip,
                'subtotal' => $totalVenta,
                'total' => $totalVenta,
                'status' => 'pending',
            ]);

            // Registrar productos y bajar stock
            foreach ($cart as $id => $details) {
                $product = Product::findOrFail($id);

                if ($product->stock < $details['quantity']) {
                    throw new \Exception("Stock insuficiente para: " . $product->name);
                }

                $product->decrement('stock', $details['quantity']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('orders.success', $order->id);

        }
        catch (\Exception $e) {
            DB::rollBack();
            dd("Error en la compra: " . $e->getMessage());
        }
    }

    // 3. Muestra la confirmación
    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('cart.success', compact('order'));
    }
} // <--- ESTA ES LA LLAVE QUE FALTABA PARA CERRAR LA CLASE