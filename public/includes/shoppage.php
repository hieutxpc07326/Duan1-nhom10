<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select">
                                <option>Default softing</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                            <select class="ht__select">
                                <option>Show by</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                        </div>
                        <div class="ht__pro__qun">
                            <span>Showing 1-12 of 1033 products</span>
                        </div>
                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>

                    
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Product -->
                                <?
                                if (isset($_GET['id'])){
                                    $idCat = $_GET['id'];
                                    $dblis = new Products();
                                    $rows = $dblis->get_dssp($idCat);
                                }else{
                                    $dblis = new Products();
                                    $rows = $dblis->getList();
                                }
                                foreach ($rows as $row) { ?>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="category" style="border: 0.5px solid #eaeaea;">
                                        <div class="ht__cat__thumb">
                                            <a href="?act=detail&id=<? echo $row['productID'] ?>&idCat=<? echo $row['category_ID'] ?>">
                                            <? echo '<img src="images/' . $row['image'] . '"alt="product images">'?>
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li><a href="?act=addcart"><i class="icon-handbag icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="?act=detail&id=<? echo $row['productID'] ?>"><? echo $row['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li class="old__prize"><strike><?php echo number_format($row['price']) ?> VND</strike></li>
                                                <li><?php echo number_format($row['price']) ?> VND</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?}?>
                                <!-- End Single Product -->
                            </div>

                            <!-- <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">
                                        
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/1.jpg"
                                                        alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit
                                                    amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/2.jpg"
                                                        alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit
                                                    amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/3.jpg"
                                                        alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit
                                                    amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="images/product-2/pro-1/4.jpg"
                                                        alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="product-details.html">Product Title Here </a></h2>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit
                                                    amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut
                                                    labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
                <!-- Start Pagenation -->



                <!-- <div class="row">
                    <div class="col-xs-12">
                        <ul class="htc__pagenation">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">3</a></li>
                            <li><a href="#">19</a></li>
                            <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div> -->




                <!-- End Pagenation -->
            </div>
            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">
                    <!-- Start Prize Range -->
                    <!-- <div class="htc-grid-range">
                        <h4 class="title__line--4">Price</h4>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="amount" readonly>
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Prize Range -->
                    <!-- Start Category Area -->
                    <div class="htc__category">
                        <h4 class="title__line--4">Danh mục</h4>
                        <ul class="ht__cat__list">
                            <?          
                                $dblist = new Category();
                                $rows = $dblist->getList();
                                foreach ($rows as $row) { 
                            ?>
                            <li><a href="?act=shop&id=<? echo $row['categoryID'] ?>"><? echo $row['categoryName'] ?></a></li>
                            <?}?>
                        </ul>
                    </div>
                    <!-- End Category Area -->
                    <!-- Start Best Sell Area -->
                    <div class="htc__recent__product">
                        <h2 class="title__line--4">Sản phẩm bán chạy</h2>
                        <div class="htc__recent__product__inner">
                            <!-- Start Single Product -->
                            <?
                            $dblis = new Products();
                            $rows = $dblis->getList();
                            foreach ($rows as $row) { ?>
                            <div class="htc__best__product">
                                <div class="htc__best__pro__thumb">
                                    <a href="?act=detail&id=<? echo $row['productID'] ?>&idCat=<? echo $row['category_ID'] ?>">
                                        <? echo '<img src="images/' . $row['image'] . '"alt="product images" style="width: 100px;height: 120px; border: 1px solid #a6a6a6;">'?>
                                    </a>
                                </div>
                                <div class="htc__best__product__details">
                                    <h2><a href="?act=detail&id=<? echo $row['productID'] ?>&idCat=<? echo $row['category_ID'] ?>"><? echo $row['name'] ?></a></h2>
                                    <ul class="pro__prize">
                                        <!-- <li class="old__prize"></li> -->
                                        <li><?php echo number_format($row['price']) ?> VND</li>
                                    </ul>
                                </div>
                            </div>
                            <?}?>
                            <!-- End Single Product -->
                        </div>
                    </div>
                    <!-- End Best Sell Area -->
                </div>
            </div>
        </div>
    </div>
</section>