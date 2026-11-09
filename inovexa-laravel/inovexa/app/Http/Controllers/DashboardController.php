<?php

namespace App\Http\Controllers;

use App\Support\Library;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(?string $menu = 'ov')
    {
        $u = session('user');
        $lib = Library::load();
        $menus = Library::MENU[$u['role']];
        $menu = $menu ?: 'ov';

        abort_unless(in_array($menu, array_column($menus, 0), true), 404);

        $my = array_values(array_filter($lib->loans, fn ($l) => $l['w'] === $u['n']));
        $mr = array_values(array_filter($lib->resv, fn ($r) => $r['w'] === $u['n']));
        $notifications = $lib->notifications($u);
        $notifCount = $lib->notificationCount($u);

        return view('dashboard', compact('u', 'lib', 'menus', 'menu', 'my', 'mr', 'notifications', 'notifCount'));
    }

    public function reader(int $id, Request $request)
    {
        $u = session('user');
        $lib = Library::load();
        $b = $lib->book($id);

        abort_unless($b, 404);

        $chapters = $lib->chapters($id);
        $currentChapterIndex = max(0, min((int) $request->query('bab', 1) - 1, count($chapters) - 1));
        $currentChapter = $chapters[$currentChapterIndex] ?? $chapters[0];

        return view('reader', compact('u', 'lib', 'b', 'chapters', 'currentChapterIndex', 'currentChapter'));
    }

    public function cancel(int $id)
    {
        $lib = Library::load();
        $lib->cancelReservation($id, session('user')['n']);
        $lib->save();

        return redirect()->route('dashboard', 'resv')->with('toast', 'Reservasi dibatalkan');
    }

    public function lend(Request $request)
    {
        $lib = Library::load();
        $who = trim((string) $request->input('w'));
        $book = (int) $request->input('b');

        if ($who === '' || ! $lib->book($book) || $lib->out($book)) {
            return back()->with('toast', 'Isi nama anggota dan pilih buku yang tersedia');
        }

        $lib->lend($who, $book);
        $lib->save();

        return back()->with('toast', 'Peminjaman dicatat');
    }

    public function giveBack(int $id)
    {
        $lib = Library::load();
        $fine = $lib->giveBack($id);
        $lib->save();

        return back()->with('toast', $fine ? 'Dikembalikan. Denda '.$lib->rp($fine) : 'Buku dikembalikan');
    }

    public function addBook(Request $request)
    {
        $title = trim((string) $request->input('t'));
        $author = trim((string) $request->input('a'));

        if ($title === '' || $author === '') {
            return back()->with('toast', 'Judul dan pengarang wajib diisi');
        }

        $lib = Library::load();
        $lib->addBook($title, $author);
        $lib->save();

        return back()->with('toast', 'Buku ditambahkan');
    }

    public function toggleUser(int $i)
    {
        $lib = Library::load();
        abort_unless(isset($lib->users[$i]), 404);

        $lib->users[$i]['on'] = ! $lib->users[$i]['on'];
        $lib->save();

        return back()->with('toast', 'Status pengguna diperbarui');
    }

    public function saveSettings(Request $request)
    {
        $data = $request->validate([
            'dur' => 'required|integer|min:1|max:365',
            'fine' => 'required|integer|min:0|max:1000000',
        ]);

        $lib = Library::load();
        $lib->cfg = ['dur' => (int) $data['dur'], 'fine' => (int) $data['fine']];
        $lib->save();

        return back()->with('toast', 'Pengaturan disimpan');
    }
}
