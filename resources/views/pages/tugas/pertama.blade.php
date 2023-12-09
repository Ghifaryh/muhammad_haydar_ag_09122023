@extends('layouts.app')

@section('main')
    <div class="container mx-auto p-4">
        <div class="flex justify-center pb-5">
            <h1 class="font-bold text-4xl">Form Data Diri</h1>
        </div>

        <form action="" class="bg-gray-100 p-4 rounded-lg shadow-lg">
            <div class="input-nama mb-2">
                <label for="nama" class="block font-bold text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama"
                    value="Muhammad Haydar Al-Ghifary"
                    class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="input-lahir mb-2">
                <label for="kota_lahir" class="block font-bold text-gray-700">Tempat, Tanggal Lahir</label>
                <div class="flex items-center space-x-1">
                    <input type="text" name="kota_lahir" id="kota_lahir" placeholder="Kota" value="Bandung"
                        class="w-1/3 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"><span>,</span>
                    <input type="number" name="tanggal" id="tanggal" placeholder="Tanggal" value="19"
                        class="w-1/6 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span>/</span>
                    <input type="number" name="bulan" id="bulan" placeholder="Bulan" value="05"
                        class="w-1/6 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span>/</span>
                    <input type="number" name="tahun" id="tahun" placeholder="tahun" value="2001"
                        class="w-1/6 border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="input-alamat mb-2">
                <label for="alamat" class="block font-bold text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" cols="40" rows="5" placeholder="Alamat"
                    class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
            </div>
            <div class="input-telepon mb-2">
                <label for="notelp" class="block font-bold text-gray-700">No. Telp/HP</label>
                <input type="number" name="notelp" id="notelp"
                    class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="input-gender mb-2">
                <label for="notelp" class="block font-bold text-gray-700">Jenis Kelamin</label>
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="l">Laki-Laki
                <input type="radio" name="jenis_kelamin" id="jenis_kelamin"value="p">Perempuan
            </div>
            <div class="input-agama mb-2">
                <label for="agama" class="block font-bold text-gray-700">Agama</label>
                <select name="agama" id="agama"
                    class="w-full border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-
                500">
                    <option value="">Pilih Agama</option>
                    <option value="1">Islam</option>
                    <option value="2">Non-Islam</option>
                </select>
            </div>
            <div class="input-hobi">
                <label for="hobi" class="block font-bold text-gray-700">Hobi</label>
                <input type="checkbox" id="baca_buku" name="hobi" value="1">
                <label for="baca_buku">Baca Buku</label>
                <input type="checkbox" id="olah_raga" name="hobi" value="2">
                <label for="olah_raga">Olah Raga</label>
                <input type="checkbox" id="main_game" name="hobi" value="3">
                <label for="main_game">Main Game</label>
                <input type="checkbox" id="hiking" name="hobi" value="4">
                <label for="hiking">Hiking</label>
            </div>

            <div class="tombol my-5">
                <button type="submit" class="rounded-xl bg-orange-500 py-2 px-3 mr-3" id="submit">Tampilkan</button>
                <button class="rounded-xl bg-yellow-400 py-2 px-3" id="reset">Reset</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        const submitBtn = document.getElementById('submit');
        const resetBtn = document.getElementById('reset');
        const form = document.querySelector('form');

        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            let data = {};
            for (const element of form.elements) {
                if (element.name && element.value) {
                    if (element.type === 'checkbox') {
                        if (element.name === 'hobi') {
                            if (element.checked) {
                                data.hobi = data.hobi || [];
                                data.hobi.push(element.value);
                            }
                        }
                    } else {
                        data[element.name] = element.value;
                    }
                }
            }

            if (!data.jenis_kelamin) {
                data.jenis_kelamin = 'l';
            }

            if (data.hobi) {
                data.hobi = data.hobi.map(value => {
                    switch (value) {
                        case "1":
                            return 'Baca Buku';
                        case "2":
                            return 'Olah Raga';
                        case "3":
                            return 'Main Game';
                        case "4":
                            return 'Hiking';
                        default:
                            return 'Tidak ada hobi yang dipilih';
                    }
                });
            }

            switch (data.jenis_kelamin) {
                case 'l':
                    data.jenis_kelamin = 'Laki-Laki';
                    break;
                case 'p':
                    data.jenis_kelamin = 'Perempuan';
                    break;
                default:
                    data.jenis_kelamin = 'Jenis kelamin tidak ditentukan';
            }

            switch (data.agama) {
                case '1':
                    data.agama = 'Islam';
                    break;
                case '2':
                    data.agama = 'Non-Islam';
                    break;
                default:
                    data.agama = 'Jenis kelamin tidak ditentukan';
            }

            let message = `
            Nama Lengkap: ${data.nama}
            Tempat, Tanggal Lahir: ${data.kota_lahir}, ${data.tanggal}/${data.bulan}/${data.tahun}
            Alamat: ${data.alamat}
            No. Telp/HP: ${data.notelp}
            Jenis Kelamin: ${data.jenis_kelamin}
            Agama: ${data.agama}
            Hobi: ${data.hobi ? data.hobi.join(', ') : 'Tidak ada hobi yang dipilih'}

            `;
            alert(message);
        });

        resetBtn.addEventListener('click', function() {
            form.reset();
        });
    </script>
@endsection
