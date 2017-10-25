<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Order;
use Illuminate\Config;
use Illuminate\Http\Request;
use PayPal\Exception\PayPalConnectionException;
use Validator;
use URL;
use Session;
use Redirect;
use Input;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        $this->middleware('auth');

        //set up the paypal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['sandbox_client_id'],
                $paypal_conf['sandbox_secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithPaypal()
    {
        return view('payment.pay');
    }

    /**
     * Store a details of payment with paypal.
     */
    public function paymentWithPaypal(Request $request)
    {
        $order = null;
        if ( Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
        } else {
            return redirect()->back()->withMessage('Problem with processing the order');
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('item_1')
             ->setCurrency('USD')
             ->setQuantity(1)
             ->setPrice($order->cost);

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount  = new Amount();
        $amount->setCurrency('USD')
               ->setTotal($order->cost);

        $transaction = new Transaction();

        $transaction->setAmount($amount)->setItemList($item_list)->setDescription('Sample Payment');

        $redirect_urls = new RedirectUrls();

        //specify the return url
        $redirect_urls->setReturnUrl(URL::route('payment_status'))
                      ->setCancelUrl(URL::route('payment_status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

//         dd($payment->create($this->_api_context));
//
//         exit;

        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $e) {
            if ( \Config::get('app.debug')){
                Session::put('message', 'Connection time out');
                return redirect(route('pay_with_paypal'));
            } else {
                Session::put('message', 'Some error occurred, sorry for the inconvenience');
                return redirect(route('pay_with_paypal'));

            }
        }

        foreach ( $payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // Add the payment to the session
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        Session::put('message', 'Unknown error Occurred');
        return  Redirect::route('pay_with_paypal');

    }

    public function paymentStatus()
    {
        // Get the payment id before session clear:
        $payment_id = Session::get('paypal_payment_id');

        //Clear the session payment id


        Session::forget($payment_id);

        if ( empty(Input::get('PayerID')) || empty(\Input::get('token'))); {
            Session::put('message', 'Payment Failed');
            return Redirect::route('pay_with_paypal');
    }

    $payment = Payment::get($payment_id, $this->_api_context);

    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));

    //Execute the payment.

    $result = $payment->execute($execution, $this->_api_context);

    if ( $result->getState() == 'approved') {
        //Everything went right
        if ( Session::has('order_id')) {
            $order = Order::find(Session::get('order_id'));
            $order->payment_status = 'payed';
            Session::forget('order_id');
        }
        return redirect(route('orders'))->withMessage('Payment Successful');
    } else {
        return redirect(route('pay_with_paypal'))->withMessage('Payment Failed');


    }

    }
}
