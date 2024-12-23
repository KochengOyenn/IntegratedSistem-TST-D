@extends('layouts.shop')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section st-color container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Konfirmasi Pesanan</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Detail Pesanan</h4>
            <form action="/shop/proses_pesanan" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="form-group mb-4">
                            <label for="tipe_pembayaran">Tipe Pembayaran</label>
                            <select class="form-control selectpicker border @error('tipe_pembayaran') border-danger @enderror" id="tipe_pembayaran" name="tipe_pembayaran" data-size="4" data-live-search="true" title="Pilih Tipe Pembayaran">
                                <option value="0" 
                                @if (old('tipe_pembayaran') == "0")
                                    selected
                                @endif>Transfer Bank</option>
                                <option value="1"  @if (old('tipe_pembayaran') == "1")
                                selected
                            @endif>COD (<i>Cash On Delivery</i>)</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima" autocomplete="off" value="{{ old('nama_penerima') }}" autofocus>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                              <label for="notelp_penerima">No. Telp Penerima</label>
                              <input type="text" class="form-control @error('notelp_penerima') is-invalid @enderror" id="notelp_penerima" name="notelp_penerima" value="{{ old('notelp_penerima', auth()->user()->notelp) }}" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                            </div>
                          </div>

                        <!-- Tombol Pakai Diskon -->
                        <button type="button" id="applyDiscount" class="btn btn-link p-0 mt-2">Pakai Diskon 30%</button>
                        <small class="text-muted d-block">Khusus pengguna <b>Resepku.com</b></small>

                        <!-- Form Validasi Diskon -->
                        <div id="discountForm" class="mt-3" style="display: none;">
                            <div class="form-group">
                                <label for="discountEmail">Email:</label>
                                <input type="email" id="discountEmail" class="form-control" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="discountPassword">Password:</label>
                                <input type="password" id="discountPassword" class="form-control" placeholder="Masukkan Password">
                            </div>
                            <button type="button" id="validateDiscount" class="btn btn-primary">Validasi Diskon</button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4>Detail Pesanan</h4>
                            <div class="checkout__order__products">Items <span>Total</span></div>
                            <ul>
                                @foreach ($items as $item)
                                        <li><b class="text-capitalize font-weight-normal">{{ $item->produk->nama_produk }}</b> (x{{ $item->qty }})  <span>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span id="subtotal">Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                            <div class="checkout__order__subtotal mt-n3">Promo <span id="promo">- Rp. {{ number_format(0, 0, ',', '.') }}</span></div>
                            <div class="checkout__order__total">Total <span id="total">Rp. {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                            <button type="submit" class="site-btn">Konfirmasi Pesanan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<script>
    $(document).ready(function() {
        // Tampilkan form diskon saat tombol ditekan
        $('#applyDiscount').on('click', function() {
            $('#discountForm').toggle();
        });

        // Validasi diskon melalui AJAX
        $('#validateDiscount').on('click', function() {
            var email = $('#discountEmail').val();
            var password = $('#discountPassword').val();
            var subtotal = {{ $subtotal }};
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: '/validate-user',
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: token
                },
                success: function(response) {
                    if (response.success && response.result === 1) {
                        var discount = subtotal * 0.3; // Hitung diskon 30%
                        var newTotal = subtotal - discount;
                        $('#promo').html('- Rp. ' + new Intl.NumberFormat('id-ID').format(discount));
                        $('#total').html('Rp. ' + new Intl.NumberFormat('id-ID').format(newTotal));
                        alert('Diskon berhasil diterapkan!');
                    } else {
                        alert('Diskon tidak valid!');
                    }
                },
                error: function(error) {
                    alert('Terjadi kesalahan: ' + error.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection