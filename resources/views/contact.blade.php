<x-app-layout>
    <x-slot name="style">
        {{-- <link rel="stylesheet" href="{{ asset('css/contact.css') }}"> --}}
    </x-slot>
    {{--------------------- 
            $slot 
        --------------------}}
        <title>Liên Hệ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .contact-info img {
            width: 500px;
            height: 180px;
            margin-right: 20px;
        }

        .store-image {
            float: right;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

        <h1>Liên Hệ</h1>
        
        <div class="contact-info">
            
            <div>
                <p style="font-weight: bold">HIGHPICKS SPORT</p>
                <p>Địa chỉ: 122 đường Hữu Nghị, thôn Thạch, Thạch Xá, Thạch Thất, Hà Nội</p>
                <p>Điện thoại: 0966076520</p>
                <p>Email: dong2000tx@gmail.com</p>
                <p>Facebook: <a href="https://www.facebook.com/garaphukien68" style="color: red">HighPicks Sport</a></p>
            </div>
            <img src="img/RMBG.png" alt="Store Image" class="store-image">
            
        </div>
        
    </div>
   
    {{--------------------- 
        $slot 
    --------------------}}
</x-app-layout>