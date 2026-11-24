<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-slate-800 antialiased">
    <div class="flex min-h-screen">
        <!-- Panel kiri (layar besar) -->
        <div class="hidden flex-1 flex-col justify-between bg-slate-900 p-12 text-white lg:flex">
            <div class="flex items-center gap-3">
                <span class="flex size-10 items-center justify-center rounded-md bg-teal-600">
                    <x-icon name="mail" class="size-6 text-white" />
                </span>
                <span class="text-lg font-semibold tracking-tight">SIM-Surat</span>
            </div>
            <div>
                <h2 class="max-w-md text-3xl font-semibold leading-snug tracking-tight">Surat masuk dan surat keluar, tercatat rapi di satu tempat.</h2>
                <p class="mt-4 max-w-md text-slate-400">Sistem Informasi Surat untuk mencatat, mencari, dan mengelola arsip surat.</p>
            </div>
            <p class="text-sm text-slate-500">Sistem Informasi Surat</p>
        </div>

        <!-- Form login -->
        <div class="flex flex-1 items-center justify-center px-4 py-12">
            <div class="w-full max-w-sm">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Login SIM-Surat</h1>
                <p class="mt-1 text-sm text-slate-500">Masuk dengan akun yang sudah terdaftar.</p>

                <form method="POST" action="{{ route('login.submit') }}" class="card mt-6 space-y-5 p-6">
                    @csrf
                    <div>
                        <label for="email" class="label">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="input" autofocus>
                        @error('email')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="label">Password</label>
                        <input id="password" type="password" name="password" class="input">
                        @error('password')
                            <p class="field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
