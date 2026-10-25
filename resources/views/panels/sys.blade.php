<h2>Pengaturan</h2>
<form method="POST" action="{{ route('settings.save') }}">
    @csrf
    <div class="fm">
        <label>Lama pinjam (hari)
            <input class="in" name="dur" type="number" min="1" max="365" value="{{ $lib->cfg['dur'] }}">
        </label>
        <label>Denda per hari (Rp)
            <input class="in" name="fine" type="number" min="0" value="{{ $lib->cfg['fine'] }}">
        </label>
    </div>
    @if($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
    <button class="btn">Simpan perubahan</button>
</form>
