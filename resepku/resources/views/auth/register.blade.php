<x-app-layout title="Register">
    <div class="card auth mx-auto p-3 rounded shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold">Register</h2>
            <p class="mb-4">Silahkan masuk ke Resepku untuk mulai berbagi resep atau mencari resep yang kamu mau!</p>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap kamu" autofocus value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="budi@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password ..." value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-resepku w-100 py-2 fw-bold rounded">Register</button>
                </div>
                <p class="text-center mb-0">Sudah memiliki akun?
                    <a href="{{ route('login') }}" class="text-decoration-none hover-none text-resepku fw-bold">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-app-layout>