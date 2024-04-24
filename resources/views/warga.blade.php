@extends('layouts.welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/ini.css') }}">
</head>
<body>
    
    <div class="container">

        <header>

            <div class="filterEntries">
                <div class="entries">
                    Show <select name="" id="table_size">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> entries
                </div>

                <div class="filter">
                    <label for="search">Search:</label>
                    <input type="search" name="" id="search" placeholder="Masukkan Nama">
                </div>
            </div>

            <div class="addMemberBtn">
                <button>Tambah Data Warga</button>
            </div>

        </header>


        <table>

            <thead>
                <tr class="heading">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>


            <tbody class="userInfo">
                <!-- <tr><td class="empty" colspan="11" align="center">No data available in table</td></tr> -->
            
            </tbody>

        </table>


        <footer>
            <span class="showEntries">Showing 1 to 10 of 50 entries</span>
            <div class="pagination">
                <button>Prev</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>Next</button>
            </div>
        </footer>
    </div>


    <!--Popup Form-->

    <div class="dark_bg">

        <div class="popup">
             <header>
                <h2 class="modalTitle">Form Tambah Data Warga</h2>
                <button class="closeBtn">&times;</button>
             </header>

             <div class="body">
                <form action="#" id="myForm">
                    <div class="imgholder">
                        <label for="uploadimg" class="upload">
                            <input type="file" name="" id="uploadimg" class="picture">
                            <i class="fa-solid fa-plus"></i>
                        </label>
                        <img src="{{ asset('img/pic1.png') }}" alt="" width="150" height="150" class="img">
                    </div>

                    <div class="inputFieldContainer">

                        <div class="nameField">
                            <div class="form_control">
                                <label for="fName">Nama Depan:</label>
                                <input type="text" name="" id="fName" required>
                            </div>

                            <div class="form_control">
                                <label for="lName">Nama Belakang:</label>
                                <input type="text" name="" id="lName" required>
                            </div>
                        </div>

                        <div class="ageCityField">
                            <div class="form_control">
                                <label for="age">NIK:</label>
                                <input type="number" name="" id="age" required>
                            </div>

                            <div class="form_control">
                                <label for="city">Jenis Kelamin:</label>
                                <input type="text" name="" id="city" required>
                            </div>
                        </div>

                        <div class="postSalary">
                            <div class="form_control">
                                <label for="position">Pekerjaan:</label>
                                <input type="text" name="" id="position" required>
                            </div>

                            <div class="form_control">
                                <label for="salary">Alamat:</label>
                                <input type="text" name="" id="salary" required>
                            </div>
                        </div>

                        <div class="form_control">
                            <label for="sDate">Tanggal Lahir:</label>
                            <input type="date" name="" id="sDate" required>
                        </div>

                        <div class="form_control">
                            <label for="email">Email:</label>
                            <input type="email" name="" id="email" required>
                        </div>

                        <div class="form_control">
                            <label for="phone">No. Telpon:</label>
                            <input type="number" name="" id="phone" required>
                        </div>
                    </div>
                </form>
             </div>

             <footer class="popupFooter">
                <button form="myForm" class="submitBtn">Submit</button>
             </footer>
        </div>

    </div>


    <script src="{{ asset('js/inii.js') }}"></script>
</body>
</html>
@endsection