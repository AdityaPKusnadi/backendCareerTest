<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CareerController extends Controller
{
    private string $sourceUrl = 'https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131';

    public function index()
    {
        return response()->json([
            'total' => count($rows = $this->getData()),
            'data' => $rows,
        ]);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'nama' => ['required_without_all:nim,ymd', 'string'],
            'nim' => ['required_without_all:nama,ymd', 'string'],
            'ymd' => ['required_without_all:nama,nim', 'digits:8'],
        ]);

        $rows = $this->getData();

        if ($request->filled('nama')) {
            $keyword = mb_strtolower($request->query('nama'));
            $rows = array_filter($rows, fn ($row) => str_contains(mb_strtolower($row['nama']), $keyword));
        }

        if ($request->filled('nim')) {
            $rows = array_filter($rows, fn ($row) => $row['nim'] === $request->query('nim'));
        }

        if ($request->filled('ymd')) {
            $rows = array_filter($rows, fn ($row) => $row['ymd'] === $request->query('ymd'));
        }

        return response()->json([
            'total' => count($rows),
            'data' => array_values($rows),
        ]);
    }

    /**
     * Ambil data langsung dari sumber dan ubah jadi array.
     *
     * @return array<int, array{nama: string, ymd: string, nim: string}>
     */
    private function getData(): array
    {
        $response = Http::timeout(10)->get($this->sourceUrl);

        if ($response->failed() || $response->json('RC') !== 200) {
            abort(502, 'Gagal mengambil data dari sumber.');
        }

        $lines = array_filter(explode("\n", trim($response->json('DATA'))));

        // baris pertama adalah header, tentukan posisi kolom dari situ
        $header = explode('|', array_shift($lines));
        $pos = array_flip($header);

        $rows = [];

        foreach ($lines as $line) {
            $cols = explode('|', trim($line));

            $rows[] = [
                'nama' => $cols[$pos['NAMA']] ?? '',
                'ymd' => $cols[$pos['YMD']] ?? '',
                'nim' => $cols[$pos['NIM']] ?? '',
            ];
        }

        return $rows;
    }
}
