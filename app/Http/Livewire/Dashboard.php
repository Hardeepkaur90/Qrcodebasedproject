<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Order;
use App\Services\Helper;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\CarbonPeriod;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use Livewire\Component;

class Dashboard extends Component
{
    public $labels = [];

    public $columnChartModel;
    public $colors = [];
    // public $colors = [
    //     'food' => '#f6ad55',
    //     'shopping' => '#fc8181',
    //     'entertainment' => '#90cdf4',
    //     'travel' => '#66DA26',
    //     'other' => '#cbd5e0',
    //     'travel' => '#66DA26',
    //     'other' => '#cbd5e0',
    //     ];

    // public $firstRun = true;

    public function render()
    {
        $start_day = Carbon::now()->subDays(7)->format('Y-m-d');
        $end_day = Carbon::now()->format('Y-m-d');

       

        $expenses = Order::whereBetween('created_at', [$start_day, $end_day])->get();
        $columnChartModel = $expenses->groupBy(function($expenses ) {
            return $expenses->created_at->format('Y-m-d');
             })
            ->reduce(
                function (ColumnChartModel $columnChartModel, $data) {
                    $type = $data->first()->created_at->format('Y-m-d');
                    $value = $data->first->sum('total_price');
                    
                    return $columnChartModel->addColumn($type, $value, $this->colors='red');
                },
                (new ColumnChartModel())
                    ->setTitle('Weekly Orders')
                    // ->setAnimated($this->firstRun)
                   
            );

         

        $total_users = User::where('role', 4)->count();
        $total_items = Items::count();

        $newdata = $columnChartModel;

        $orderdates = Order::whereBetween('created_at', [$start_day, $end_day])->get();

      
        $period = CarbonPeriod::create($start_day, $end_day);


        $lables =array();
        $orders =array();

        // Iterate over the period
        foreach ($period as $date) {

           
           
            $orders_count = Order::whereDate('created_at',$date->format('Y-m-d'))->get();
            $count = count($orders_count);
             array_push($lables,(double)$date->format('Y-m-d'));

            array_push($orders,$count);
           
          
            
        }
        
        //  dd($count,$date->format('Y-m-d'));
        // Convert the period to an array of dates
        // $dates = $period->toArray();

        // dd($lables,$orders);

        $lables = json_encode($lables);
        $orders=json_encode($orders);

        // $lables = "[1, 2, 6, 4, 5, 6, 7, 8]";
        // $orders="[1, 2, 6, 4, 5, 6, 2, 8]";
        return view('livewire.dashboard', compact('total_users', 'total_items', 'lables','orders'));
    }
}




