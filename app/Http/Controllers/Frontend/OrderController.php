<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\SanPham;
use App\Models\SpThuocTinh;
use App\Models\SpHinh;
use App\Models\ThuocTinh;
use App\Models\LoaiThuocTinh;
use App\Models\Banner;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Customer;
use Helper, File, Session, Auth;
use Mail;

class OrderController extends Controller
{

  protected $status = [
    0 => 'Đang xử lý',
    1 => 'Đang tạm ngừng',
    2 => 'Đã hoàn thành',
    3 => 'Đã huỷ',
    4 => 'Đã hoàn lại tiền',
    5 => 'Thất bại'
  ];

  public function index(Request $request)
  {
    $order = Orders::find(12);
    dd($order->order_detail);
    dd('you got index at here');
  }

  public function show(Request $request)
  {
    $customer_id = Session::get('userId');
    $orders = Orders::where('customer_id', $customer);
    return view('', compact('orders'));
  }

  public function history(Request $request)
  {
    if(!Session::has('userId')) {
      return redirect()->route('home');
    }
    $customer_id = Session::get('userId');
    $customer = Customer::find($customer_id);
    $orders = Orders::where('customer_id', $customer_id)->get();
    $status = $this->status;
    $seo = Helper::seo();
    return view('frontend.account.order-history', compact('orders', 'status', 'customer', 'seo'));
  }

}
