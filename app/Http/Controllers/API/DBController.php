<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DBController extends Controller
{
    public function index()
    {


        //$dbid=DB::connection('mysql5')->table('ecabs')->get();
        // $dbid=DB::table('business_profiles')
        //         ->leftjoin('ubid_infos', 'ubid_infos.business_profile_id', '=', 'business_profiles.id')
        //         ->leftjoin('business_types', 'business_types.id', '=', 'ubid_infos.business_type_id')
        //         ->leftjoin('business_categories', 'business_categories.id', '=', 'ubid_infos.business_category_id')
        //         ->select('business_profiles.*', 'ubid_infos.ubid', 'ubid_infos.n_doptor_user_id', 'ubid_infos.business_year','business_types.name_bng as type_name_bn','business_types.name_eng as type_name_en','business_categories.name_bng as category_name_bn','business_categories.name_eng as category_name_en')
        //         ->get();
        $dbid=DB::table('business_profiles')
                ->leftjoin('ubid_infos', 'ubid_infos.business_profile_id', '=', 'business_profiles.id')
                ->select('business_profiles.*', 'ubid_infos.*')
                ->get();

        $count=DB::table('business_profiles')->count();
        $response_decoded=json_decode($dbid,true);
        
        $data=$dbid;


        
 
        // dd("ok");



            if($data=='null'){
                return response()->json([
                    'status'=>false,
                    'data'=>'No information found!'
                ]);
                
            }
            else{
                return response()->json([
                    'status'=>true,
                    'code'=> 200,
                    'count'=> $count,
                    'message'=> "All Business Lists",
                    'data'=>$dbid
                ]);
            }
  
                
        
    }

    public function ubid()
    {


        //$dbid=DB::connection('mysql5')->table('ecabs')->get();
        $ubid=DB::table('companyinfo')->get();

        $count=DB::table('companyinfo')->count();


        $data=$ubid;




            if($data=='null'){
                return response()->json([
                    'status'=>false,
                    'data'=>'No information found!'
                ]);
                
            }
            else{
                return response()->json([
                    'status'=>true,
                    'code'=> 200,
                    'count'=> $count,
                    'message'=> "All Business Lists",
                    'data'=>$ubid
                ]);
            }
  
                
        
    }


    public function dbid_import_data()
    {


        $dbid=DB::table('business_profiles')
                ->leftjoin('ubid_infos', 'ubid_infos.business_profile_id', '=', 'business_profiles.id')
                ->select('business_profiles.*', 'ubid_infos.*')
                ->get();

        $count=DB::table('business_profiles')->count();
        $response_decoded=json_decode($dbid,true);
        
        $data=$dbid;
        $companyinfo=array();
        $company_applicant=array();
        $company_owner_infos=array();
        $company_attachments=array();


        
        foreach($response_decoded as $read){

            $member_id= DB::table('companyinfo')->where('citizen_id', $read["business_profile_id"])->first();
            
            if(empty($member_id)){
                $number = rand(100,10000);
                $t=time();
                $tracking_no = $number.''.substr($t,3);   
        
                // companyinfo Table: companyinfo Insert
                $companyinfo['citizen_id'] = $read["business_profile_id"]??'';
                $companyinfo['community_member_radio_check'] = 'না';
                $companyinfo['community_member'] = '';
                $companyinfo['community_member_number'] = '';
                $companyinfo['company_name_bangla'] = $read["company_name_bangle"]??'';
                $companyinfo['company_name'] = $read["company_name"]??'';
                $companyinfo['business_web_url'] = $read["company_web_address"]??'';
                $companyinfo['facebook_url'] = $read["facebook_url"]??'';
                $companyinfo['company_address_bangla'] = '';
                $companyinfo['company_address'] = $read["company_address"]??'';
                $companyinfo['company_phone_no'] = $read["company_phone_no"]??'';
                $companyinfo['company_mobile_no'] = $read["company_mobile_no"]??'';
                $companyinfo['company_email'] = $read["company_email"]??'';
                $companyinfo['company_year'] = $read['business_year']??'';
                $companyinfo['ubid_business_category'] = $read["business_category_id"]??'';
                $companyinfo['ubid_business_type'] = $read["business_type_id"]??'';
                $companyinfo['company_trade_license'] = $read["trade_license_no"]??'';
                $companyinfo['company_bin'] = '';
                $companyinfo['company_tin'] = '';
                $companyinfo['ubid'] = $read["ubid"]??'';
                $companyinfo['n_doptor_user_id'] = $read["n_doptor_user_id"]??NULL;
                $companyinfo['tracking_no'] = $tracking_no;
                $companyinfo['application_id'] = $application_id;
                $companyinfo['status'] = 4;
                $companyinfo['created_at'] = $read["created_at"]??'';
                $companyinfo['updated_at'] = $read["updated_at"]??'';
                $companyinfo['issue_date'] = $read["issue_date"]??'';

                $application_create = DB::table('companyinfo')->insert($companyinfo);

                // Applicant Table: Applicant Insert
                $company_applicant['company_info_id'] = $read["business_profile_id"]??'';
                $company_applicant['application_id'] = $application_id;
                $company_applicant['citizen_image'] = $read["applier_img"]??'';
                $company_applicant['applicant_name'] = $read["applier_name"]??'';
                $company_applicant['applicant_phone'] = $read["applier_mobile_no"]??'';
                $company_applicant['applicant_email'] = $read["applicant_email"]??'';
                $company_applicant['applicant_nid'] = $read["applier_nid"]??'';
                $company_applicant['applier_dob'] = $read["applier_dob"]??'';
                $company_applicant['applicant_designation_id'] = $read["applier_designation"]??'';
                $company_applicant['applicant_address'] = $read["applier_present_address"]??'';
                $company_applicant['is_owner'] = '';
                $company_applicant['applicant_parmanent_address'] = $read["applier_permanent_address"]??'';

                $applicant_create = DB::table('company_applicant')->insert($company_applicant);


                // Owner Table with demo data: Owner Insert
                //TODO Need to remore demo data
                $company_owner_infos['company_info_id'] = $read["business_profile_id"]??'';
                $company_owner_infos['application_id'] = $application_id;
                $company_owner_infos['owner_nid'] = '7562594853';
                $company_owner_infos['owner_name'] = 'খোরশেদ আলম';
                $company_owner_infos['owner_address'] = '২নং ওয়ার্ড কমিউনিটি সেন্টার, ১২/এ, মিরপুর, পল্লবী, ঢাকা-১২১৬।';
                $company_owner_infos['owner_parmanent_address'] = '২নং ওয়ার্ড কমিউনিটি সেন্টার, ১২/এ, মিরপুর, পল্লবী, ঢাকা-১২১৬।';
                $company_owner_infos['owner_phone'] = '01885833661';
                $company_owner_infos['owner_email'] = 'khurshed@gmail.com';
                $company_owner_infos['owner_designation_id'] = '1';

                $owner_create = DB::table('company_owner_infos')->insert($company_owner_infos);

                // company_attachments Table
                $company_attachments['company_info_id'] = $read["business_profile_id"]??'';
                $company_attachments['application_id'] = $application_id;
                $company_attachments['attachment_title'] = '';
                $company_attachments['attachment_title_en'] = '';
                $company_attachments['attachment_file'] = '';

                $attachment_create = DB::table('company_attachments')->insert($company_attachments);
            }
        }
   

        return response()->json([
            'status'=>true,
            'code'=> 200,
            'data'=>" All DBID data Migrated"
        ]);
  
                
        
    }

    public function readCompanyInfo(){
        $dbid=DB::table('companyinfo')->get();

        // $count=DB::table('companyinfo')->count();

        // $count = DB::table('companyinfo')
        //      ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as created_at"), DB::raw('count(*) as Submited'))
        //      ->groupBy('created_at')
        //      ->get();

        
        // $count = DB::table('companyinfo')
        //         ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as new_date"),DB::raw('count(*) as Submited'))
        //         ->groupBy('created_at')
        //         ->orderBy('created_at','desc')
        //         ->get();

        $count = DB::table('companyinfo')->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            // ->take(7)
            ->get();

        $response_decoded=json_decode($dbid,true);

        $data=$dbid;

        if($data=='null'){
            return response()->json([
                'status'=>false,
                'data'=>'No information found!'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>true,
                'code'=> 200,
                'count'=> $count,
                'message'=> "All Business Lists",
                'data'=>$dbid
            ]);
        }
    }

    public function ubidReadData1(){
        $ubid=DB::table('ubid_data')->where('id', 2)->first();
        $count=DB::table('ubid_data')->count();

        $data=json_decode($ubid->COL5);
        // echo $data->name;
        // $data->{'business-web-url'};
        // dd($data->{'business-web-url'});

            if($data=='null'){
                return response()->json([
                    'status'=>false,
                    'data'=>'No information found!'
                ]);
            }
            else{
                return response()->json([
                    'status'=>true,
                    'code'=> 200,
                    'count'=> $count,
                    'ID'=> $ubid->id,
                    'application id'=> $ubid->COL1,
                    'applicant_mobile'=> $ubid->COL2,
                    'applicant_name'=> $ubid->COL3,
                    'ubid'=> $ubid->COL4,
                    'ACTION'=> $ubid->COL6,
                    'cdesk'=> $ubid->COL7,
                    'message'=> "All Business Lists",
                    'data'=>$data
                ]);
            }
    }

    public function ubidReadData(){
        $ubid = DB::table('ubid_data')->get();
        $count = DB::table('ubid_data')->count();


        foreach($ubid as $key => $read){
            $companyinfo=array();
            $company_applicant=array();
            $company_owner_infos=array();
            $company_contacts=array();
            $company_land_infos=array();
            $company_attachments=array();
            $data =  array();


            $ubids=DB::table('ubid_data')->where('id', $read->id)->first();
            $data=json_decode($ubids->COL5);

            // dd($ubids->COL2);
            // dd($data['business-web-url']);
            // $data->getAttribute('business-web-url');

            do {
                $number = random_int(100, 99999);
            } while (DB::table('companyinfo')->where("tracking_no", "=", $number)->first());

            // $number = rand(100,10000);
            $t=time();
            $tracking_no = $number.''.substr($t,3); 

            // companyinfo Table: companyinfo Insert array(0 => $ubids->COL2)
            // $check = $companyinfo['citizen_id'] = array($key => $ubids->COL2)??'';

            // $check = 
            $member_id= DB::table('companyinfo')->where('application_id', $ubids->COL1)->first();

            if(empty($member_id)){

                // dd($check);
                $companyinfo['citizen_id'] = $ubids->COL2??'';
                $companyinfo['community_member_radio_check'] = $data->community_member_radio_check??'';
                $companyinfo['community_member'] = $data->community_member??'';
                $companyinfo['community_member_number'] = $data->community_member_number??'';
                $companyinfo['company_name_bangla'] = $data->company_name_bangla??'';
                $companyinfo['company_name'] = $data->company_name??'';
                $companyinfo['business_web_url'] = $data->{'business-web-url'}??'';
                $companyinfo['facebook_url'] = $data->facebook_url??'';
                $companyinfo['company_land_info'] = '';
                $companyinfo['company_address_bangla'] = '';
                $companyinfo['company_phone_no'] = $data->company_phone_no??'';
                $companyinfo['company_mobile_no'] = $data->company_mobile_no??'';
                $companyinfo['company_email'] = $data->company_email??'';
                $companyinfo['company_year'] = $data->{'form-13481635413101234'}??'';
                $companyinfo['ubid_business_category'] = $data->ubid_business_category??'';
                $companyinfo['ubid_business_type'] = $data->ubid_bisiness_type??'';
                $companyinfo['company_trade_license'] = $data->trade_license_no??'';
                $companyinfo['company_trade_license_issue_name'] = $data->trade_license_issuing_office??'';
                $companyinfo['company_trade_license_renew_date'] = $data->{'form-13481635397322072'}??'';
                $companyinfo['company_registration_number'] = $data->company_registration_no??'';
                $companyinfo['company_registration_office'] = '';
                $companyinfo['company_bin'] = $data->bin_no??'';
                $companyinfo['company_tin'] = $data->tin_no??'';
                $companyinfo['company_other_details'] = '';
                if(is_numeric($ubids->COL4)){
                    $companyinfo['ubid'] = $ubids->COL4;
                }else {
                    $companyinfo['ubid'] = NULL;
                }
                
                if($ubids->COL7 == '102644'){
                    $companyinfo['n_doptor_user_id'] = '200000031534';
                } elseif($ubids->COL7 == '102651'){
                    $companyinfo['n_doptor_user_id'] = '200000041196';
                } elseif($ubids->COL7 == '102660'){
                    $companyinfo['n_doptor_user_id'] = '200000027812';
                } elseif($ubids->COL7 == '102664'){
                    $companyinfo['n_doptor_user_id'] = '200000027811';
                } elseif($ubids->COL7 == '102669'){
                    $companyinfo['n_doptor_user_id'] = '200000027812';
                } elseif($ubids->COL7 == '231975'){
                    $companyinfo['n_doptor_user_id'] = '200000027811';
                } else{
                    $companyinfo['n_doptor_user_id'] = $ubids->COL7;
                }


                $companyinfo['tracking_no'] = $tracking_no;
                $companyinfo['application_id'] = $ubids->COL1??'';

                if($ubids->COL6 == '20'){
                    $companyinfo['status'] = 4;
                }elseif($ubids->COL6 == '17' || $ubids->COL6 == '4'){
                    $companyinfo['status'] = 6;
                }elseif($ubids->COL6 == '1'){
                    $companyinfo['status'] = 1;
                }elseif($ubids->COL6 == '3'){
                    $companyinfo['status'] = 2;
                }elseif($ubids->COL6 == '5' || $ubids->COL6 == '22'){
                    $companyinfo['status'] = 3;
                } else {
                    $companyinfo['status'] = 1;
                }
                $companyinfo['is_view'] = 0;

                $companyinfo = DB::table('companyinfo')->insert($companyinfo);


                // Applicant Table: Applicant Insert
                $company_applicant['tracking_no'] = $tracking_no;
                $company_applicant['application_id'] = $ubids->COL1??'';
                $company_applicant['appliant_name'] = $data->name??'';
                $company_applicant['appliant_name_en'] = $data->applicant_name_eng??'';
                $company_applicant['appliant_phone'] = $ubids->COL2??'';
                $company_applicant['appliant_nid'] = $data->national_id_no??'';
                $company_applicant['appliant_dob'] = $data->dob??'';
                $company_applicant['appliant_designation_id'] = $data->applier_designation??'';
                $company_applicant['appliant_present_address'] = $data->permanent_address??'';
                $company_applicant['appliant_parmanent_address'] = $data->present_address??'';

                $company_applicant = DB::table('company_applicant')->insert($company_applicant);

                // CompanyContact Table: CompanyContact Insert
                $company_contacts['tracking_no'] = $tracking_no;
                $company_contacts['application_id'] = $ubids->COL1??'';

                $company_contacts = DB::table('company_contacts')->insert($company_contacts);

                // company_land_infos Table: company_land_infos Insert
                $company_land_infos['tracking_no'] = $tracking_no;
                $company_land_infos['application_id'] = $ubids->COL1??'';

                $company_land_infos = DB::table('company_land_infos')->insert($company_land_infos);

                // CompanyAttachment Table: CompanyAttachment Insert
                $company_attachments['tracking_no'] = $tracking_no;
                $company_attachments['application_id'] = $ubids->COL1??'';

                $company_attachments = DB::table('company_attachments')->insert($company_attachments);

                // CompanyOwnerInfo Table: CompanyOwnerInfo Insert
                $company_owner_infos['tracking_no'] = $tracking_no;
                $company_owner_infos['application_id'] = $ubids->COL1??'';
                $company_owner_infos['owner_name'] = $data->owner_name??'';
                $company_owner_infos['owner_nid'] = $data->owner_nid??'';
                $company_owner_infos['owner_designation_id'] = $data->{'form-designation'}??'';
                $company_owner_infos['owner_address'] = $data->owner_address??'';
                $company_owner_infos['owner_phone'] = $data->owner_mobile??'';
                $company_owner_infos['owner_email'] = $data->owner_email??'';

                $company_owner_infos = DB::table('company_owner_infos')->insert($company_owner_infos);

                // echo $ubids->id;
            } else{
                //echo "Data updated ";
               
            }
        }
        return response()->json([
            'status'=>true,
            'code'=> 200,
            'data'=> " All Data Successfully Migrationed"
        ]);

        // $count = DB::table('ubid_data')->count();
        
        // $data=array();
        // foreach($ubid as $read){

        //     $ubids=DB::table('ubid_data')->where('id', $read->id)->first();

        //     $data=json_decode($ubids->COL5);
        //     echo $data->name;

        //     return response()->json([
        //         'status'=>true,
        //         'code'=> 200,
        //         'count'=> $count,
        //         'application'=> $read->COL1,
        //         'applicant_mobile'=> $read->COL2,
        //         'applicant_name'=> $read->COL3,
        //         'ubid'=> $read->COL4,
        //         'message'=> "All Business Lists",
        //         'data'=>$data->name
        //     ]);

        // }
        // dd("OK");
        
        // dd("ok");
        // return response()->json($data);
   
    }
}
