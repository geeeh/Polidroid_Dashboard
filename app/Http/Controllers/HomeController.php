<?php

namespace App\Http\Controllers;
use Lava;
use App\Account;
use App\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temperatures = Lava::DataTable();

        $temperatures->addDateColumn('Date')
             ->addNumberColumn('police')
             ->addNumberColumn('fire')
             ->addNumberColumn('Hospital')
             ->addNumberColumn('towing')
             ->addRow(['2014-10-1',  67, 65, 62, 13])
             ->addRow(['2014-10-2',  68, 65, 61, 22])
             ->addRow(['2014-10-3',  68, 62, 55, 64])
             ->addRow(['2014-10-4',  72, 62, 52, 15])
             ->addRow(['2014-10-5',  61, 54, 47, 34])
             ->addRow(['2014-10-6',  70, 58, 45, 65])
             ->addRow(['2014-10-9', 63, 62, 62, 29]);

        Lava::LineChart('Temps', $temperatures, [
            'title' => 'Emergency requests'
        ]);
        $this->displayDoughnut();
        $this->createAccountColumns();
        return view('dashboard.stats',
        [
            'companies'=>$this->getCompaniesCount(),
            'requests'=>$this->getRequestsCount()
        ]);
    }

    public function displayDoughnut()
    {
        $reasons = Lava::DataTable();
        $reasons->addStringColumn('Request Types')
                ->addNumberColumn('Percent')
                ->addRow(['Fire Emergencies', 5])
                ->addRow(['Hospital Emergencies', 2])
                ->addRow(['Police Emergencies', 4])
                ->addRow(['Towing Emergencies', 89]);

        Lava::DonutChart('Polidroid', $reasons, [
            'title' => 'Polidroid percentage per request types'
        ]);

    }

    private function getCompaniesCount()
    {
        $companyCount = Account::all()
        ->count();
        return $companyCount;
    }

    private function getRequestsCount()
    {
        $requestsCount = Response::all()
        ->count();
        return $requestsCount;
    }

    private function createAccountColumns()
    {
        $finances = Lava::DataTable();

        $finances->addDateColumn('Year')
                ->addNumberColumn('Sales')
                ->addNumberColumn('Expenses')
                ->setDateTimeFormat('Y')
                ->addRow(['2004', 1000, 400])
                ->addRow(['2005', 1170, 460])
                ->addRow(['2006', 660, 1120])
                ->addRow(['2007', 1030, 54]);

        Lava::ColumnChart('Finances', $finances, [
            'title' => 'Monthly Emergency requests',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
    }

    public function check
}
