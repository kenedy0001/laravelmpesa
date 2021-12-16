<?php

namespace App\Http\Controllers;

use App\Models\b2cpayment;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class B2cController extends Controller
{
    public function generateAccessToken()
    {
        $consumer_key = "JLSBIn1FJXRKmela2CqT7edbgAXSXVQt";
        $consumer_secret = "jGLggzQdQTQAGBup";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }
    
    public function createValidationResponse($result_code,$result_description)
    {
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new HttpResponse();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }
    public function mpesaValidation(Request $request)
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }
    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());
        $mpesa_transaction = new b2cpayment();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
        // Responding to the confirmation request
        $response = new HttpResponse();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        return $response;
    }
    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer '. $this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => "600141",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://blog.hlab.tech/api/v1/hlab/transaction/confirmation",
            'ValidationURL' => "https://blog.hlab.tech/api/v1/hlab/validation"
        )));
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }
}