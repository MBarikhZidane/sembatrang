$(document).ready(function() {
  function updateContainerClass() {
    if ($(window).width() < 1200) {
      $('#promo.container').removeClass('container');
      $('#carouselExampleIndicators.container-md').removeClass('container-md');
      $('#carousel-dalam.rounded-4').removeClass('rounded-4');
      $('.promo').addClass('container-fluid');
      $('.brand.container').removeClass('container');
      $('.brand').addClass('container-fluid');
    } else {
      $('#carousel-dalam').addClass('rounded-4');
      $('#carouselExampleIndicators').addClass('container-md');
      $('.promo.container-fluid').removeClass('container-fluid')
      $("#promo").addClass('container');
      $('.brand.container-fluid').removeClass('container-fluid');
      $('.brand').addClass('container');
    }
    if ($(window).width() < 992) {
      $('#beranda.container').removeClass('container');
      $('#beranda').addClass('container-fluid');
    } else {
      $('#beranda.container-fluid').removeClass('container-fluid');
      $('#beranda').addClass('container');
    }
    if ($(window).width() < 400) {
      $('#pf.container-fluid').removeClass('container-fluid');
      $('#footer.rounded-top-5').removeClass('rounded-top-5');
    } else {
      $('#pf').addClass('container-fluid');
      $('#footer').addClass('rounded-top-5');
    }

    // countCart();
  }
  

  updateContainerClass();
  $(window).resize(function() {
    updateContainerClass();
  });   $('#rangeStok').on('input', function () {
    maxStok = parseInt($(this).val());
    $('#stokTerpilih').text(maxStok);
    filterProducts(); 
  });

  function filterProducts() {
    var minHarga = $('#minHarga').val();
    var maxHarga = $('#maxHarga').val();
    var rangeStok = $('#rangeStok').val();
    var ratingOrder = $('#ratingOrder').val();

    $.ajax({
        url: 'index.php', // Halaman PHP yang menangani filter
        method: 'GET',
        data: {
            minHarga: minHarga,
            maxHarga: maxHarga,
            rangeStok: rangeStok,
            ratingOrder: ratingOrder
        },
        success: function(response) {
            $('#displayProduk').html(response);
        }
    });
}

// Event listener untuk filter
$('#minHarga, #maxHarga, #rangeStok, #ratingOrder').on('input change', function() {
    filterProducts();
});

$('#resetFilter').on('click', function() {
    $('#minHarga').val('');
    $('#maxHarga').val('');
    $('#rangeStok').val('500');
    $('#ratingOrder').val('');
    filterProducts(); // Reset filter dan perbarui produk
});
$(".img-kecil").on('click', function(e) {
if ($(this).hasClass('img-kecil')) {
  $(".img-utama").attr('src', $(this).attr('src'));
}
});

$('.kotak').on('click', function(){
  var category = $(this).data('category');
  $.ajax({
      url: 'index.php',
      type: 'GET',
      data: {category: category},
      success: function(response){
          $('#displayProduk').html(response);
      },
      error: function(xhr, status, error){
          console.error(error);
      }
  });
});

function searchProducts(keyword) {
  $.ajax({
      url: 'index.php', // Endpoint PHP untuk pencarian produk
      method: 'GET',
      data: {
          search: keyword // Parameter pencarian
      },
      success: function(response) {
          $('#displayProduk').html(response); // Tampilkan hasil pencarian di bagian display produk
      },
      error: function(xhr, status, error) {
          console.error(error); // Menampilkan error di console untuk debugging
      }
  });
}

// Event listener untuk input pencarian
$('#search-input').on('input', function() {
  var keyword = $(this).val(); // Ambil nilai input pencarian
  if (keyword.length > 0) {
      searchProducts(keyword); // Panggil fungsi pencarian produk
  } else {
      getAllProducts(); // Jika input kosong, panggil fungsi untuk menampilkan semua produk
  }
});

// Tambahkan fungsi ini untuk mengambil dan menampilkan semua produk
function getAllProducts() {
  $.ajax({
      url: 'index.php', // Endpoint PHP untuk mengambil semua produk
      method: 'GET',
      data: {
          allProducts: true // Kirim parameter khusus untuk mengambil semua produk
      },
      success: function(response) {
          $('#displayProduk').html(response); // Tampilkan semua produk
      },
      error: function(xhr, status, error) {
          console.error(error); // Menampilkan error di console untuk debugging
      }
  });
}

function addToCart(productId) {
  $.ajax({
      url: 'cartcontroller.php',
      type: 'POST',
      data: { action: 'add', product_id: productId },
      dataType: 'json',
      success: function(response) {
          if (response.success) {
              // Perbarui jumlah item di ikon keranjang
              updateCartCount(response.cart_count);
              alert("Produk berhasil ditambahkan ke keranjang!");
          } else {
              alert("Gagal menambahkan produk ke keranjang.");
          }
      },
      error: function() {
          alert("Terjadi kesalahan. Coba lagi.");
      }
  });
}

function updateCartCount(count) {
  // Tambahkan jumlah produk ke ikon keranjang
  if (count > 0) {
      $('.bi-cart2').append('<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'+ count +'</span>');
  } else {
      $('.bi-cart2 .badge').remove();
  }
}

// Panggil updateCartCount() untuk menampilkan jumlah item di keranjang saat halaman dimuat
$(document).ready(function() {
  $.ajax({
      url: 'cartcontroller.php',
      type: 'GET',
      data: { action: 'count' },
      dataType: 'json',
      success: function(response) {
          updateCartCount(response.cart_count);
      }
  });
});
addToCart();
});