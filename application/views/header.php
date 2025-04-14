<!DOCTYPE html>
<head>
    <title>TIKU</title>
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <!--setting web responsive-->
    <style>
        body{margin:0;/*batas*/}

        ul.navbar{/*unordered list dengan class navbar*/
            list-style-type:none;
            /*style simbol: tidak ada, biasanya kan titik*/
            margin: 0; /*batas*/
            padding: 0; /*ruang batas*/
            background-color : #f8f9fa;
            overflow: auto;
            /*apa yang harus terjadi jika konten meluap*/
            width: 100%; /*lebar*/
            height : auto; /*tinggi*/
            position : relative; /*posisi*/
        }

        ul.navbar li a{ /*a href*/
            display: block; /*tampilan*/
            color: #000; /*warna*/
            text-decoration: none;
            /*style simbol tidak ada, biasanya kan warna biru+underline*/
            float: left;
            /*bagaimana element mengambang/floating*/
            padding: 15px;/*ruang batas*/
        }

        ul.navbar li a.logo:hover{
            /*jika mouse di atas navbar class logo, tidak berubah warna*/
            background-color: #f8f9fa;
        }

        ul.navbar li a:hover{
            /*jika mouse di atas navbar, akan berubah warna*/
            background-color: #007bff;
            color: white;
        }

        div.content{
            padding: 1px 16px;
            margin: 0;
        }

        div.content td{
            padding-left: 50px;
            padding-right: 50px;
        }

        button.btn{
            background-color: #007bff;
            border: none;
            color:white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        @media screen and (max-width:400px){
            /*jika ukuran browser mengecil, maka posisi navbar akan berubah*/
            ul.navbar li a{
                text-align: center;
                float: none:
            }
        }
        /*kursi*/
        .txt-center{text-align: center;}
        input[type=checkbox]{
            width: 25px;
            margin: 20px;
            cursor: pointer;
        }
        input[type=checkbox]:before{
            content:"";
            width: 50px;
            height: 50px;
            border-radius: 5px;
            -webkit-border-radius :5px;
            -moz-border-radius: 5px;
            display: inline-block;
            text-align:center;
            border:3px solid #ff9800;
            background-color:#cfa8a8;
        }
        input[type=checkbox]:checked:before{background-color:Green;}
        input[type=checkbox]:disabled:before{background-color:Red;}to

        /*tombol*/

        button.btn.hapus{
            background-color: red;
        }
        button.btn.edit{
            background-color: green;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tiku_slider.css" media="screen">
    <!-- css untuk slider -->
</head>
<body>
    <ul class="navbar">
        <li>
            <a href = "#" class="logo" style="padding: 7px"><img src="<?php echo base_url();?>assets/images/tiku.png"</a>
        </li>
        <li>
            <a href = "<?php echo base_url();?>index.php">Home</a>
        </li>
        <li>
            <a href = "<?php echo base_url();?>index.php/WelcomeTIKU/tentang_kami">Tentang Kami</a>
        </li>
    </ul>