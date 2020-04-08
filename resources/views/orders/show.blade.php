@extends('layouts.app')
@section('title', '查看订单')

@section('content')
<div class="row">
<div class="col-lg-10 col-lg-offset-1">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>订单详情</h4>
  </div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th>商品信息</th>
          <th class="text-center">单价</th>
          <th class="text-center">数量</th>
          <th class="text-right item-amount">小计</th>
        </tr>
      </thead>
      @foreach($order->items as $index => $item)
      <tr>
        <td class="product-info">
          <div class="preview">
            <a target="_blank" href="{{ route('products.show', [$item->product_id]) }}">
              <img src="{{ config('berger.img_url').'/'.$item->product->image }}">
            </a>
          </div>
          <div>
            <span class="product-title">
               <a target="_blank" href="{{ route('products.show', [$item->product_id]) }}">{{ $item->product->title }}</a>
             </span>
            <span class="sku-title">{{ $item->productSku->title }}</span>
          </div>
        </td>
        <td class="sku-price text-center vertical-middle">￥{{ $item->price }}</td>
        <td class="sku-amount text-center vertical-middle">{{ $item->amount }}</td>
        <td class="item-amount text-right vertical-middle">￥{{ number_format($item->price * $item->amount, 2, '.', '') }}</td>
      </tr>
      @endforeach
      <tr><td colspan="4"></td></tr>
    </table>
    <div class="order-bottom">
      <div class="order-info">
        <div class="line"><div class="line-label">收货地址：</div><div class="line-value">{{ join(' ', $order->address) }}</div></div>
        <div class="line"><div class="line-label">订单备注：</div><div class="line-value">{{ $order->remark ?: '-' }}</div></div>
        <div class="line"><div class="line-label">订单编号：</div><div class="line-value">{{ $order->no }}</div></div>
        <!-- 输出物流状态 -->
        <div class="line">
          <div class="line-label">物流状态：</div>
          <div class="line-value">{{ \App\Models\Order::$shipStatusMap[$order->ship_status] }}</div>
        </div>
        <!-- 如果有物流信息则展示 -->
        @if($order->ship_data)
        <div class="line">
          <div class="line-label">物流信息：</div>
          <div class="line-value">{{ $order->ship_data['express_company'] }} {{ $order->ship_data['express_no'] }}</div>
        </div>
        @endif


         <!-- 订单已支付，且退款状态不是未退款时展示退款信息 -->
        @if($order->paid_at && $order->refund_status !== \App\Models\Order::REFUND_STATUS_PENDING)
        <div class="line">
          <div class="line-label">退款状态：</div>
          <div class="line-value">{{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}</div>
        </div>
        <div class="line">
          <div class="line-label">退款理由：</div>
          <div class="line-value">{{ $order->extra['refund_reason'] }}</div>
        </div>
        @endif


      </div>
      <div class="order-summary text-right">
        <div class="total-amount">
          <span>订单总价：</span>
          <div class="value">￥{{ $order->total_amount }}</div>
        </div>
        <div>
          <span>订单状态：</span>
          <div class="value">
            @if($order->paid_at)
              @if($order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
                已支付
              @else
                {{ \App\Models\Order::$refundStatusMap[$order->refund_status] }}
              @endif
            @elseif($order->closed)
              已关闭
            @else
              未支付
            @endif
          </div>
          <!-- 拒绝退款理由 -->
          @if(isset($order->extra['refund_disagree_reason']))
          <div>
            <span>拒绝退款理由：</span>
            <div class="value">{{ $order->extra['refund_disagree_reason'] }}</div>
          </div>
          @endif
          <!-- 结束拒绝退款理由 -->

          <!-- 支付按钮开始 -->
          @if(!$order->paid_at && !$order->closed)
          <div class="payment-buttons">
            <a class="btn btn-primary btn-sm" href="{{ route('payment.alipay', ['order' => $order->id]) }}">支付宝支付</a>
          </div>
          @endif
          <!-- 支付按钮结束 -->

        <!-- 如果订单的发货状态为已发货则展示确认收货按钮 -->
        @if($order->ship_status === \App\Models\Order::SHIP_STATUS_DELIVERED)
        <div class="receive-button">
          <!-- <form method="post" action="{{ route('orders.received', [$order->id]) }}"> -->
            <!-- csrf token 不能忘 -->
            {{ csrf_field() }}
            <button type="submit" class="btn btn-sm btn-success btn-ship">确认收货</button>
          </form>
        </div>
        @endif

        <!-- 订单已支付，且退款状态是未退款时展示申请退款按钮 -->
        @if($order->paid_at && $order->refund_status === \App\Models\Order::REFUND_STATUS_PENDING)
        <div class="refund-button">
          <button class="btn btn-sm btn-danger" id="btn-apply-refund">申请退款</button>
        </div>
        @endif

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function () {

    //确认收货
    $('.btn-ship').click(function () {
      layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var token = '{{ csrf_token()}}';
            var url = '{{ route('orders.received', [$order->id]) }}';

            var button = layer.confirm('确认收货吗？', {icon: 3, title:'提示'}, function(index){
             

              $.ajax({
                url: url,
                type: 'post',
                dataType: 'JSON',
                data: {
                  '_token': token
                },
                success: function (data) {
                    console.log(data);

                    if(data.status == 1) {
                        layer.msg('操作成功', function () {
                            //操作成功刷新页面
                            location.reload();
                        });
                    } else {
                        layer.msg('操作失败', function () {
                            //操作成功刷新页面
                            location.reload();
                        });
                    }

                    
                },
                error:  function (data) {
                    console.log(data);
                   layer.msg('未知错误', {icon: 5});
                   layer.close(loading);
              },
            })

            })

          })
    });

    $('#btn-apply-refund').click(function () {
        layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var token = '{{ csrf_token()}}';
            var url = '{{ route('orders.apply_refund', [$order->id]) }}';

            // var button = layer.confirm('确认申请退款吗？', {icon: 3, title:'提示'}, function(index){
            var loading = layer.load(3);
            layer.prompt(function(value, index, elem){
                // alert(value); //得到value
                layer.close(loading);
                  $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                      '_token': token,
                      'reason': value
                    },
                    success: function (data) {
                        console.log(data);

                        if(data.status == 1) {
                            layer.msg('操作成功', function () {
                                //操作成功刷新页面
                                location.reload();
                            });
                        } else {
                            layer.msg('操作失败', function () {
                                //操作成功刷新页面
                                location.reload();
                            });
                        }

                        
                    },
                    error:  function (data) {
                        console.log(data);
                       layer.msg('未知错误', {icon: 5});
                       layer.close(loading);
                  },
                })

            });


            
          })
    });

});
</script>
@endsection