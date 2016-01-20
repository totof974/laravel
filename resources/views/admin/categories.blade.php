@extends('admin/layout-admin')

@section('content-title')
    Toutes les catégories
@endsection

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>
                        <div class="box-tools">
                            <div class="input-group" style="width: 150px;">

                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-plus-square-o">  Ajouter</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Actions</th>

                            </tr>
                            @foreach($cat_tab as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->image }}</td>
                                <td><button><i class="fa fa-times">  Supprimer</i></button>
                                    </td>
                            </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

@endsection