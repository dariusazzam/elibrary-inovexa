<?php

namespace App\Http\Controllers;

use App\Support\Library;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lib = Library::load();
        $q = trim((string) $request->query('q', ''));
        $topic = (string) $request->query('topic', '');
        $books = $lib->filter($q, $topic);

        if ($q === '' && $topic === '' && ! $request->boolean('all')) {
            $books = array_slice($books, 0, 3);
        }

        return view('home', compact('lib', 'books', 'q', 'topic'));
    }

    public function reserve(int $id)
    {
        $user = session('user');
        $lib = Library::load();

        if (! $user) {
            return redirect()->route('login', 'member')->with('toast', 'Masuk sebagai anggota untuk reservasi');
        }
        if ($user['role'] !== 'member') {
            return back()->with('toast', 'Reservasi hanya untuk akun anggota');
        }
        abort_unless($lib->book($id), 404);

        if ($lib->hasReservation($id, $user['n'])) {
            return back()->with('toast', 'Buku sudah ada di daftar reservasi Anda');
        }

        $lib->resv[] = ['b' => $id, 'w' => $user['n']];
        $lib->save();

        return back()->with('toast', $lib->out($id) ? 'Anda masuk antrean' : 'Reservasi berhasil, ambil dalam 24 jam');
    }
}
