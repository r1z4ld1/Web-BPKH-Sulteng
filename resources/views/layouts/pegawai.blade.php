<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title')
    </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>


<body class="overflow-x-hidden">


    <div class="flex min-h-screen overflow-x-hidden">


        <!-- Sidebar -->

        @include('components.pegawai-sidebar')




        <!-- Content -->

        <main class="ml-72 flex-1 min-h-screen bg-gray-50 overflow-x-hidden">


            <!-- Header -->

            <header class="h-20 bg-white border-b flex items-center justify-between px-8">


                <div>

                    <h2 class="text-xl font-semibold text-[#16241C]">

                        @yield('page-title')

                    </h2>


                </div>




                <div class="flex items-center gap-3">


                    <div class="text-right">


                        <p class="text-sm font-semibold">

                            Nama Pegawai

                        </p>


                        <p class="text-xs text-gray-500">

                            Pegawai BPKH XVI

                        </p>


                    </div>




                    <div class="w-10 h-10 rounded-full 
                bg-[#2F5D45]
                flex items-center justify-center 
                text-white font-semibold">


                        NP


                    </div>



                </div>



            </header>






            <!-- Isi Halaman -->

            <section class="p-8">

                @yield('content')

            </section>



        </main>


    </div>


</body>

</html>