@extends('layouts.authLayout')

@section('title', 'Login | E-Restaurant')

@section('body')
    <div class="max-w-[480px] w-full border border-slate-200 bg-slate-100 p-6">
        <h1 class="font-semibold text-rose-500 text-3xl mb-2">Login</h1>
        <small>Welcome to Our Restaurant!👋</small>
        <form action="/login" method="POST">
            @csrf
            <div class="mt-5 mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email"
                    class="bg-slate-50 border border-slate-300 text-gray-900 text-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 block w-full p-1.5"
                    placeholder="e.g: Andi@Budi.com" name="email" />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password"
                    class="bg-slate-50 border border-slate-300 text-gray-900 text-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 block w-full p-1.5"
                    placeholder="Admin#123" name="password" />
            </div>
            <button
                class="block w-full bg-rose-500 text-white font-bold text-center py-1.5 mb-5 hover:bg-rose-400 transition-all">Login</button>
            <div class="w-fit mx-auto text-[12px]">
                Don't have an account yet? <a href="/register" class="text-rose-500 border-b border-rose-500">Register here
                    🫰</a>
            </div>
        </form>
    </div>
@endsection
