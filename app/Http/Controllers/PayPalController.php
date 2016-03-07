<?php

namespace rGuard\Http\Controllers;

use Exception;
use Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use rGuard\App;
use rGuard\Http\Requests;
use rGuard\License;
use PayPal\Api\RedirectUrls;

class PayPalController extends Controller
{

    public static function makeApiContext()
    {
        return new ApiContext(new OAuthTokenCredential(env('PAYPAL_ID'), env('PAYPAL_SECRET')));
    }

    function makePayment(App $app)
    {
        $payer = (new Payer())
            ->setPaymentMethod("paypal");

        $item = (new Item())
            ->setName($app->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku($app->id)
            ->setPrice($app->price);

        $itemList = (new ItemList())->setItems([$item]);

        $details = (new Details())
            ->setShipping(0)
            ->setTax(0)
            ->setSubtotal($app->price);

        $amount = (new Amount())
            ->setCurrency("USD")
            ->setTotal($app->price)
            ->setDetails($details);

        $transaction = (new Transaction())
            ->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Purchased from " . config('rguard.title', 'My rGuard Site'))
            ->setInvoiceNumber(str_random(25));

        $redirectUrls = (new RedirectUrls())
            ->setReturnUrl(action('PayPalController@paymentReturn', ['app' => $app]))
            ->setCancelUrl(action('PayPalController@paymentCancel', ['app' => $app]));

        $payment = (new Payment())
            ->setIntent("sale")
            ->setPayer($payer)
            ->setRedirecturls($redirectUrls)
            ->setTransactions([$transaction]);
        try {
            $payment->create(PayPalController::makeApiContext());
            $approvalUrl = $payment->getApprovalLink();
            return redirect()->to($approvalUrl);
        } catch (Exception $ex) {
            return redirect()->back()->with("error", "PayPal error: " . $ex->getMessage());
        }
    }

    function paymentReturn(App $app)
    {
        $apiContext = PayPalController::makeApiContext();

        $paymentId = Input::get('paymentId');
        Payment::get($paymentId, $apiContext);

        $execution = (new PaymentExecution())
            ->setPayerId(Input::get('PayerID'));

        $amount = (new Amount())
            ->setCurrency('USD')
            ->setTotal($app->price)
            ->setDetails(new Details());

        $transaction = (new Transaction())->setAmount($amount);

        $execution->setTransactions([$transaction]);

        try {
            Payment::get($paymentId, $apiContext);
            return License::make($app);
        } catch (Exception $exc) {
            return redirect()->route('app.show', ['app' => $app])->with("error", "PayPal error: " . $exc->getMessage());
        }
    }

    function paymentCancel(App $app)
    {
        return redirect()->route('app.show', ['app' => $app])->with("success", "Successfully aborted payment.");
    }
}
