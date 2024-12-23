<x-app-layout title="Detail Resep {{ $recipe->title }}">
<style>
    .recipe-cover {
        width: 100%;
        height: auto;
        object-fit: cover; 
        max-height: 300px;
        border-radius: 5px;
    }
</style>
    <section class="recipe-detail">
    <div class="mb-3">
            <img src="/images/recipe_images/{{ $recipe->image }}" class="recipe-cover" alt="recipe-image">
        </div>
        <div class="mb-4">
            <h1 class="mb-2">{{ $recipe->title }}</h1>
            <h6 class="fw-normal lh-lg">{{ $recipe->description }}</h6>
        </div>
        <div class="mb-4">
            <h2>Bahan - bahan</h2>
            @foreach ($recipe->ingredients as $ingredient)
                <div class="lh-lg">{{ $ingredient }}</div>
            @endforeach
        </div>
        <div class="mb-4">
            <h2>Langkah Pembuatan</h2>
            <ol class="ps-md-4 ps-3 lh-lg">
                @foreach ($recipe->cooking_steps as $cooking_step)
                    <li>{{ $cooking_step }}</li>
                @endforeach
            </ol>
        </div>


        <!-- Tombol untuk menampilkan harga bahan -->
        <div class="mb-4">
            <h2>Harga Bahan</h2>
            <button id="show-prices" class="btn btn-primary mb-3">Tampilkan Harga Bahan</button>
            <table class="table table-striped" id="prices-table" style="display: none;">
                <thead>
                    <tr>
                        <th>Bahan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th id="total-price">Rp 0</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <!-- Tambahkan JavaScript -->
    <script>
        document.getElementById('show-prices').addEventListener('click', function () {
            const ingredients = @json(json_decode($recipe->ListBahan)); // Ambil data ListBahan
            const pricesTable = document.getElementById('prices-table');
            const tbody = pricesTable.querySelector('tbody');
            const totalPriceEl = document.getElementById('total-price');

            // Bersihkan tabel sebelumnya
            tbody.innerHTML = '';
            totalPriceEl.textContent = 'Rp 0';

            // Fetch data harga dari API Web A
            fetch(`http://localhost:8000/api/produk/prices?${ingredients.map((ingredient, index) => `bahan[${index}]=${encodeURIComponent(ingredient)}`).join('&')}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch prices');
                    }
                    return response.json();
                })
                .then(data => {
                    let total = 0;

                    // Tampilkan data di tabel
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.nama_produk}</td>
                            <td>Rp ${parseInt(item.harga_produk).toLocaleString('id-ID')}</td>
                        `;
                        tbody.appendChild(row);
                        total += parseInt(item.harga_produk); // Hitung total harga
                    });

                    // Tampilkan total harga
                    totalPriceEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
                    pricesTable.style.display = 'table'; // Tampilkan tabel
                })
                .catch(error => {
                    alert('Gagal mengambil data harga. Silakan coba lagi.');
                    console.error(error);
                });
        });
    </script>
</x-app-layout>
