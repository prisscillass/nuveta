<!DOCTYPE html>
    <html lang="en" class="h-full">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @vite('resources/css/app.css')

    <title>Login | Nuveta</title>
    </head>

    <body class="h-full bg-gray-100 flex justify-center items-center">
        <!-- Register Card -->
        <div class="flex w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Register Picture -->
            <div class="w-[400px] hidden md:block">
                <img src="/assets/profile/login-page.jpg" alt="picture" class="w-full h-full object-cover" />
            </div>

            <!-- Register Form -->
            <div class="flex-1 flex flex-col justify-center items-center p-8 text-primary-2 gap-6">
                <p class="italic font-semibold text-2xl w-full text-center">Login to your account!</p>
                <form class="flex flex-col w-full max-w-sm text-sm font-semibold" action="{{ route('login') }}" method="post">
                    @csrf
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" class="border px-3 py-2 rounded-md" />

                    <label for="password" class="mb-1 mt-4">Password</label>
                    <input type="password" name="password" id="password" class="border px-3 py-2 rounded-md"/>

                    <div class="my-8">
                    <button type="submit" class="bg-primary-2 text-white font-bold text-lg px-6 py-3 rounded-md w-full mt-8">
                        Login
                    </button>
                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}" class="underline text-blue-600">Sign up here</a>
                    </p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
