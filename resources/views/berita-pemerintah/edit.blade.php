@extends('layouts.dashboard')
@section('title', 'Berita | Edit')

<body class="bg-[#F2FBFF] text-[#185141]">
    <div class="p-4 sm:ml-72 mt-16 mb-96">
        <h1 class="font-bold text-4xl">BUAT<i class="text-[#188941] underline decoration-4">BERITA</i></h1>
        <hr class="mt-5">
        <div class="mt-10 flex w-full justify-center">
            <form class="space-y-4 md:space-y-6 w-2/3" method="post" action="{{ route('berita-pemerintah.update', $berita->slug) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
                <div>
                    <label for="judul_berita" class="block mb-2 text-3xl font-medium dark:text-white">Judul Berita</label>
                    <input type="text" name="judul_berita" id="judul_berita" class="@error('judul_berita') border-red-500 @enderror bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5" placeholder="judul berita"  value="{{ old('judul_berita', $berita->judul_berita) }}">
                        @error('judul_berita')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <input type="hidden" id="slug" name="slug" required value="{{ old('slug', $berita->slug) }}">
                <div>
                    <label for="image" class="block mb-2 text-3xl font-medium dark:text-white">Gambar Cover</label>
                    <input type="hidden" name="oldImage" value="{{ $berita->image }}">
                    @if ($berita->image)
                        <img src="{{ asset('storage/'.$berita->image) }}" class="object-scale-down max-h-80 w-auto" id="frame" alt="">
                    @else    
                        <img class="object-scale-down max-h-80 w-auto" id="frame">
                    @endif
                    <input class="form-control @error('image') border-red-500 @enderror mt-3 border-gray-300 rounded-lg bg-gray-50 border w-full" type="file" id="image" name="image" onchange="preview()">
                    @error('image')
                        <div class=" text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="isi_berita" class="form-label text-3xl font-medium">Isi Berita</label>
                    <input id="isi_berita" type="hidden" name="isi_berita" class="" value="{{ old('isi_berita', $berita->isi_berita) }}">
                    <trix-editor input="isi_berita" class="mt-3 bg-white @error('isi_berita') border-red-500 @enderror focus:ring-lime-500 focus:border-lime-500"></trix-editor>
                    @error('isi_berita')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="mt-10 w-full text-white bg-[#40C6A1] hover:bg-[#40A1A1] focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">Simpan</button>
            </form>
        </div>
    </div>
    <script>
        const title = document.querySelector('#judul_berita');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/berita-pemerintah/checkSlug?judul_berita=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
        function preview(){
            frame.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>