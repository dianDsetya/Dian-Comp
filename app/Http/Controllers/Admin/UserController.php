<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $show = $request->input('show', 10);

        $query = User::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $users = $query->paginate($show)->appends($request->all());

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Data Admin berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        if (auth('admin')->id() == $user->id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak dapat menghapus akun yang sedang Anda gunakan!');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Admin berhasil dihapus!');
    }

    public function export($type)
    {
        $users = User::select('name', 'email')->get();

        $data = $users->map(function ($user, $index) {
            return [
                'no' => $index + 1,
                'name' => $user->name,
                'email' => $user->email,
            ];
        });

        switch ($type) {
            case 'excel':
                return Excel::download(new UsersExport, 'users.xlsx');
            case 'csv':
                return Excel::download(new UsersExport, 'users.csv');
            case 'pdf':
                $pdf = Pdf::loadView('admin.users.users-pdf', compact('data'));
                return $pdf->download('users.pdf');
            case 'print':
                return view('admin.users.users-print', compact('data'));
            default:
                abort(404);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport!');
    }
}
