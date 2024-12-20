<main>
    <!-- Related Products Section -->
    <section class="related-products">
        <h2>Sản phẩm sale</h2>
        <div class="product-grid">
            <?php
            include 'models/sanpham.php';
            $img_path = "images/";
            $id_danh_muc = 3;
            $products = loadall_san_pham("", $id_danh_muc);

            if (!empty($products)) {
                foreach ($products as $product) {
                    extract($product);
                    $hinh_full_path = $img_path . $hinh;
                    $linksp = "index.php?act=chitietsp&id_san_pham=" . $id_san_pham;
                    echo '
                <div class="product-item card text-center">
    <a href="' . $linksp . '">
        <img class="card-img-top" src="' . $hinh_full_path . '" alt="' . htmlspecialchars($ten_san_pham) . '">
    </a>
    <div class="card-body">
        <h4 class="card-title">' . htmlspecialchars($ten_san_pham) . '</h4>
        <p class="price">' . number_format($gia, 0) . ' USD</p>
        <form action="index.php?act=themgiohang" method="post" class="mt-3">
            <input type="hidden" name="id_san_pham" value="' . $id_san_pham . '">
            <input type="hidden" name="ten_san_pham" value="' . htmlspecialchars($ten_san_pham) . '">
            <input type="hidden" name="hinh" value="' . htmlspecialchars($hinh) . '">
            <input type="hidden" name="gia" value="' . $gia . '">
            <input type="hidden" id="soluong" name="soluong" value="1" min="1" class="form-control mb-2">
            <input type="submit" name="themgiohang" class="btn btn-primary btn-block" value="Thêm vào giỏ hàng">
        </form>
    </div>
</div>

            ';
                }
            } else {
                echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
            }
            ?>

        </div>
    </section>
    <section class="new-arrival">
        <h2>Nổi Bật</h2>
        <div class="collections">
            <div class="collection-item man">
                <h3>Thời Trang Nam</h3>
                <button><a href="index.php?act=nam">Shop Now</a></button>
            </div>
            <div class="collection-item woman">
                <h3>Thời Trang Nữ</h3>
                <button><a href="index.php?act=nu">Shop Now</a></button>
            </div>
        </div>
    </section>
</main>