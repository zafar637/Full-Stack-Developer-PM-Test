namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock data for MRR and other metrics
        $data = [
            'total_mrr' => 14775,
            'new_mrr' => 14775,
            'upgrades' => 13000,
            'downgrades' => 755,
            'reactivations' => 10000,
            'existing' => 10000,
            'churn' => 100,
            'arpu' => 10000,
            'net_mrr' => 100000,
            'labels' => ['Jan 1', 'Jan 2', 'Jan 3', 'Jan 4', 'Jan 5'],
            'mrr_data' => [
                'new_mrr' => [5000, 6000, 7000, 8000, 9000],
                'upgrades' => [1000, 2000, 3000, 4000, 5000],
                'reactivations' => [1500, 2500, 3500, 4500, 5500],
                'existing' => [2000, 3000, 4000, 5000, 6000],
                'downgrades' => [500, 400, 300, 200, 100],
                'churn' => [50, 40, 30, 20, 10],
            ]
        ];

        return view('dashboard', compact('data'));
    }
}
