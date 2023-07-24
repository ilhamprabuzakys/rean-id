<?php

namespace App\DataTables;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TagsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $action = '';
                // $action .= '
                // <a class="dropdown-item text-success text-decoration-none" href="'. route('tags.edit', $row->id) .'">
                //     Edit
                // </a>';
                $edit = '
                <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editTag'. $row->id .'">
                    Edit
                </a>';

                $hapus = '<a class="text-danger text-decoration-none dropdown-item" href="'. route('tags.destroy', $row) .'" data-confirm-delete="true">Hapus</a>';

                $lihatSemua = '<a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTag'. $row->id .'">
                Lihat postingan terkait</a>';

                // $action .= '<form onsubmit="return confirm("are you sure?")" action="'. route("tags.destroy", $row->id) .'" method="post" style="display:inline">
                // <input type="hidden" name="_token" value="'. csrf_token() .'">
                // <input type="hidden" name="_method" value="DELETE">
                // <button type="submit" class="btn btn-danger">Delete</button>
                // </form>';

                $dropdown = '
                <div class="dropdown">
                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                    <i class="align-middle" data-feather="more-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                    '. $lihatSemua . $edit . $hapus . '
                    </div>
                </div>';
                $action .= $dropdown;
                return $action;
            });
            // ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tag $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('tags-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('NO')->orderable(false),
            Column::make('name')->title('Name')->orderable(false),
            Column::make('updated_at')->title('Terakhir diperbarui')->orderable(false),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center')->orderable(false)->searchable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Tags_' . date('YmdHis');
    }
}
