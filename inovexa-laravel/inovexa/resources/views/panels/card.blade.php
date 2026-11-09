<h2>Kartu Anggota Digital</h2>
<p style="color:var(--m);margin-top:-2px">Tunjukkan kartu ini di meja sirkulasi atau mesin peminjaman mandiri.</p>

<div class="mc member-card" style="max-width:450px">
    <div style="display:flex;justify-content:space-between;align-items:start;gap:12px">
        <small>INOVEXA PUBLIC LIBRARY</small>
        <span class="pill" style="background:rgba(255,255,255,.14);color:#fff">AKTIF</span>
    </div>
    <h3 style="margin:16px 0 0;font-size:23px">{{ $u['n'] }}</h3>
    <small>{{ $u['id'] }} · Anggota Reguler</small>
    <div style="background:#fff;padding:8px 10px 4px;border-radius:5px;margin-top:18px">
        <div class="real-barcode">{!! $lib->barcodeSvg($u['id']) !!}</div>
        <div style="font:10px/1.3 monospace;color:#111;letter-spacing:.12em;text-align:center;margin-top:3px">{{ $u['id'] }}</div>
    </div>
</div>

<div class="card" style="max-width:450px;margin-top:14px">
    <b>Barcode Kartu Anggota</b>
    <p style="margin:4px 0 12px;color:var(--m);font-size:12px">Barcode memiliki pola unik berdasarkan nomor anggota dan dapat dicetak untuk dibawa ke meja sirkulasi.</p>
    <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button class="btn" type="button" onclick="window.print()">🖨 Cetak Kartu Anggota</button>
        <button class="btn ghost" type="button" onclick="copyMemberId('{{ $u['id'] }}')">▣ Salin Nomor Anggota</button>
    </div>
</div>

<script>
function copyMemberId(id) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(id).then(() => toast('Nomor anggota disalin: ' + id));
    } else {
        toast('Nomor anggota: ' + id);
    }
}
</script>
