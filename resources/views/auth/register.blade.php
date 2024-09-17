@extends('layouts.authLayout')

@section('title', 'Register | E-Restaurant')

@section('body')
    <div class="max-w-[480px] w-full border border-slate-200 bg-slate-100 p-6">
        <h1 class="font-semibold text-rose-500 text-3xl mb-2">Register</h1>
        <small>Hello! We're happy to have you here! 💖</small>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="/register" method="POST">
            @csrf
            <div class="mt-5 mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" id="name"
                    class="bg-slate-50 border border-slate-300 text-gray-900 text-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 block w-full p-1.5"
                    name="name" placeholder="e.g: Andi Budi" />
            </div>
            <div class="mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email"
                    class="bg-slate-50 border border-slate-300 text-gray-900 text-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 block w-full p-1.5"
                    name="email" placeholder="e.g: Andi@Budi.com" />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password"
                    class="bg-slate-50 border border-slate-300 text-gray-900 text-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 block w-full p-1.5"
                    name="password" placeholder="Admin#123" />
            </div>
            <button
                class="block w-full bg-rose-500 text-white font-bold text-center py-1.5 mb-5 hover:bg-rose-400 transition-all">Register</button>
            <div class="w-fit mx-auto text-[12px]">
                Have an account already? <a href="" class="text-rose-500 border-b border-rose-500">Login here
                    🫰</a>
            </div>
        </form>
    </div>
@endsection
