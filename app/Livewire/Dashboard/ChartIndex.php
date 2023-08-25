<?php

namespace App\Livewire\Dashboard;

use App\Models\Post;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Attributes\On;
use Livewire\Component;

class ChartIndex extends Component
{
    public function render()
    {
        // Deklarasi Sumber Data
        $posts = Post::all();

        $pieChartModel = (new PieChartModel())->setTitle('Data Postingan')
        ->addSlice('Pending', $posts->where('status', 'pending')->count(), '#5582ff')->addSlice('Disetujui', $posts->where('status', 'approved')->count(), '#11ff88')->addSlice('Ditolak', $posts->where('status', 'rejected')->count(), '#ff5555');
        
        $columnChartModel = (new ColumnChartModel())->setTitle('Data Master')
        ->addColumn('Postingan', $posts->where('status', 'pending')->count(), '#5582ff')
        ->addColumn('Kategori', $posts->where('status', 'approved')->count(), '#11ff88')
        ->addColumn('Label', $posts->where('status', 'rejected')->count(), '#ff5555')
        ->addColumn('Event', $posts->where('status', 'rejected')->count(), '#ff5555')
        ->addColumn('Ebook', $posts->where('status', 'rejected')->count(), '#ff5555')
        ;

        return view('livewire.dashboard.chart-index',
            compact('columnChartModel', 'pieChartModel'));
    }

}
