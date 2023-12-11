<?
$html_cart1 = viewcart1();
?>
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-stt">STT</th>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?= $html_cart1; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="?act=shop">Tiếp tục mua hàng</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <a href="?act=viewcart&del=1">Xóa tất cả</a>
                                    <a href="#">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="ht__coupon__code">
                                <span>enter your discount code</span>
                                <div class="coupon__box">
                                    <input type="text" placeholder="">
                                    <div class="ht__cp__btn">
                                        <a href="#">enter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>cart total</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>Giá giỏ hàng</li>
                                        <li>Giảm giá</li>
                                        <li>Tiền ship</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li>999.999 VND</li>
                                        <li>9.000 VND</li>
                                        <li>43.0000 VND</li>
                                    </ul>
                                </div>
                                <div class="cart__total">
                                    <span>Tổng đơn hàng</span>
                                    <span><?=number_format($tongdonhang)?> VND</span>
                                </div>
                                <ul class="payment__btn">
                                    <li class="active"><a href="#">Trả tiền</a></li>
                                    <li><a href="?act=shop">Tiếp tục mua hàng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>