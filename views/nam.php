<main>
    <!-- Related Products Section -->
    <section class="related-products">
        <h2>Những sản phẩm liên quan</h2>
        <div class="product-grid">
            <!-- Lấy danh sách sản phẩm thuộc danh mục "nam" -->
            <?php
                include 'models/sanpham.php';

                // Định nghĩa đường dẫn đến thư mục chứa hình ảnh
                $img_path = "images/";

                // Giả sử id_danh_muc của danh mục "nam" là 1
                $id_danh_muc = 1;

                // Lấy danh sách sản phẩm thuộc danh mục có id_danh_muc = 1
                $products = loadall_san_pham("", $id_danh_muc);

                if (!empty($products)) { // Kiểm tra nếu có sản phẩm
                    foreach ($products as $product) {
                        extract($product);

                        // Tạo đường dẫn hình ảnh
                        $hinh_full_path = $img_path . $hinh;

                        // Tạo link chi tiết sản phẩm
                        $linksp = "index.php?act=chitietsp&id_san_pham=" . $id_san_pham;

                        // Hiển thị thông tin sản phẩm
                        echo '
                            <div class="product-item">
                                <img src="' . $hinh_full_path . '" alt="' . htmlspecialchars($ten_san_pham) . '">
                                <h3><a href="' . $linksp . '">' . htmlspecialchars($ten_san_pham) . '</a></h3>
                                <p class="price">$' . number_format($gia, 2) . '</p>
                            </div>
                        ';
                    }
                } else {
                    echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
                }
            ?>
        </div>
    </section>

    <!-- New Arrival Section -->
    <section class="new-arrival">
        <h2>New Arrival</h2>
        <div class="collections">
            <div class="collection-item man">
                <h3>Man's Collection</h3>
                <button>Shop Now</button>
            </div>
            <div class="collection-item woman">
                <h3>Woman's Collection</h3>
                <button>Shop Now</button>
            </div>
        </div>
    </section>
</main>
