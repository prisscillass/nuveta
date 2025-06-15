<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $query = Transaction::with(['product'])
            ->where('user_id', Auth::id());

        // Perbaikan: hanya filter jika status tidak 'all' dan tidak kosong
        if (request()->filled('status') && request('status') !== 'all') {
            $query->where('status', request('status'));
        }

        // Filter berdasarkan rentang tanggal
        if (request('start_date') && request('end_date')) {
            $query->whereBetween('created_at', [
                request('start_date') . ' 00:00:00',
                request('end_date') . ' 23:59:59'
            ]);
        }

        $rawOrders = $query->orderBy('created_at', 'desc')->get();

        // Grup transaksi berdasarkan waktu checkout
        $groupedOrders = $rawOrders->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d H:i:s');
        });

        // Transformasi ke format array
        $orders = $groupedOrders->map(function ($items, $timestamp) {
            $first = $items->first();

            return [
                'status'     => $first->status,
                'date'       => $first->created_at,
                'expediton' => $first->expedition,
                'items'      => $items,
                'total'      => $items->sum('total'),
            ];
        });

        return view('order.index', ['orders' => $orders]);
    }
}
