<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class SendOrderPaidMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        // 从事件对象中取出对应的订单
        $order = $event->getOrder();

        $email = $order->user->email;
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        Mail::send('pages.email',['name'=>$order->user->name],function($message) use($email){
            $to = $email;
            $message ->to($to)->subject('订单支付成功');
        });
    }
}
