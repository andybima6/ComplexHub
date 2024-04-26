@extends('layouts.welcome')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk seluruh halaman */
    }
    
    .dash-content .boxes {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    
    .dash-content .boxes .box {
      display: flex;
      flex-direction: column;
      align-items: flex-start; /* Mengubah posisi teks menjadi sebelah kiri */
      border-radius: 12px;
      width: calc(100% / 3 - 15px);
      padding: 15px 20px;
      height: 200px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Added shadow effect */
      transition: all 0.2s ease-in-out; /* Added transition for hover effect */
    }
    
    .dash-content .boxes .box:hover {
      transform: scale(1.02); /* Added hover effect for slight scale up */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
    }
    
    .dash-content .boxes .box .text {
      white-space: nowrap;
      font-size: 20px;
      font-weight: 500;
      color: white;
      text-align: left; /* Mengubah posisi teks menjadi sebelah kiri */
      margin-top: 10px; /* Memberikan jarak atas untuk teks */
    }
    
    .dash-content .boxes .box .number {
      font-size: 50px;
      font-weight: 500;
      color: white;
      text-align: center; /* Menyamakan posisi teks ke tengah */
      margin-top: 10px; /* Memberikan jarak atas untuk teks */
    }
    
    .boxes .box i {
      font-size: 35px;
      color: var(--text-color);
    }
    
    .boxes .box .text {
      white-space: nowrap;
      font-size: 18px;
      font-weight: 500;
      color: var(--text-color);
    }
    
    .boxes .box .number {
      font-size: 40px;
      font-weight: 500;
      color: var(--text-color);
    }
    
    .boxes .box.box2 {
      background-color: var(--box2-color);
    }
    
    .boxes .box.box3 {
      background-color: var(--box3-color);
    }
    
    .dash-content .activity .activity-data {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }
    
    .dash-content .boxes .box.box1 {
      background-color: #659DBD;
    }
    
    .dash-content .boxes .box.box2 {
      background-color: #659DBD;
    }
    
    .dash-content .boxes .box.box3 {
      background-color: #65DFA4;
    }
    
  .box4 {
  background-color: #65A2DF;
}

.box4 .button {
  padding: 10px 20px;
  border: none;
  background-color: transparent;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

.box4 .button:hover {
  background-color: rgba(255, 255, 255, 0.1);
}
    </style>
<main>
    <div style="height: 100px;"></div>
    <div class="kotakMenu" style="padding: 20px;">
        <div class="dash-content">
            <div class="overview">
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">RT : </span>
                        <span class="number">05</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Periode : </span>
                        <span class="number">08/2024</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total : </span>
                        <span class="number">Rp. 500000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box4">
        <button class="button">Cek Data</button>
    </div>
    
</main>
