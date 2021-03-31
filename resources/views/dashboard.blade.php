@extends('layouts.app')

@section('content')

    <div class="w-full h-64 pt-12 text-center bg-gradient-to-r from-gray-100 to-gray-400">
        <!-- <img class="mx-auto h-28 w-28 rounded-full ring-2 ring-white" src="https://media-exp1.licdn.com/dms/image/C4E03AQGP00Mgp7QTRA/profile-displayphoto-shrink_200_200/0/1596544153123?e=1620259200&v=beta&t=OGUyVpv6G21SWsHpZkrdGtM13ZQhZ0MgiXTLR1V9R2U" alt="">
        <h1 class="mt-3 text-2xl">Amzil Houdaifa</h1>
        <h4>Laravel</h4>-->
    </div>
    
    <!-- Infos -->
    <div class="bg-white flex justify-between py-4 text-center text-gray-600">
        <div></div>
        <div>
            <h6>SALES</h6>
            <a href="">17980</a>
        </div>
        <div>
            <h6>Products</h6>
            <a href="">27</a>
        </div>
        <div>
            <h6>Followers</h6>
            <a href="">1360</a>
        </div>
        <div>
            <h6>739 Ratings</h6>
            <a>(4.9)
            @for ($i=0;$i<5;$i++)
                
            @endfor </a>
        </div>
        <div></div>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-12 gap-6 p-8">

        <div class="row-span-2 flex items-end flex-col">
            <div>
            @foreach ($likes as $liker)
                <div class="w-12 h-12 bg-blue-400 rounded"></div>
                <div class="divide-x w-1 h-32 ml-6 bg-gray-300"></div>
            @endforeach
        </div>
        </div>
        <div class="row-span-2 col-span-11 md:col-span-8">
            <h1 class="text-lg text-gray-800 font-bold">Notifications:</h1>
            @foreach ($likes as $liker)
                <div class="bg-white w-6/6 h-40 p-4 shadow-md mb-5 ">
                    <div class="flex justify-between">
                        <h3 class="font-bold text-gray-700 uppercase ">{{$liker}} has liked your post</h3>
                        <p class="text-gray-400">just now</p>
                    </div>
                    <p class="font-semibold pt-12">+ 290 Page Likes </p>
                    <p class="text-gray-600">This is great, keep it up! </p>
                </div>
            @endforeach
        </div>

        <!-- Products & Review Cards -->
        <div class="col-span-12 md:col-span-3">
            <div class="bg-white shadow-md h-auto mb-6">
                <div class="flex justify-between bg-gray-200 h-12 p-3">
                    <svg class="w-4 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <h3 class="flex-1 font-bold float-right uppercase text-gray-800 pl-2">Products </h3>
                    <svg class="w-4 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="p-4">
                    <div class="flex pb-4">
                        <div class="w-16 h-16 bg-blue-400 rounded-md"></div>
                        <div>
                            <h2 class="text-lg text-gray-800 font-bold pl-4">MyPanel</h2>
                            <p class="text-gray-600 text-md pl-4">Responsive App Template</p>
                        </div>
                    </div>
                    <div class="flex pb-4">
                        <div class="w-16 h-16 bg-purple-400 rounded-md"></div>
                        <div>
                            <h2 class="text-lg text-gray-800 font-bold pl-4">MyPanel</h2>
                            <p class="text-gray-600 text-md pl-4">Responsive App Template</p>
                        </div>
                    </div>
                    <div class="flex pb-4">
                        <div class="w-16 h-16 bg-red-400 rounded-md"></div>
                        <div>
                            <h2 class="text-lg text-gray-800 font-bold pl-4">MyPanel</h2>
                            <p class="text-gray-600 text-md pl-4">Responsive App Template</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white h-auto shadow-md">
                <div class="flex justify-between bg-gray-200 h-12 p-3">
                    
                    <h3 class="flex-1 font-bold float-right uppercase text-gray-800 pl-2">Ratings </h3>
                    <svg class="w-4 text-gray-500 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="p-4">
                    <div class="flex justify-between">
                        <div class="flex space-x-1">
                            <a href=""> Zaid Louelkadi </a>
                            <p class="text-gray-300 text-md"> (5/5)</p>
                        </div>
                        <a> @for ($i=0;$i<5;$i++)
                        
                        @endfor </a>
                    </div>
                    <p class="pt-2 text-md text-gray-600 font-bold ">Flawless design execution! I'm really impressed with the product, it really helped me build my app so fast! Thank you!</p>
                    <br>
                    <div class="flex justify-between">
                        <div class="flex space-x-1">
                            <a href=""> Mohamed Larbi Ramouz </a>
                            <p class="text-gray-300 text-md"> (4/5)</p>
                        </div>
                        <a> @for ($i=0;$i<4;$i++)
                            
                        @endfor</a>
                    </div>
                    <p class="pt-2 text-md text-gray-600 font-bold ">Great value for money and awesome support! Would buy again and again! Thanks!</p>
                    <br>
                    <div class="flex justify-between">
                        <div class="flex space-x-1">
                            <a href=""> Aymane Mir </a>
                            <p class="text-gray-300 text-md"> (3/5)</p>
                        </div>
                        <a> @for ($i=0;$i<3;$i++)
                            
                        @endfor </a>
                    </div>
                    <p class="pt-2 text-md text-gray-600 font-bold">Working great in all my devices, quality and quantity in a great package! Thank you!</p>
                </div>
            </div>
        </div>
    </div>

@endsection