@extends('layouts.app')

@section('content')
   <div class="flex justify-center pt-6">
      <div class="bg-white w-4/12 p-6 rounded-lg">
        <h1 class="text-yellow-600 text-lg text-center">Register</h1>
        <form action="{{route('register')}}" method="POST" class="pt-6">
            @csrf

            @if ($errors->any())
                <div class="mb-2">
                    <ul class="text-red-500 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>. {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="text" name="name" placeholder="Your name" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror" value="{{old('name')}}"><br>

            <input type="email" name="email" placeholder="Email" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror" value="{{old('email')}}"><br>

            <input type="password" name="password" placeholder="Password" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror"><br>

            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror"><br>
            
            <input type="text" name="username" placeholder="Username" class="bg-gray-200 w-full p-3 border mb-4 rounded-lg focus:outline-none focus:border-yellow-600 @error('name') border-red-500 @enderror" value="{{old('username')}}">

            <button class="w-full p-3 bg-yellow-600 text-white rounded-lg">Submit</button>
        </form>
      </div>
    
    </div>
@endsection