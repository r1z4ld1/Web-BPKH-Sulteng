<aside class="w-72 h-screen bg-white border-r border-gray-200 fixed left-0 top-0 z-50">


    <!-- LOGO -->

    <div class="h-24 flex items-center px-6 border-b">


        <img src="{{ asset('images/logo/logo-kemenhut.png') }}" alt="Logo Kemenhut"
            class="w-16 h-16 object-contain mr-3">


        <div>


            <h1 class="text-lg font-bold text-[#2F5D45]">
                BPKH Wilayah XVI
            </h1>


            <p class="text-xs text-gray-500">
                Dashboard Pegawai
            </p>


        </div>


    </div>





    <!-- MENU -->

    <nav class="p-4 space-y-2 overflow-y-auto h-[calc(100vh-96px)]">





        <!-- Dashboard -->


        <a href="{{ route('pegawai.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg
        hover:bg-gray-100 transition">


            <span>
                🏠
            </span>


            <span class="text-sm font-medium">

                Dashboard

            </span>


        </a>






        <!-- Kelola Profil -->


        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg
        hover:bg-gray-100 transition">


            <span>
                👤
            </span>


            <span class="text-sm font-medium">

                Kelola Profil

            </span>


        </a>







        <!-- Cuti -->


        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg
        hover:bg-gray-100 transition">


            <span>
                📝
            </span>


            <span class="text-sm font-medium">

                Ajukan Cuti/Izin

            </span>


        </a>






        <!-- Absensi -->


        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg
        hover:bg-gray-100 transition">


            <span>
                📅
            </span>


            <span class="text-sm font-medium">

                Absensi

            </span>


        </a>









        <!-- ========================= -->
        <!-- AGENDA KANTOR -->
        <!-- ========================= -->


        <div x-data="{ open:false }">


            <button @click="open=!open" class="w-full flex items-center justify-between 
            px-4 py-3 rounded-lg
            hover:bg-gray-100 transition">


                <div class="flex items-center gap-3">


                    <span>
                        📂
                    </span>


                    <span class="text-sm font-medium">

                        Agenda Kantor

                    </span>


                </div>





                <span class="transition-transform duration-300" :class="open ? 'rotate-180' : ''">

                    ▾

                </span>



            </button>






            <div x-show="open" x-collapse class="ml-8 mt-2 space-y-3 text-sm overflow-hidden">



                <a href="#" class="block hover:text-[#2F5D45] transition">


                    Rencana Strategis BPKH XVI Palu Tahun 2025-2029


                </a>




                <a href="#" class="block hover:text-[#2F5D45] transition">


                    Rencana Kerja BPKH XVI Palu Tahun 2025


                </a>





                <a href="#" class="block hover:text-[#2F5D45] transition">


                    Perjanjian Kinerja


                </a>





                <a href="#" class="block hover:text-[#2F5D45] transition">


                    Pohon Kinerja


                </a>



            </div>


        </div>









        <!-- Dokumen Internal -->


        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg
        hover:bg-gray-100 transition">


            <span>
                📄
            </span>


            <span class="text-sm font-medium">

                Dokumen Internal

            </span>


        </a>









        <!-- ========================= -->
        <!-- ANGGOTA SEKSI -->
        <!-- ========================= -->


        <div x-data="{ open:false }">


            <button @click="open=!open" class="w-full flex items-center justify-between
            px-4 py-3 rounded-lg
            hover:bg-gray-100 transition">



                <div class="flex items-center gap-3">


                    <span>
                        👥
                    </span>



                    <span class="text-sm font-medium">

                        Anggota Seksi

                    </span>



                </div>





                <span class="transition-transform duration-300" :class="open ? 'rotate-180' : ''">


                    ▾


                </span>



            </button>








            <div x-show="open" x-collapse class="ml-8 mt-2 space-y-3 text-sm overflow-hidden">





                @foreach([
                        'Bagian TU',
                        'Sekretariat',
                        'Arsip',
                        'Keuangan',
                        'SDHH',
                        'PKH',
                        'Fungsional PEH',
                        'Ruangan Staff',
                        'Kepala SDH',
                        'Kepala PHK'
                    ] as $item)


                        <a href="#"
                        class="block hover:text-[#2F5D45] transition">


                            {{ $item }}


                        </a>


                @endforeach






            </div>



        </div>







        <!-- LOGOUT -->


        <div class="pt-4">


            <a href="#"

            class="flex items-center gap-3 px-4 py-3 rounded-lg
            text-red-600 hover:bg-red-50 transition">


                <span>
                    🚪
                </span>



                <span class="text-sm font-medium">

                    Logout

                </span>



            </a>


        </div>





    </nav>


</aside>