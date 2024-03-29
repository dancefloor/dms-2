<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Registration;

class RegistrationManager {
    
    public static function toPayed(){
        
    }

    public static function registrationToOpen($id)
    {
        $registration = Registration::Find($id);
        $registration->status = 'open';
        $registration->save();
    }

    public static function updateOrder($id)
    {
        $order = Order::findOrFail($id);
                
        if ($order->payments->count() > 0) {            
            $amount = 0;
            
            foreach ($order->payments as $pay) {
                $amount = $amount + $pay->credit - $pay->debit;
            }        
        } else {            
            $order->status = 'open';
            $order->save();
            return $order->status;
        }

        $order->received = $amount;        

        if ($amount == $order->total) {
            $order->status = 'paid';            
            foreach ($order->registrations as $r) {
                self::registrationCompleted($r->id);
            }            
            $order->save();
            
        } elseif ($amount < $order->total){                        
            foreach ($order->registrations as $r) {
                self::registrationToPartial($r->id);
            }
            $order->status = 'partial';
            $order->save();            
        } else {
            foreach ($order->registrations as $r) {
                self::registrationCompleted($r->id);
            }
            $order->status = 'overpaid';
            $order->save(); 
        }
        return $order->status;
    }

    public static function registrationCompleted($id)
    {
        $registration = Registration::Find($id);
        $registration->status = 'registered';
        $registration->save();
    }

    public function updateRegistrations(Order $order)
    {
        $status = $this->verifyOrderPaymentStatus($order);

        // dd($status);
        switch ($order->status) {
            case 'open':                                
                $this->updateRegistrationStatus($order, 'open');
                break;
            case 'paid':
                $this->updateRegistrationStatus($order, 'registered');
                break;
            case 'partial':
                $this->updateRegistrationStatus($order, 'partial');
                break;
            case 'overpaid':
                $this->updateRegistrationStatus($order, 'registered');
                break;
            case 'canceled':             
                $this->updateRegistrationStatus($order, 'canceled');
                break;
            default:
                $this->updateRegistrationStatus($order, 'expired');
                break;
        }
    } 

    public function verifyOrderPaymentStatus($order)
    {

        if ($order->payments->count() < 1) {                                
            return $order->status;
        }

        if ($order->total == $order->received) {
            $order->status = 'paid';            
        } elseif ($order->total > $order->received) {
            $order->status = 'partial';
        } elseif ($order->total < $order->received) {
            $order->status = 'overpaid';
        }
        $order->save();
        return $order->status;
    }

    public function updateRegistrationStatus(Order $order, $status):void
    {
        foreach ($order->registrations as $r) {
            $r->status = $status;
            $r->save();
        }
    }    

    public static function registrationToPartial($id)
    {
        $registration = Registration::Find($id);
        $registration->status = 'partial';
        $registration->save();
    }

    public static function getRegistrationStatusFromOrder($status)
    {

        switch ($status) {
            case 'open':
                return 'open';
                break;
            case 'paid':
                return 'registered';
                break;
            case 'partial':
                return 'partial';
                break;
            case 'overpaid':
                return 'registered';                
                break;
            case 'canceled':        
                return 'canceled';                     
                break;
            default:
                return 'standby';                
                break;
        }
    }
    
}