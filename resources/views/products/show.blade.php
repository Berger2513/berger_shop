@extends('layouts.app')
@section('title', $product->title)

@section('content')
<div class="row">
<div class="col-lg-10 offset-lg-1">
<div class="card">
  <div class="card-body product-info">
    <div class="row">
      <div class="col-5">
        <img class="cover" src="{{ config('berger.img_url').'/'.$product->image }}" alt="">
      </div>
      <div class="col-7">
        <div class="title">{{ $product->title }}</div>
        <div class="price"><label>价格</label><em>￥</em><span>{{ $product->price }}</span></div>
        <div class="sales_and_reviews">
          <div class="sold_count">累计销量 <span class="count">{{ $product->sold_count }}</span></div>
          <div class="review_count">累计评价 <span class="count">{{ $product->review_count }}</span></div>
          <div class="rating" title="评分 {{ $product->rating }}">评分 <span class="count">{{ str_repeat('★', floor($product->rating)) }}{{ str_repeat('☆', 5 - floor($product->rating)) }}</span></div>
        </div>
        <div class="skus">
          <label>选择</label>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($product->skus as $sku)
            
              <label
                class="btn sku-btn"
                data-price="{{ $sku->price }}"
                data-stock="{{ $sku->stock }}"
                data-toggle="tooltip"
                title="{{ $sku->description }}"
                data-placement="bottom">
                <input type="radio" name="skus" autocomplete="off" value="{{ $sku->id }}"> {{ $sku->title }}
              </label>
            @endforeach
          </div>
        </div>
        <div class="cart_amount"><label>数量</label><input type="text" class="form-control form-control-sm" value="1"><span>件</span><span class="stock"></span></div>
        <div class="buttons">


          @if($favored)
            <button class="btn btn-danger btn-disfavor">取消收藏</button>
          @else
            <button class="btn btn-success btn-favor">❤ 收藏</button>
          @endif

          <button class="btn btn-primary btn-add-to-cart btn-add-to-cart">加入购物车</button>
        </div>
      </div>
    </div>
    <div class="product-detail">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#product-detail-tab" aria-controls="product-detail-tab" role="tab" data-toggle="tab" aria-selected="true">商品详情</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#product-reviews-tab" aria-controls="product-reviews-tab" role="tab" data-toggle="tab" aria-selected="false">用户评价</a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="product-detail-tab">
          {!! $product->description !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="product-reviews-tab">
          <!-- 评论列表开始 -->
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <td>用户</td>
              <td>商品</td>
              <td>评分</td>
              <td>评价</td>
              <td>时间</td>
            </tr>
            </thead>
            <tbody>
              @foreach($reviews as $review)
              <tr>
                <td>{{ $review->order->user->name }}</td>
                <td>{{ $review->productSku->title }}</td>
                <td>{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</td>
                <td>{{ $review->review }}</td>
                <td>{{ $review->reviewed_at->format('Y-m-d H:i') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
  <!-- 评论列表结束 -->
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
    // $('[data-toggle="tooltip"]').tooltip({trigger: 'hover'});
    $('.sku-btn').click(function () {
      $('.product-info .price span').text($(this).data('price'));
      $('.product-info .stock').text('库存：' + $(this).data('stock') + '件');
    });


  $('.btn-favor').on('click', function(){

      layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var token = '{{ csrf_token()}}';
            var url = "{{route('products.favor', ['product' => $product->id])}}";
            var loading = layer.load(3);
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'JSON',
                data: { '_token': token},
                success: function (data) {

                  console.log(data)
                    //撤回加载层
                    layer.close(loading);
                    if (data.status == 1) {
                        layer.msg('收藏成功', function () {
                            //操作成功刷新页面
                            location.reload();
                        });
                    } else if(data.status == -1) {
                        layer.msg('收藏失败', {icon: 5});
                    } 
                },
                error: function(){
                  layer.close(loading);
                  layer.msg('请先登录', {icon: 5});
                }
            })


            // });
      })
  });




  $('.btn-disfavor').on('click', function(){

      layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var token = '{{ csrf_token()}}';
            var url = "{{route('products.disfavor', ['product' => $product->id])}}";
            var loading = layer.load(3);
            $.ajax({
                url: url,
                type: 'delete',
                dataType: 'JSON',
                data: { '_token': token},
                success: function (data) {

                  console.log(data)
                    //撤回加载层
                    layer.close(loading);
                    if (data.status == 1) {
                        layer.msg('取消收藏成功', function () {
                            //操作成功刷新页面
                            location.reload();
                        });
                    } else if(data.status == -1) {
                        layer.msg('操作失败', {icon: 5});
                    } 
                },
                error: function(){
                  layer.close(loading);
                  layer.msg('请先登录', {icon: 5});
                }
            })


            // });
      })
  });


   //加入购物车
    $('.btn-add-to-cart').on('click' , function(){
      var url  = '{{ route("cart.add") }}';
      var sku_id = $('label.active input[name=skus]').val();
      var amount = $('.cart_amount input').val();
    //   var sku_id  = '{{ $product->id }}';
    //   var amount  = '{{ $product->id }}';
      var _token ='{{ csrf_token() }}';

       layui.use(['layer', 'form'], function () {
          var layer = layui.layer;
          loading = layer.load(3);

          $.ajax({
              url: url,
              type: 'POST',
              dataType: 'JSON',
              data: {
                  'sku_id': sku_id,
                  'amount': amount,
                  '_token': _token
              },
              success: function (data) {
                  // //撤回加载层
                layer.close(loading);
                console.log(data);
                layer.msg('添加成功', function () {
                              console.log(data)
                              //操作成功刷新页面
                                 location.href = '{{ route('cart.index') }}';

                        })
              },
              error: function (data) {

                console.log(data.responseJSON)

                if(data.responseJSON.errors) {
                          if(data.responseJSON.errors.sku_id) {
                            layer.close(loading);
                            layer.msg(data.responseJSON.errors.sku_id[0], {icon: 5});
                          }

                          if(data.responseJSON.errors.amount) {
                            layer.close(loading);
                            layer.msg(data.responseJSON.errors.amount[0], {icon: 5});
                          }

                        } else {
                          layer.close(loading);
                          layer.msg('请先登录', {icon: 5});

                        }
              },
          })

        })
    });


  });
</script>
@endsection