<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <title>Document</title>
</head>

<body>
    <?php
    $total = 0;
    foreach ($company_info as $company_infos) {
        $total++;
    }

    if (isset($_GET['community_select'])) {
        $community_seleted = $_GET['community_select'];
    } else {
        $community_seleted = null;
    }
    if (isset($_GET['company_name'])) {
        $company_name = $_GET['company_name'];
    } else {
        $company_name = null;
    }
    if (isset($_GET['company_email'])) {
        $company_email = $_GET['company_email'];
    } else {
        $company_email = null;
    }
    if (isset($_GET['company_name_bangla'])) {
        $company_name_bangla = $_GET['company_name_bangla'];
    } else {
        $company_name_bangla = null;
    }
    if (isset($_GET['company_mobile_no'])) {
        $company_mobile_no = $_GET['company_mobile_no'];
    } else {
        $company_mobile_no = null;
    }
    if (isset($_GET['from_date'])) {
        $from_date = $_GET['from_date'];
    } else {
        $from_date = null;
    }
    if (isset($_GET['to_date'])) {
        $to_date = $_GET['to_date'];
    } else {
        $to_date = null;
    }

    ?>
    <div class="container py-5">
        <div class="row">

            <div class="col-12">
                <form action="{{ route('community.member') }}" id="community_select_form" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="company_name" placeholder="কোম্পানি নাম"
                                value="{{ $company_name }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="company_email" placeholder="কোম্পানি ইমেইল"
                                value="{{ $company_email }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="company_name_bangla"
                                placeholder="কোম্পানি নাম বাংলা" value="{{ $company_name_bangla }}">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="company_mobile_no"
                                placeholder="কোম্পানি মোবাইল / ফোন" value="{{ $company_mobile_no }}">
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1" class="form-label">কমিউনিটি সদস্য</label>
                            <select class="form-select" aria-label="Default select example" id="community_member_check"
                                name="community_select">
                                <option selected value="0">select All</option>
                                @foreach ($community_member as $community_members)
                                    <?php
                                    if ($community_seleted == $community_members->community_member) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = null;
                                    }

                                    ?>
                                    <option value="{{ $community_members->community_member }}" {{ $selected }}>
                                        {{ $community_members->community_member }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1" class="form-label">তারিখ থেকে</label>
                             <input type="text" class="form-control" id="datepicker" name="from_date" value="{{ $from_date }}">
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1" class="form-label">তারিখ পর্যন্ত</label>
                             <input type="text" class="form-control" id="datepicker1" name="to_date" value="{{ $to_date }}">
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1" class="form-label">অনুসন্ধান</label>
                            <input type="submit" class="form-control btn btn-success">
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="show-data">
            <style type="text/css">
                @font-face {
                    font-family: 'Kalpurush';
                    src: url('Kalpurush.ttf') format('truetype');
                    font-weight: normal;
                    font-style: normal;
                }

                .tg {
                    border-collapse: collapse;
                    border-spacing: 0;
                }

                .tg td {
                    border-color: black;
                    border-style: solid;
                    border-width: 1px;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    overflow: hidden;
                    padding: 8px 3px;
                    word-break: normal;
                }

                .tg th {
                    border-color: black;
                    border-style: solid;
                    border-width: 1px;
                    font-family: 'Kalpurush', Arial, sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    overflow: hidden;
                    padding: 8px 3px;
                    word-break: normal;
                    font-weight: bold;
                }

                .tg .tg-njw1 {
                    background-color: #68cbd0;
                    border-color: #c0c0c0;
                    text-align: left;
                    vertical-align: top
                }

                .tg .tg-wo29 {
                    border-color: #c0c0c0;
                    text-align: left;
                    vertical-align: top
                }
            </style>
            @if ($total == 0)


                <h1 class="bg-success text-center py-5">কোন তথ্য পাওয়া যায় নাই </h1>
            @else
                <table class="tg">
                    <thead>
                        <tr>
                            <th class="tg-njw1 text-center">ক্রম</th>
                            <th class="tg-njw1 text-center">কমিউনিটি সদস্য</th>
                            <th class="tg-njw1 text-center">কোম্পানি নাম </th>
                            <th class="tg-njw1 text-center">কোম্পানি ঠিকানা</th>
                            <th class="tg-njw1 text-center">কোম্পানি মোবাইল</th>
                            <th class="tg-njw1 text-center">কোম্পানি ইমেইল</th>
                            <th class="tg-njw1 text-center">কোম্পানি উবি আই ডি</th>
                            <th class="tg-njw1 text-center">পদক্ষেপ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($company_info as $company_infos)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $company_infos->community_member }}</td>
                                <td>{{ $company_infos->company_name_bangla }}</td>
                                <td>{{ $company_infos->company_address }}</td>
                                <td>{{ $company_infos->company_mobile_no }}</td>
                                <td>{{ $company_infos->company_email }}</td>
                                <td>{{ $company_infos->ubid }}</td>
                                <td><a class="text-decoration-none"
                                        href="{{ route('user.single', [
                                            'id' => $company_infos->id,
                                        ]) }}">বিস্তারিত</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            @endif

            <div class="d-flex justify-content-center pt-5">
                {{ $company_info->appends(request()->input())->links() }}
            </div>
        </div>

    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <script>
        // $('#community_member_check').on('change', function() {
        //     $('#community_select_form').submit();
        // })
        $( "#datepicker" ).datepicker();
        $("#datepicker1").datepicker();
    </script>

</body>

</html>
