<?php 
session_start();
require_once 'controller/cartcontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Porduct</title>
     <!-- Link bootstrap -->
     <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- Icon bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Style css -->
     <link rel="stylesheet" href="style.css">
    <!-- Jquery -->
      <script src="jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- NAVIGASI -->
    <nav class="navbar shadow-sm  bg-body-tertiary border-bottom sticky-top z-3">
        <div class="container-fluid px-2 px-md-5 ">
          <a class="navbar-brand fw-bold fs-1 d-none d-sm-block logo me-auto" href="index.html">Skamart</a>
          <button class="button-back mt-2 me-md-3"><a href="halamanutama.php" class="text-reset text-decoration-none text-nowrap "><i class="bi bi-caret-left"></i>Kembali Ke Beranda</a></button>
            <div class="d-flex align-items-center">
            <i class="bi bi-cart2 position-relative fs-1 me-2  me-md-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
              <span class="position-absolute  start-100 translate-middle badge rounded-circle bg-danger" style="font-size: 10px; top: 16px;">
              2
              </span>
            </i>
              <div class="offcanvas offcanvas-bottom" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title fw-bold fs-2" id="offcanvasScrollingLabel">Keranjang Belanja</h5>
                  <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div class="container-fluid  border-bottom py-2">
                    <div class=" cart-item d-flex justify-content-between">
                        <div class="d-flex column-gap-0 column-gap-sm-1 column-gap-md-5">
                            <input type="checkbox">        
                        <div >
                            <img src="asset/img/download (6).jpeg" alt="Product Image">
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="cart-item-title">Chitato</div>
                                <div class="cart-item-price text-secondary">$20.00</div>
                        </div>
                       </div>
                        <div class=" cart-item-controls">
                            <button class="btn btn-sm btn-outline-secondary">-</button>
                            <input type="number" value="1" min="1">
                            <button class="btn btn-sm btn-outline-secondary">+</button>
                        </div>
                    </div>
                  </div>
  
                </div>
                <div class="sticky-bottom border rounded-top-5 shadow-lg px-3 px-lg-5 py-3 bg-light z-3">
                  <div class="d-flex flex-column">
                    <div class="d-flex justify-content-between">
                      <span class="fw-bold">Selected Item (2)</span>
                      <span class="fw-bold">Rp.400.324</span>
                    </div>
                    <button class="btn btn-success fw-bold my-2 my-lg-4">Beli Sekarang</button>
                  </div>
                </div>
              </div>
              <div class="log border-start border-2 ps-1 ps-md-4 d-none d-md-block">
                  <button class="btn btn-outline-success">Masuk</button>
                  <button class="btn btn-success">Daftar</button>
              </div>
              <i class="bi bi-box-arrow-right fs-2 mt-1 ms-2 d-block d-md-none"></i>
            </div>
        </div>
      </nav>
     <!-- ============================================== -->
     <div class="container-fluid d-flex justify-content-center ">
     <?php

if ($product) {
    echo "   <div class='container-fluid d-flex justify-content-center '>
        <div class='container d-flex flex-column flex-xl-row justify-content-center py-lg-5 column-gap-4 detail-produk'>
            <!-- IMAGE PRODUCT -->
            <div class='d-flex flex-column align-items-center align-items-xl-start'>
                <h2 class='fw-bold d-none d-xl-block'>" . htmlspecialchars($product['namaproduk']) . "</h2>
                <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-utama'>
                <div class='mt-3 d-flex justify-content-center'>
                    <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-kecil border rounded' data-id='1'>
                    <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-kecil border rounded' data-id='2'>
                    <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-kecil border rounded' data-id='3'>
                    <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-kecil border rounded' data-id='4'>
                </div>
            </div>
    
            <!-- DESKRIPSI -->
            <div class='py-3 col-12 col-xl-4'>
                <div class='border-bottom'>
                    <h1 class='display-6 text-nowrap'>" . htmlspecialchars($product['namaproduk']) . "</h1>
                    <div class='text-nowrap d-flex align-items-center column-gap-2 w-100 my-4'>
                        <span>Terjual <span class='text-secondary'>" . htmlspecialchars($product['jumlahterjual']) . "</span></span>
                        <div class='d-flex align-items-center'>
                            <i class='bi bi-star-fill me-2 text-warning'></i>
                            <span>4.5 <span class='text-secondary d-none d-sm-inline'>(" . htmlspecialchars($product['rating']) . " rating)</span></span>
                        </div>
                    </div>
                    <h1 class='fw-bold'>Rp  " . htmlspecialchars($product['hargaproduk']) . "</h1>
                </div>
    
                <div>
                    <h2 class='border-bottom py-2'>Detail</h2>
                    <div class='py-4'>
                        <p><span class='text-secondary'>Sisa Stok: </span><span class='fw-bolder'>" . htmlspecialchars($product['sisastok']) . "</span></p>
                        <p><span class='text-secondary'>Kategori: </span>" . htmlspecialchars($product['category']) . "</p>
                        <p><span class='text-secondary'>Kondisi: </span>" . htmlspecialchars($product['kondisi']) . "</p>
                        <p><span class='text-secondary'>Asal pengiriman: </span>" . htmlspecialchars($product['asalpengiriman']) . "</p>
                        <p><span class='text-secondary'>Produk: </span>" . htmlspecialchars($product['buatan']) . "</p>
                        <p><span class='text-secondary'>Garansi: </span>1 " . htmlspecialchars($product['garansi']) . "</p>
                        <div class='deskripsi mt-4 border-top border-1 py-3'>
                            <div class='row align-items-center'>
                              <div class='d-flex justify-content-between align-items-center'>
                                <h4>" . htmlspecialchars($product['deskripsiproduk']) . "</h4>
                                <i class='bi bi-caret-down-fill fs-3' type='button' data-bs-toggle='collapse' data-bs-target='#productDescription' aria-controls='productDescription' aria-expanded='false' aria-label='Toggle description'></i>
                              </div>
                                <div class='collapse border-top pt-2' id='productDescription'>
                                
                                   " . htmlspecialchars($product['deskripsiproduk']) . "
                                </div>
                            </div>
                        </div>
                          
                    </div>
                </div>
            </div>
    
            <!-- CO -->
            <div class='border border-2 rounded p-3 co my-xl-4 bg-light shadow'>
                <div class='border-bottom py-3'>
                    <h4 class='fw-bold'>Atur Pesanan</h4>
                    <div class='d-flex align-items-center column-gap-2'>
                        <img src='asset/img/" . htmlspecialchars($product['gambarproduk']) . "' alt='' class='img-co'>
                        <p> " . htmlspecialchars($product['namaproduk']) . "</p>
                    </div>
                </div>
                <div class='d-flex justify-content-between align-items-center my-4'>
                    <p class='text-secondary text-nowrap'>Subtotal: </p>
                    <h4 class='text-nowrap'>Rp  " . htmlspecialchars($product['hargaproduk']) . "</h4>
                </div>
                <div class='d-flex flex-column'>
                    <a href='pembayaran.html' class=' text-decoration-none btn btn-success mb-2 card-link fw-bold '>Beli</a>
                    <button class='btn btn-outline-success fw-bold text-nowrap' onclick='addToCart' ". htmlspecialchars($product["id"]) . "'>Masukkan Keranjang</button>
                </div>
            </div>
        </div>
    </div>";
} else {
    echo "Detail produk tidak tersedia.";
}
?>
    </div>
    
    <div class="container mt-5">
        <h3 class="fw-bold">Tambah Penilaian Produk</h3>
        <form class="mb-4">
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg border-0 shadow-sm" id="username" placeholder="Masukkan username">
            </div>
            <div class="mb-3">
                <textarea class="form-control form-control-lg border-0 shadow-sm" id="comment" rows="3" placeholder="Tulis Penilaianmu" style="max-height: 150px;"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-lg fw-bold">Kirim</button>
        </form>
        
        
        
        <h3 class="mt-5">Peniaian Produk</h3>
        
        <div id="komen">
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>aizidane</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>12 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Pink)</small>
                </div>
                <p class="mb-0">Sangat Bagus, Pengiriman Cepat dan Mahal , Mohon Dikurangi Harganya.</p>
            </div>
    
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>RafiAF</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>11 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Hitam)</small>
                </div>
                <p class="mb-0">Bagus dan Cepat , Ini Terlalu Murah Untuk saya.</p>
            </div>
    
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>Aqila</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>10 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Coklat)</small>
                </div>
                <p class="mb-0">Ini Adalah pembelian hasil dari usaha saya selama 100 tahun, tapi pecah sedikit. syedihhh.</p>
            </div>
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>Aqila</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>10 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Coklat)</small>
                </div>
                <p class="mb-0">Ini Adalah pembelian hasil dari usaha saya selama 100 tahun, tapi pecah sedikit. syedihhh.</p>
            </div>
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>Aqila</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>10 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Coklat)</small>
                </div>
                <p class="mb-0">Ini Adalah pembelian hasil dari usaha saya selama 100 tahun, tapi pecah sedikit. syedihhh.</p>
            </div>
            <div class="border-top border-bottom py-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-3 me-2"></i>
                    <strong>Aqila</strong>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center text-muted mb-2">
                    <small>10 Aug 2024</small>
                    <div class="vr mx-2"></div>
                    <small>Iphone 15 Promax (Coklat)</small>
                </div>
                <p class="mb-0">Ini Adalah pembelian hasil dari usaha saya selama 100 tahun, tapi pecah sedikit. syedihhh.</p>
            </div>

        </div>
        
    </div>


  <!-- FOOTER -->

  <div class="container-fluid text-dark-50 footer pt-5 mt-5" id="footer">
    <div class="container py-5">
      <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(8, 7, 1, 0.5)">
        <div class="row g-4">

          <div class="col-lg-3  w-100 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <a class="fw-bold fs-2 logo text-decoration-none" href="index.html">Skamart</a>
            <div class="input-container ">
              <input required="" placeholder="Kritik dan Saran" type="email">
              <button class="invite-btn" type="button">
                Kirim
              </button>  
            </div>
          </div>

        </div>
      </div>
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <div class="footer-item">
            <h4 class="fw-bold mb-3">Kenapa Memilih Kami?</h4>
            <p class="mb-4">"Skamart, tempat Anda menemukan segala kebutuhan dengan harga terjangkau dan kualitas terbaik. Kami menyediakan produk berkualitas, dari bahan pokok hingga barang unik, dengan pelayanan yang ramah dan terpercaya"</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex flex-column text-start footer-item">
            <h4 class="fw-bold mb-3">Sosial Media</h4>
            <div class="icon-sosmed fs-2 d-flex column-gap-4 mt-2">
              <i class="bi bi-instagram"></i>
              <i class="bi bi-tiktok"></i>
              <i class="bi bi-facebook"></i>
              <i class="bi bi-youtube"></i>
          </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex flex-column text-start footer-item">
            <h4 class="fw-bold mb-3">Navigasi</h4>
            <a class="text-reset text-decoration-none" href="index.html">Beranda</a>
            <a class="text-reset text-decoration-none" href="index.html">Produk</a>
            <a class="text-reset text-decoration-none" href="index.html">Promo</a>
            <a class="text-reset text-decoration-none" href="index.html">Tentang kami</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 ">
          <div class="footer-item ">
            <h4 class="fw-bold mb-3">Contact</h4>
            <div class="d-flex align-items-center column-gap-2 my-3">
              <i class="bi bi-geo-alt-fill me-2 fs-4"></i>
              <span>Sampang , Pamekasan , Madura</span>
          </div>
            <div class="d-flex align-items-center column-gap-2 my-3">
              <i class="bi bi-envelope-open-fill me-2 fs-5"></i>
              <span>skamart@gmail.com</span>
          </div>
          <div class="d-flex align-items-center column-gap-2 my-3">
            <i class="bi bi-telephone-fill fs-4"></i>
            <span class="text-nowrap">+62 345 6543 9685</span>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    
    <!-- ============================================ -->

 

    <!-- Bootstrap js -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- Main js -->
    <script>
    $(document).ready(function() {
        // Function to handle "Masukkan Keranjang" button click
        $('.btn-outline-success').click(function() {
            var productId = <?php echo $product['id']; ?>; // ID produk yang sedang dilihat

            $.ajax({
                type: 'POST',
                url: 'cartcontroller.php',
                data: {
                    action: 'add',
                    product_id: productId
                },
                success: function(response) {
                    var result = JSON.parse(response);

                    if (result.success) {
                        // Update cart count on the UI
                        $('.bi-cart2 .badge').text(result.cart_count);
                    } else {
                        alert('Gagal menambahkan produk ke keranjang.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
                }
            });
        });

        // Function to get the cart count on page load
        function getCartCount() {
            $.ajax({
                type: 'GET',
                url: 'cartcontroller.php',
                data: {
                    action: 'count'
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    $('.bi-cart2 .badge').text(result.cart_count);
                },
                error: function() {
                    console.log('Gagal mendapatkan jumlah produk di keranjang.');
                }
            });
        }

        // Load cart count on page load
        getCartCount();
    });
</script>

    <script src="main.js"></script>
</body>
</html>