@extends('layouts.pegawai')

@section('title', 'Dashboard Pegawai')

@section('page-title', 'Dashboard Pegawai')


@section('content')


    <div class="space-y-8">


        <!-- Welcome Card -->
        <div class="bg-[#2F5D45] rounded-2xl p-8 text-white shadow-lg">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold">
                        Selamat Datang, Pegawai BPKH Wilayah XVI
                    </h1>


                    <p class="mt-3 text-green-100">
                        Sistem Informasi Pegawai BPKH Wilayah XVI Palu
                    </p>


                </div>


                <div class="hidden md:block">

                    <div class="w-24 h-24 rounded-full bg-[#6E9B76]
                    flex items-center justify-center">

                        <span class="text-5xl">
                            👤
                        </span>

                    </div>

                </div>


            </div>


        </div>






        <!-- Statistik -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">


            <!-- Absensi -->

            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-[#2F5D45]">


                <div class="flex justify-between">

                    <div>

                        <p class="text-sm text-gray-500">
                            Total Absensi
                        </p>


                        <h2 class="text-3xl font-bold text-[#16241C] mt-2">
                            120
                        </h2>

                    </div>


                    <div class="w-12 h-12 rounded-lg bg-[#2F5D45]
                    text-white flex items-center justify-center">

                        📅

                    </div>


                </div>


            </div>






            <!-- Cuti -->

            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-[#6E9B76]">


                <div class="flex justify-between">

                    <div>

                        <p class="text-sm text-gray-500">
                            Pengajuan Cuti
                        </p>


                        <h2 class="text-3xl font-bold text-[#16241C] mt-2">
                            3
                        </h2>

                    </div>


                    <div class="w-12 h-12 rounded-lg bg-[#6E9B76]
                    text-white flex items-center justify-center">

                        📝

                    </div>


                </div>


            </div>






            <!-- Agenda -->

            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-[#C89B3C]">


                <div class="flex justify-between">

                    <div>

                        <p class="text-sm text-gray-500">
                            Agenda Kantor
                        </p>


                        <h2 class="text-3xl font-bold text-[#16241C] mt-2">
                            8
                        </h2>

                    </div>


                    <div class="w-12 h-12 rounded-lg bg-[#C89B3C]
                    text-white flex items-center justify-center">

                        📌

                    </div>


                </div>


            </div>






            <!-- Dokumen -->

            <div class="bg-white rounded-xl p-6 shadow-sm border-l-4 border-[#8B5E34]">


                <div class="flex justify-between">

                    <div>

                        <p class="text-sm text-gray-500">
                            Dokumen Internal
                        </p>


                        <h2 class="text-3xl font-bold text-[#16241C] mt-2">
                            15
                        </h2>

                    </div>


                    <div class="w-12 h-12 rounded-lg bg-[#8B5E34]
                    text-white flex items-center justify-center">

                        📁

                    </div>


                </div>


            </div>


        </div>







        <!-- Content bawah -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">



            <!-- Agenda -->

            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">


                <div class="flex justify-between items-center mb-5">


                    <h3 class="text-lg font-bold text-[#16241C]">
                        Agenda Terbaru
                    </h3>


                    <button class="text-sm px-4 py-2 rounded-lg
                    bg-[#C89B3C] text-white hover:bg-[#b58b32]">

                        Lihat Semua

                    </button>


                </div>



                <div class="space-y-4">


                    <div class="p-4 rounded-lg bg-[#F5F3EC]">

                        <h4 class="font-semibold text-[#2F5D45]">
                            Rapat Evaluasi Program Kerja
                        </h4>

                        <p class="text-sm text-gray-600 mt-1">
                            Senin, 20 Januari 2025
                        </p>

                    </div>




                    <div class="p-4 rounded-lg bg-[#F5F3EC]">

                        <h4 class="font-semibold text-[#2F5D45]">
                            Monitoring Kegiatan Lapangan
                        </h4>

                        <p class="text-sm text-gray-600 mt-1">
                            Kamis, 23 Januari 2025
                        </p>

                    </div>



                </div>


            </div>








            <!-- Profil Pegawai -->

            <div class="bg-[#16241C] rounded-xl p-6 text-white">


                <h3 class="text-lg font-bold mb-5">
                    Profil Pegawai
                </h3>


                <div class="space-y-3 text-sm">


                    <p>
                        Nama :
                        <span class="text-green-200">
                            Nama Pegawai
                        </span>
                    </p>


                    <p>
                        Jabatan :
                        <span class="text-green-200">
                            Staff BPKH XVI
                        </span>
                    </p>


                    <p>
                        Unit :
                        <span class="text-green-200">
                            Seksi Teknis
                        </span>
                    </p>


                </div>



                <button class="mt-6 w-full py-3 rounded-lg
                bg-[#C89B3C] hover:bg-[#b58b32]">

                    Kelola Profil

                </button>


            </div>



        </div>





    </div>


@endsection