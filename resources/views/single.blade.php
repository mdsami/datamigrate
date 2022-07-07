<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    $ubid_business_category = $company_info->ubid_business_category;
    $ubid_business_type = $company_info->ubid_business_type;
    //var_dump($ubid_business_category);
    switch ($ubid_business_category) {
        case '1':
            $ubid_business_category_bn='খুচড়া বিক্রেতা';
            $ubid_business_category_en='Retailer';
            break;
        case '2':
        $ubid_business_category_bn='পাইকারী বিক্রেতা';
            $ubid_business_category_en='Wholesalers';
            break;
        case '3':
            $ubid_business_category_bn='রাইড শেয়ারিং';
            $ubid_business_category_en='Ride sharing';
            break;
        case '4':
            $ubid_business_category_bn='ফুড এগ্রিগেটর';
            $ubid_business_category_en='Food aggregator';
            break;
        case '5':
            $ubid_business_category_bn='অন্যান্য';
            $ubid_business_category_en='Others';
            break;
        case '6':
            $ubid_business_category_bn='আইটি ব্যবসা';
            $ubid_business_category_en='IT Business';
            break;
        default:
            $ubid_business_category_bn='অন্যান্য';
            $ubid_business_category_en='Others';
            break;
    }
    switch ($ubid_business_type) {
           case '1':
           $ubid_business_type_bn='একক/ব্যক্তি মালিকানা প্রতিষ্ঠান';
            $ubid_business_type_en='Sole Proprietorship';
            break;
            case '2':
            $ubid_business_type_bn='অংশীদারি কারবার';
            $ubid_business_type_en='Partnership Business';
            break;
            case '3':
            $ubid_business_type_bn='যৌথ মুলধন কোম্পানি';
            $ubid_business_type_en='Joint Venture Company';
            break;
            case '9':
            $ubid_business_type_bn='পাবলিক লিমিটেড কোম্পানি';
            $ubid_business_type_en='Public Company';
            break;
            case '12':
            $ubid_business_type_bn='প্রাইভেট লিমিটেড কোম্পানি';
            $ubid_business_type_en='Private Company';
            break;
            case '15':
            $ubid_business_type_bn='বিদেশী কোম্পানি (লিয়াজোঁ অফিস)';
            $ubid_business_type_en='Foreign Company (Liaison Office)';
            break;
            case '18':
            $ubid_business_type_bn='এক ব্যাক্তি কোম্পানি';
            $ubid_business_type_en='One Person Company';
            break;
            case '21':
            $ubid_business_type_bn='কোম্পানি (২৮ ধারা)';
            $ubid_business_type_en='Company Under Section 28';
            break;
            case '24':
            $ubid_business_type_bn='কোম্পানি (২৯ ধারা)';
            $ubid_business_type_en='Company Under Section 29';
            break;
            case '27':
            $ubid_business_type_bn='বাণিজ্য সংগঠন';
            $ubid_business_type_en='Trade Organization';
            break;
            case '30':
            $ubid_business_type_bn='সোসাইটি';
            $ubid_business_type_en='সোসাইটি';
            break;
        default:
            $ubid_business_type_bn='অন্যান্য';
            $ubid_business_type_en='Others';
            break;
    }
    ?>
    <div class="container py-5">
        <table class="table table-success table-striped">
            <tr>
                <td>কমিউনিটি সদস্য</td>
                <td>{{ $company_info->community_member }}</td>
            </tr>
            <tr>
                <td>কমিউনিটি সদস্য ক্রম</td>
                <td>{{ $company_info->community_member_number }}</td>
            </tr>
            <tr>
                <td>কোম্পানি নাম বাংলা</td>
                <td>{{ $company_info->company_name_bangla }}</td>
            </tr>
            <tr>
                <td>কোম্পানি নাম ইংরেজি</td>
                <td>{{ $company_info->company_name }}</td>
            </tr>
            <tr>
                <td>ব্যবসা ওয়েব সাইট</td>
                <td>{{ $company_info->business_web_url }}</td>
            </tr>
            <tr>
                <td>ফেসবুক লিঙ্ক</td>
                <td>{{ $company_info->facebook_url }}</td>
            </tr>
            <tr>
                <td>কোম্পানি ঠিকানা বাংলা</td>
                <td>{{ $company_info->company_address_bangla }}</td>
            </tr>
            <tr>
                <td>কোম্পানি ঠিকানা ইংরেজি</td>
                <td>{{ $company_info->company_address }}</td>
            </tr>
            <tr>
                <td>কোম্পানি স্থাপিত</td>
                <td>{{ $company_info->company_year }}</td>
            </tr>
            <tr>
                <td>কোম্পানি ইমেইল</td>
                <td>{{ $company_info->company_email }}</td>
            </tr>
            <tr>
                <td>কোম্পানি মোবাইল</td>
                <td>{{ $company_info->company_mobile_no }}</td>
            </tr>
            <tr>
                <td>কোম্পানি ল্যান্ড ফোন</td>
                <td>{{ $company_info->company_phone_no }}</td>
            </tr>
            <tr>
                <td>উবি আই ডি ব্যবসা বিভাগ(categoty)</td>
                <td>{{ $ubid_business_category_bn }}</td>
            </tr>
            <tr>
                <td>উবি আই ডি ব্যবসা বিভাগ(categoty) ইংরেজি</td>
                <td>{{ $ubid_business_category_en }}</td>
            </tr>
            <tr>
                <td>উবি আই ডি ব্যবসা প্রকার(type) </td>
                <td>{{ $ubid_business_type_bn }}</td>
            </tr>
            <tr>
                <td>উবি আই ডি ব্যবসা প্রকার(type) ইংরেজি</td>
                <td>{{ $ubid_business_type_en }}</td>
            </tr>
            <tr>
                <td>মালিক নাম</td>
                <td>{{ $company_owner_infos->owner_name }}</td>
            </tr>
            <tr>
                <td>মালিক পদবি</td>
                <td>{{ $company_owner_infos->owner_designation_id }}</td>
            </tr>
            <tr>
                <td>মালিক জাতীয় পরিচয়পত্র</td>
                <td>{{ $company_owner_infos->owner_nid }}</td>
            </tr>
            <tr>
                <td>মালিকের ইমেইল</td>
                <td>{{ $company_owner_infos->owner_email }}</td>
            </tr>
            <tr>
                <td>মালিকের ল্যান্ড ফোন/মোবাইল</td>
                <td>{{ $company_owner_infos->owner_phone }}</td>
            </tr>
            <tr>
                <td>আবেদনকারী নাম</td>
                <td>{{ $company_applicant->applicant_name }}</td>
            </tr>
            <tr>
                <td>আবেদনকারী পদবী</td>
                <td>{{ $company_applicant->applicant_designation_id }}</td>
            </tr>
            <tr>
                <td>আবেদনকারী ল্যান্ড ফোন/মোবাইল</td>
                <td>{{ $company_applicant->applicant_phone }}</td>
            </tr>
            <tr>
                <td>আবেদনকারী ঠিকানা</td>
                <td>{{ $company_applicant->applicant_address }}</td>
            </tr>
        </table>


      <p class="text-center py-5">Others field</p>

      <table class="table table-success table-striped">
       @foreach ( json_decode($company_info->others,true) as $key=>$value)
       <tr>
        <td>{{ ucwords($key) }}</td>
        <td>{{ $value }}</td>
       </tr>
       @endforeach
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
