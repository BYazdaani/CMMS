<?php


namespace App\Http\ViewComposers;

use App\Models\WorkRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AlertComposers
{

    public $alertCount = 0;
    public $alerts=[];

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {

        if (Auth::user()->hasRole('Super Admin') || Auth::user()->hasRole('Admin')) {

            $this->alerts = WorkRequest::where('status', '=', 0)->get();
            $this->alertCount = count($this->alerts);

        } else {
            if (Auth::user()->hasRole('Maintenance Technician')) {
                $workOrders = Auth::user()->maintenanceTechnician->workOrders;

                foreach ($workOrders as $workOrder) {
                    if ($workOrder->workOrderLogs->last()->status == "created") {
                        array_push($this->alerts, $workOrder);
                        $this->alertCount++;
                    }
                }
            }
        }
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('alertsCount', $this->alertCount)->with('alerts',$this->alerts);
    }

}
