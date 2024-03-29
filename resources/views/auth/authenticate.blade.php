<x-layouts.layout>
    <div class="px-12 mt-8 flex flex-col justify-center">
        <div class="mt-2">
            {{-- ADS --}}

            <!-- HORIZONTAL -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="3496243870"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

        <div class="flex justify-center">
            <div class="w-3/2 ">
                <form action="{{ route('authenticate') }}" method="POST" 
                class="px-12 py-6 justify-self-center w-full shadow-lg relative">
                    @csrf
                    <h1 class="text-2xl font-bold mb-12">Sign in</h1>
                    <input type="text" name="username" class=" px-4 py-2 w-full border rounded-xl border-gray-900" placeholder="Username">
                    @error('username')
                        <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" class="mt-6 px-4 py-2 w-full border rounded-xl border-gray-900" placeholder="Password">
                    @error('password')
                        <p class="text-red-500 w-full absolute text-sm">{{ $message }}</p>
                    @enderror
                    <div class="flex items-start mt-6">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="remember" class="w-4 h-4 mt-1 accent-gray-900">
                        </div>
                        <label for="remember" class="ml-2 text-gray-900">
                          Remember me
                        </label>
                    </div>
                    <button class="mt-6 px-4 py-2 w-full rounded-xl bg-gray-800 hover:bg-gray-900 text-white">
                        Sign in
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-2">
            {{-- ADS --}}

            <!-- 1ST HORIZONTAL -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4812454445865215"
                data-ad-slot="4415877212"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
        </div>
    </div>

</x-layouts.layout>