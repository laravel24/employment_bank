<?php
namespace employment_bank\Helpers;
use File, Response;
use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateLanguageInfo;

class Basehelper {

    public static function getAppName(){
        //return 'Employment Bank -Arunachal Pradesh';
        return '<b>Employment Bank </b>Arunachal Pradesh';
    }

    public static function generateIdCard($candidate_id){

        $info = CandidateInfo::where('candidate_id', $candidate_id)->first();
        $category = '';

        if($info->index_card_no==NULL || $info->index_card_no==''){

            $records = CandidateEduDetails::where('candidate_id', $candidate_id)->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
									         ->where('master_exams.exam_category', 'x1')
									         ->get();
            if(count($records)>0)
                $category = 'X1';

            $records = CandidateEduDetails::where('candidate_id', $candidate_id)->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
									         ->where('master_exams.exam_category', 'x2')
									         ->get();
            if(count($records)>0)
                $category = 'X2';
            $records = CandidateEduDetails::where('candidate_id', $candidate_id)->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
									         ->where('master_exams.exam_category', 'x3')
									         ->get();
            if(count($records)>0)
                $category = 'X3';


            $category.= '/'.date('Y').'/';

        	  if($info->id <= 9)
                $category .= '0000'.$info->id;
            elseif($info->id <= 99)
                $category.= '000'.$info->id;
            elseif($info->id <= 999)
                $category.= '00'.$info->id;
            elseif($info->id <= 9999)
                $category.= '0'.$info->id;
            else
                $category.= $info->id;

            $info->index_card_no = $category;
            $info->save();
        }

        return $info->index_card_no;
    }

    public static function sendSMS($number, $message){

        $mobile = $number;

        $Text = $message;
        $ccname = str_replace(' ','+',$Text);
        $Text=$ccname;

        //$ID=" ";
        //$Password=" ";

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //curl_setopt($ch, CURLOPT_URL, "http://t.onetouchsms.in/sendsms.jsp?user=".$ID."&password=".$Password."&mobiles=".$mobile."&sms=".$Text."&senderid=".$Sid);
        curl_setopt($ch, CURLOPT_HEADER, 2);
        curl_exec($ch);
        curl_close($ch);
    }

    public static function showInlineImage( $img ){
        //an abstract method for later extending
        //$path = storage_path('myimages') . '/' . $img;
        return $path = public_path($img);

        if( File::exists($path) ){

            $filetype = File::type( $path );

            $response = Response::make( File::get( $path ) , 200 );

            $response->header('Content-Type', $filetype);
            return $response;
        }
    }

    public static function showCandidateImage( $info ){

        //$path = storage_path('myimages') . '/' . $img;
        $info = CandidateInfo::find($info);
        $path = storage_path($info->photo_url);
        $handler = new \Symfony\Component\HttpFoundation\File\File($path);
        $lifetime = 31556926;
        /**
        * Prepare some header variables
        */
        $file_time = $handler->getMTime(); // Get the last modified time for the file (Unix timestamp)
        $header_content_type = $handler->getMimeType();
        $header_content_length = $handler->getSize();
        $header_etag = md5($file_time . $path);
        $header_last_modified = gmdate('r', $file_time);
        $header_expires = gmdate('r', $file_time + $lifetime);

        $headers = array(
          'Content-Disposition' => 'inline; filename="' . $info->photo_url . '"',
          'Last-Modified' => $header_last_modified,
          'Cache-Control' => 'must-revalidate',
          'Expires' => $header_expires,
          'Pragma' => 'public',
          'Etag' => $header_etag
        );
        /** Is the resource cached? */
        $h1 = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $header_last_modified;
        $h2 = isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $header_etag;

        if ($h1 || $h2) {
            return Response::make('', 304, $headers);
            // File (image) is cached by the browser, so we don't have to send it again
        }

        $headers = array_merge($headers, array(
            'Content-Type' => $header_content_type,
            'Content-Length' => $header_content_length
        ));

        return Response::make(file_get_contents($path), 200, $headers);
    }

    public static function check_candidate($id)
    {
        $candidate = Candidate::find($id);
        $info = CandidateInfo::where('candidate_id', $id)->count();
        $edu = CandidateEduDetails::where('candidate_id', $id)->count();
        $lang = CandidateLanguageInfo::where('candidate_id', $id)->count();

        if($info==0 || $edu ==0 || $lang==0)
            return false;
        else
            return true;
    }
}
