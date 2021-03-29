<x-template-layout>
                <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
            <div>
            <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 sm:br-gray-100">
            <form action="{{(isset($pasien))?route('pasien.update',$pasien->id):route('pasien.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($pasien))
        @method('PUT')
    @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Nama pasien</label>
                <input type="text" name="nama" id="nama" autocomplete="family-name" value="{{(isset($pasien))?$pasien->nama:old('nama') }}" class="mt-1  @error('nama') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik nama ">
              <div class="text-xs text-red-600">@error('nama'){{$message}} @enderror</div>
              </div>
            </div>
            <div>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-1">
                            <label for="waktu" class="block text-sm font-medium text-gray-700">
                                Tanggal Masuk
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="date" name="waktu" id="waktu" class="@error('waktu') border-red-600 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300  text-black">
                            </div>
                            <div class="text-xs text-red-500"> @error('waktu') {{$message}} @enderror</div>
                        </div>
                    </div>
                <div><br>
            <div>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="jeniskelamin" class="block text-sm font-medium text-gray-700">
                                Jenis Kelamin
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="jeniskelamin" id="jeniskelamin" class="@error('jeniskelamin') border-red-600 @enderror focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300">
                                    <option value="">Masukan Pilihan</option>
                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                            </div>
                            <div class="text-xs text-red-500"> @error('jeniskelamin') {{$message}} @enderror</div>
                        </div>
                    </div><br>
                    <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Penyakit</label>
                <input type="text" name="penyakit" id="penyakit" autocomplete="family-name" value="{{(isset($pasien))?$pasien->penyakit:old('penyakit') }}" class="mt-1  @error('penyakit') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik penyakit Pasien">
              <div class="text-xs text-red-600">@error('penyakit'){{$message}} @enderror</div>
              </div>
            </div><br>
            <div class="grid grid-cols-3 gap-15">
                        <div class="col-span-3 sm:col-span-2">
              <label for="last_name" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" name="alamat" id="alamat" autocomplete="family-name" value="{{(isset($pasien))?$pasien->alamat:old('alamat') }}" class="mt-1  @error('alamat') border-red-500 @enderror  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Ketik alamat Pasien">
              <div class="text-xs text-red-600">@error('alamat'){{$message}} @enderror</div>
              </div>
            </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
                   
                 </div>
            </div>
</x-template-layout>