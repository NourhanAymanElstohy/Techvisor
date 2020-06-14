<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;



use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use Redirect;
use URL;


class PaymentController extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;
    public $id;
    public $count=0;
    
    public function __construct()
    {
        if (config('paypal.settings.mode') == 'live'){
            $this->clientId = config('paypal.live_client_id');
            $this->secret =config('paypal.live_secret');
        } else {
            $this->clientId =config('paypal.sandbox_client_id');
            $this->secret =config('paypal.sandbox_secret');

        }
       
        // if($this->count==0){
        //      $this->count=$this->count+1;
        //       $id=request()->input('id');
         
        //      $this->id=(int)$id; 
        // }
     
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->clientId, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));


    }


    public function payWithpaypal(Request $request)
    {
        $title =$request->input('title');
        $description =$request->input('name');
        //  global $id ;
        //  $this->id=$request->input('id');
        //  dd($this->id);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = new Item();
        $item->setName($description)
         ->setCurrency('USD')
         ->setQuantity(1)
         ->setPrice($title);
         

         $itemList = new ItemList();
         $itemList->setItems(array($item));

         $amount = new Amount();
         $amount->setCurrency("USD")
         ->setTotal($title);

         $transaction = new Transaction();
         $transaction->setAmount($amount)
           ->setItemList($itemList)
           ->setDescription("Payment description");

          
           $redirectUrls = new RedirectUrls();
           $redirectUrls->setReturnUrl(URL::to('status'))
           ->setCancelUrl(URL::to('canceled'));

           
           $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
               
                try {

                    $payment->create($this->apiContext);
        
                } catch (\PayPal\Exception\PPConnectionException $ex) {
        
                  die($ex);
        
                }
                $paymentLink = $payment->getApprovalLink();

                return redirect($paymentLink);

    }

   public function status(Request $request){
   
     
   
      if (empty($request->input('PayerID') ) || empty($request->input('token') ) ){
          die('Payment Failed');
      }
      dd($this->id);
      // $id =$request->input('id');
      // dd($request->id);
      // global $id;
      // dd($id);
      $paymentId = $request->get('paymentId');
      $payment = Payment::get($paymentId, $this->apiContext);
      $execution =new PaymentExecution();
      $execution->setPayerId($request->input('PayerID'));
      $result = $payment->execute($execution, $this->apiContext);

      if($result->getState() == 'approved'){
          die('Thank You . Got your money bithc!!');
          // echo "Thank You . Got your money bithc!!" ;
        //    return redirect()->route('/zoom/'.$id);
        
        //  return redirect()->route('zooms.zoom',['zoom' => $this->id]);
        
      }

      echo 'Payment Failed again';
      die($result);




   }
   public function canceled(){
    //    return 'Payment Canceld . No worries';
    return redirect()->route('posts.index');
   }



}
