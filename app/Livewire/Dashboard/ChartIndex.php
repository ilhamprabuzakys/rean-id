<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Ebook;
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
    public $posts, $ebooks, $categories, $postsCount, $ebooksCount;

    public function mount()
    {
        // Deklarasi Sumber Data
        // Cek level user yang login 
        if (auth()->user()->role != 'member') {
            $this->posts = Post::all();
            $this->ebooks = Ebook::all();
        } else {
            $this->posts = Post::where('user_id', auth()->id())->get();
            $this->ebooks = Ebook::where('user_id', auth()->id())->get();
        }
        $this->categories = Category::all();

        $this->postsCount = $this->posts->count();
        $this->ebooksCount = $this->ebooks->count();
    }

    #[On('onSliceClick')]
    public function onSliceClick($slice)
    {
        dd($slice);
    }

    public function render()
    {
        $postPieChartModel = (new PieChartModel())->setTitle('Data Postingan')
            ->setAnimated(true)
            ->setType('donut')
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled(true)
            ->addSlice('Pending', $this->posts->where('status', 'pending')->count(), '#086bff', 'pending')->addSlice('Disetujui', $this->posts->where('status', 'approved')->count(), '#00ff2a', 'approved')->addSlice('Ditolak', $this->posts->where('status', 'rejected')->count(), '#ff2e2e', 'rejected');
        
        $ebookPieChartModel = (new PieChartModel())->setTitle('Data Ebook')
            ->setAnimated(true)
            ->setType('donut')
            ->legendPositionBottom()
            ->legendHorizontallyAlignedCenter()
            ->setDataLabelsEnabled(true)
            ->addSlice('Pending', $this->ebooks->where('status', 'pending')->count(), '#086bff', 'pending')->addSlice('Disetujui', $this->ebooks->where('status', 'approved')->count(), '#00ff2a', 'approved')->addSlice('Ditolak', $this->ebooks->where('status', 'rejected')->count(), '#ff2e2e', 'rejected');


        $columnChartModel = (new ColumnChartModel())->setTitle('Data Postingan')
        ->setAnimated(true);

        foreach ($this->categories as $category) {
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

        foreach ($this->categories as $category) {
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
            compact('columnChartModel', 'postPieChartModel', 'ebookPieChartModel', 'lineChartModel', 'treeMapChartModel')
        );
    }
}
