<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visitor;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class ChartIndex extends Component
{
    #[On('onSliceClick')]
    public function onSliceClick($slice)
    {
        dd($slice);
    }

    public function render()
    {
        // Deklarasi Sumber Data
        
        $posts = Post::all();
        $pieChartModel = (new PieChartModel())->setTitle('Data Postingan')
            ->setAnimated(true)
            ->setType('donut')
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled(true)
            ->addSlice('Pending', $posts->where('status', 'pending')->count(), '#086bff', 'pending')->addSlice('Disetujui', $posts->where('status', 'approved')->count(), '#00ff2a', 'approved')->addSlice('Ditolak', $posts->where('status', 'rejected')->count(), '#ff2e2e', 'rejected');

        $categories = Category::all();
        $columnChartModel = (new ColumnChartModel())->setTitle('Data Master')
        ->setAnimated(true);

        foreach ($categories as $category) {
            $color = '#000';
            switch ($category->name) {
                case 'Artikel':
                    $color = '#2796ff';
                    break;
                case 'Foto':
                    $color = '#27dfff';
                    break;
                case 'Video':
                    $color = '#a927ff';
                    break;
                case 'Poster':
                    $color = '#ffbb3c';
                    break;
                case 'Desain':
                    $color = '#00ff0d';
                    break;
                case 'Musik':
                    $color = '#ff3ce5';
                    break;
                case 'Audio':
                    $color = '#ff3c3c';
                    break;
                default:
                    break;
            }
            $columnChartModel->addColumn($category->name, $category->posts->count(), $color);
        }
        
        $treeMapChartModel = (new TreeMapChartModel())->setTitle('Data Master')
        ->setAnimated(true);

        foreach ($categories as $category) {
            $treeMapChartModel->addBlock($category->name, $category->posts->count(), '#5582ff');
        }

        $today = Carbon::today();
        $start_date = $today->copy()->subDays(3);
        $end_date = $today->copy()->addDays(3);

        $dates = [];

        // Inisialisasi setiap tanggal dengan 0 pengunjung
        for ($date = $start_date->copy(); $date <= $end_date; $date->addDay()) {
            $dates[$date->format('Y-m-d')] = 0;
        }

        $visitorsData = Visitor::select(DB::raw("DATE(visited_date) as date"), DB::raw("count(*) as count"))
            ->whereBetween('visited_date', [$start_date, $end_date])
            ->groupBy('date')
            ->get();

        $visitorsData->each(function ($visitor) use (&$dates) {
            $dates[$visitor->date] = $visitor->count;
        });

        $lineChartModel = (new LineChartModel())
            ->setTitle('Pengunjung Harian')
            ->setAnimated(true)
            ->setSmoothCurve()
            ->setXAxisVisible(true)
            ->setDataLabelsEnabled(true);

        foreach ($dates as $date => $count) {
            $lineChartModel->addPoint($date, $count);
        }


        return view(
            'livewire.dashboard.chart-index',
            compact('columnChartModel', 'pieChartModel', 'lineChartModel', 'treeMapChartModel')
        );
    }
}
