<?php

namespace App\Exports;

use App\User;
use App\SubscriptionPlan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize , WithEvents, WithMapping
{
    public function collection()
    {
        return User::where('usertype', '=', 'User')->orderBy('id')->get(['id','name','email','phone','user_address','plan_id','exp_date','paypal_payment_id','stripe_payment_id','plan_amount']);
    }

    public function map($users): array
    {
        return [             
            $users->id,
            $users->name,
            $users->email,
            $users->phone,
            $users->user_address,
            SubscriptionPlan::getSubscriptionPlanInfo($users->plan_id,'plan_name'),
            date('m-d-Y',$users->exp_date),
            $users->paypal_payment_id,
            $users->stripe_payment_id,
            $users->plan_amount
            
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Plan',
            'Exp Date',
            'Paypal Payment ID',
            'Stripe Payment ID',
            'Amount'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:K1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}