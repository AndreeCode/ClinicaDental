<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OdontoCenter Hap | Register</title>
    @vite('resources/css/app.css')
</head>

<body>
    <h1>register</h1>
    <a href="{{ route('login.form') }}">Login</a>
    <div class="max-w-4xl max-sm:max-w-lg mx-auto font-[sans-serif] p-6">
        <div class="text-center mb-12 sm:mb-16">
            <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                    class='w-48 inline-block' />
            </a>
            <h4 class="text-gray-600 text-base mt-6">Sign up into your account</h4>
        </div>

        @foreach ($errors->all() as $error )
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  " role="alert">
            <span class="font-medium">Danger alert!</span> {{$error}}
          </div>
        @endforeach
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-600 text-sm mb-2 block">First Name</label>
                    <input name="name" type="text"
                        class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded focus:bg-transparent outline-blue-500 transition-all"
                        placeholder="Enter name" />
                </div>
                <div>
                    <label class="text-gray-600 text-sm mb-2 block">Usuario</label>
                    <input name="email" type="text"
                        class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded focus:bg-transparent outline-blue-500 transition-all"
                        placeholder="email" />
                </div>
                <div>
                    <label class="text-gray-600 text-sm mb-2 block">Nmr. Telefono</label>
                    <input name="telefono" type="tel"
                        class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded focus:bg-transparent outline-blue-500 transition-all"
                        placeholder="Ingrese su numero de telefono" />
                </div>
                <div>
                    <label class="text-gray-600 text-sm mb-2 block">Password</label>
                    <input name="password" type="password"
                        class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded focus:bg-transparent outline-blue-500 transition-all"
                        placeholder="Enter password" />
                </div>
                <div>
                    <label class="text-gray-600 text-sm mb-2 block">Confirm Password</label>
                    <input name="password_confirmation" type="password"
                        class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-3 rounded focus:bg-transparent outline-blue-500 transition-all"
                        placeholder="Enter confirm password" />
                </div>
            </div>
        
            <div class="mt-8">
                <button type="submit"
                    class="mx-auto block py-3 px-6 text-sm tracking-wider rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                    Sign up
                </button>
            </div>
        </form>
        
    </div>
</body>

</html>
