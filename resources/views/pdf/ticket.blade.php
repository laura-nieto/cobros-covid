<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin: 0;
        }
        .w-100{
            width:100%;
        }

    </style>
</head>
<body>
    <div style="padding-top:20px;width:80%;margin:0 auto">
        <header>
            <table class="w-100">
                <tbody class="w-100">
                    <tr class="w-100">
                        <td style="width:30%">
                            <img src="{{public_path('/img/logo/SAIH-logo.png')}}" alt="" width="100" style="margin:10px 20px">
                        </td>
                        <td align="right" style="width:70%">
                            <h2>Empresa</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>
        <main style="padding-top:50px;">
            <section>
                <table class="w-100">
                    <tbody class="w-100">
                        <tr class="w-100">
                            <td style="width:33%">
                                <p>Día: <strong>{{$dia}}</strong></p>
                            </td>
                            <td style="width:33%">
                                <p>Hora: <strong>{{$hora}}hs. </strong></p>
                            </td>
                            <td style="width:33%">
                                <p>Sucursal: <strong>{{$sucursal->nombre}}</strong></p>
                                <p>Dirección: <strong>{{$sucursal->direccion}}</strong></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section style="margin-top:60px;display:flex;">
                <table class="w-100">
                    <tbody class="w-100">
                        <tr class="w-100">
                            <td align="center">
                                <img src="data:image/png;base64,{{$qr}}">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>