<?php
$products = isset($filteredProducts) ? $filteredProducts : $products;

if ($products instanceof mysqli_result && $products->num_rows > 0) {
    while ($row = $products->fetch_assoc()) {
            echo "<a href='index.php?id=" . htmlspecialchars($row['id']) . "' class='text-decoration-none col card-produk' data-kategori=" . htmlspecialchars($row['category']) . " data-harga='" . htmlspecialchars($row['hargaproduk']) . "' data-stok=" . htmlspecialchars($row['sisastok']) . " data-nama=" . htmlspecialchars($row['namaproduk']) . "'>
    <div class='card mx-auto'>
        <img loading='lazy' src='asset/img/".htmlspecialchars($row['gambarproduk'])."' class='card-img-top' alt='...'>
        <div class='card-body text-nowrap'>
            <span class='card-title fs-5'>" . htmlspecialchars($row['namaproduk']) . "</span><br>
            <span class='border border-success text-success px-2'> ". htmlspecialchars($row['category']) . "</span>
            <div class='d-flex align-items-center column-gap-1 text-nowrap'>
                <h5 class='card-text fw-bold my-1'>Rp  ". htmlspecialchars($row['hargaproduk']) . "</h5>
                <span class='text-secondary stok'>Stok:  ". htmlspecialchars($row['sisastok']) . "</span>
            </div>
            <div class='d-flex align-items-center'><i class='bi bi-geo-alt-fill text-success me-1'></i><span>Madura</span></div>
            <div class='rating d-flex align-items-center'>
                <div class='d-flex align-items-center'>
                    <i class='bi bi-star-fill me-2 text-warning'></i>
                    <span>" . htmlspecialchars($row['rating']) . "</span>
                </div>
                <div class='vr mx-1 mx-md-2'></div>
                <span class='ulasan'>" . htmlspecialchars($row['jumlahterjual']) . " (Terjual)</span>
            </div>
        </div>
    </div>
</a>";
 }
        } else {
            echo "
              <div class='tidakDitemukan text-center p-5 text-danger w-100'>
                  <h1 class='fw-bold'>Maaf, Produk Tidak Tersedia / Tidak Ditemukan. Silahkan Cari Yang Lain....</h1>
              </div>
          ";
        }
    ?>