<x-app-layout title="Login">
    <div class="card auth mx-auto p-3 rounded shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold">Login</h2>
            <p class="mb-4">Silahkan masuk ke Resepku untuk mulai berbagi resep atau mencari resep yang kamu mau!</p>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="budi@gmail.com" autofocus value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password ..." value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="float-start">
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-resepku w-100 py-2 fw-bold rounded">Login</button>
                </div>
                <p class="text-center mb-0">Belum punya akun?
                    <a href="{{ route('register') }}" class="text-decoration-none hover-none text-resepku fw-bold">Register</a>
                </p>
            </form>
        </div>
    </div>
</x-app-layout>