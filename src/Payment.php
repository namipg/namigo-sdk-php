<?php

namespace Namipay\Api;

use Requests;

class Payment extends Entity
{
    /**
     * @param $id Payment id
     */
    public function retriveTransaction($transactionID)
    {
        $relativeUrl = $this->getEntityUrl() . 'transaction/'.$transactionID;

        return $this->request('GET', $relativeUrl);
    }

    public function transactionList($attributes = array())
    {
        $relativeUrl = $this->getEntityUrl() . 'transaction-list';

        return $this->request('POST', $relativeUrl, $attributes);
    }   

    
    public function refund($attributes = array())
    {

        $relativeUrl = $this->getEntityUrl() . 'refund';

        return $this->request('PUT', $relativeUrl, $attributes);
    }
    

    public function fetchMultipleRefund($options = array())
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/refunds';

        return $this->request('GET', $relativeUrl, $options);
    }

    public function fetchRefund($refundId)
    {
        $relativeUrl = $this->getEntityUrl() . $this->id . '/refunds/'.$refundId;

        return $this->request('GET', $relativeUrl);
    } 
    

    /**
     * payment create
     *
     * @param string $encrypted string
     */
    public function createPayment($string = array())
    {
        $relativeUrl = $this->getEntityUrl(). 'pay';

        return $this->request('PUT', $relativeUrl, $string);
    }

    /**
     * payment create with checkout page
     *
     * @param string $encrypted string
     */
    public function checkout($string = array())
    {
        $url = Api::getCheckoutUrl(). 'checkouts/pay';
        $user_name = Api::getKey();
        $password = Api::getSecret();
        $apiMode = Api::getApiMode();
        $customer_name = !empty($string['customer_name'])?$string['customer_name']:"";
        $customer_email = !empty($string['customer_email'])?$string['customer_email']:"";
        $amount = !empty($string['amount'])?$string['amount']:"";
        $currency = !empty($string['currency'])?$string['currency']:"";
        $remark = !empty($string['remark'])?$string['remark']:"";
        $form = '<form method="post" name="checkoutform" action="'.$url.'"><input type="hidden" name="api_user_name" value="'.$user_name.'"><input type="hidden" name="api_password" value="'.$password.'"><input type="hidden" name="api_mode" value="'.$apiMode.'"><input type="hidden" name="customer_name" value="'.$customer_name.'"><input type="hidden" name="customer_email" value="'.$customer_email.'"><input type="hidden" name="amount" value="'.$amount.'"><input type="hidden" name="currency" value="'.$currency.'"><input type="hidden" name="remark" value="'.$remark.'"></form><script>document.checkoutform.submit()</script>';
        echo $form; die;

        //return $this->request('PUT', $relativeUrl, $string);
    }

    /**
     * subscription payment
     *
     * @param string $encrypted string
     */
    public function subscription($string = array())
    {
        $relativeUrl = $this->getEntityUrl(). 'subscription';

        return $this->request('PUT', $relativeUrl, $string);
    }

    /**
     * subscription cancel
     *
     * @param string $encrypted string
     */
    public function cancelSubscription($customerId=null)
    {
        $relativeUrl = $this->getEntityUrl(). 'cancelSubscription/'.$customerId;

        return $this->request('GET', $relativeUrl);
    }

    /**
     * subscription cancel
     *
     * @param string $encrypted string
     */
    public function subscriptionDetail($customerId=null)
    {
        $relativeUrl = $this->getEntityUrl(). 'subscriptionDetail/'.$customerId;
        
        return $this->request('GET', $relativeUrl);
    }

    /**
     * payment create
     *
     * @param string $encrypted string
     */
    public function stcPay($string = array())
    {
        $relativeUrl = $this->getEntityUrl(). 'stcPay';

        return $this->request('PUT', $relativeUrl, $string);
    }

}
