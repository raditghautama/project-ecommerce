document.addEventListener("DOMContentLoaded", function() {
    const addToCartBtn = document.getElementById("addToCartBtn");
    const cartModal = new bootstrap.Modal(document.getElementById("cartModal"));

    addToCartBtn.addEventListener("click", function(event) {
      event.preventDefault(); // Mencegah tindakan default dari link

      // Lakukan tindakan lain yang perlu Anda lakukan saat menambahkan ke keranjang

      cartModal.show(); // Tampilkan modal setelah item ditambahkan
    });
  });
