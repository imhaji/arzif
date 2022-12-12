<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src='main.js'></script>
</head>

<body class="d-flex justify-content-center align-content-center mt-1">
    <section class="app">
        <h1 class="fs-6 text-center mt-2">ارزیف واچ</h1>
        @if (!$data)


            <div class="text-center null-item">
                <img src="{{ asset('assets/img/wallet-3.png') }}">
                <h6>.هنوز آدرس ولتی اضافه نکرده اید</h6>
            </div>
        @else
            @foreach ($data as $data_coin)
                <div class="bg-white rounded mx-2 mt-5 p-3">
                    <h6 style="font-size: 14px" class="text-center">{{ $data_coin['wallet'] }}</h6>
                    <div class="d-flex justify-content-between mt-3">
                        <span>{{ $data_coin['balance'] }}$</span>
                        <span class="border rounded p-1"> {{ $data_coin['network'] }}</span>
                    </div>
                    <div class="row mt-2" dir="ltr">
                        <!-- itme -->
                        <div class="mt-2 d-flex justify-content-between align-items-center">

                            @switch($data_coin['network'])
                                @case('BEP2')
                                    <div class="d-flex">

                                        <div class="ms-1">
                                            @foreach (collect($data_coin['coins'])->take(10) as $coin)
                                                <span class="d-block" style="font-size: 12px;">{{ $coin['symbol'] }}</span>
                                                <span class="d-block" style="font-size: 10px;">{{ $coin['free'] }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @break

                                @case('BEP20')
                                    <div class="d-flex">
                                        <div class="ms-1">
                                            <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                            <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                        </div>
                                    </div>
                                @break

                                @case('TRC20')
                                    <div class="d-flex">
                                        <div class="ms-1">
                                            @foreach (collect($data_coin['coins'])->take(10) as $coin)
                                                <div>
                                                    <img style="width: 10px" src="{{ $coin['tokenLogo'] }}">
                                                </div>
                                                <span class="d-block" style="font-size: 12px;">{{ $coin['tokenName'] }}</span>
                                                <span class="d-block" style="font-size: 10px;">{{ $coin['balance'] }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @break
                                @case('DOGE')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('ERC20')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('XRP')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('BTC')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('BCH')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('LTC')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break
                                @case('DASH')
                                <div class="d-flex">
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">{{ $data_coin['coin'] }}</span>
                                        <span class="d-block" style="font-size: 10px;">{{ $data_coin['balance'] }}</span>
                                    </div>
                                </div>
                                @break

                                @default
                            @endswitch


                            <div id="Item" class="border-0 bg-white position-relative">
                                <img src="{{ asset('assets/img/more.png') }}">
                                <div id="Operation">
                                    <a class="d-block">ویرایش</a>
                                    <form action="{{ route('wallets.destroy',['wallet'=>$data_coin['id']]) }}" method="Post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    <button href="" class="d-block text-danger">حذف</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                    </div>
                </div>
            @endforeach
        @endif
        <a data-bs-toggle="modal" href="#exampleModalToggle" class="add-item"><img
                src="{{ asset('assets/img/add.png') }}"></a>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('wallets.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="disabledTextInput" class="form-label">آدرس ولت</label>
                                <input type="text" name="wallet" id="disabledTextInput" class="form-control">
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">شبکه انتقال</label>
                                    <select name="network" id="disabledSelect" class="form-select">
                                        <option value="BEP2">BEP2</option>
                                        <option value="BEP20">BEP20</option>
                                        <option value="TRC20">TRC20</option>
                                        <option value="DOGE">DOGE</option>
                                        <option value="ERC20">ERC20</option>
                                        <option value="XRP">XRP</option>
                                        <option value="BTC">BTC</option>
                                        <option value="BCH">BCH</option>
                                        <option value="LTC">LTC</option>
                                        <option value="DASH">DASH</option>

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="submit-button">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
