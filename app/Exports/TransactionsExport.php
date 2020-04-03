<?php

namespace App\Exports;

use App\User;
use App\SubscriptionPlan;
use App\Transactions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromCollection, WithHeadings, ShouldAutoSize , WithEvents, WithMapping
{
    public function collection()
    {
        return Transactions::orderBy('id')->get(['id','user_id','email','plan_id','gateway','payment_amount','payment_id','date']);
    }

    public function map($transactions): array
    {
        return [             
            $transactions->id,
            User::getUserFullname($transactions->user_id),
            $transactions->email,
            SubscriptionPlan::getSubscriptionPlanInfo($transactions->plan_id,'plan_name'),
            $transactions->gateway,
            $transactions->payment_amount,
             $transactions->payment_id,
            date('m-d-Y',$transactions->date)           
            
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',            
            'Plan',
            'Gateway',
            'Amount',            
            'Payment ID',           
            'Date'
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