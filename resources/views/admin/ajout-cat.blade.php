@extends('admin/layout-admin')

@section('content-title')
    Ajouter une catégorie
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="InputTitle">Title</label>
                                <input type="text" placeholder="Enter title" id="InputTitle" class="form-control" name="InputT">
                            </div>
                            <div class="form-group">
                                <label for="InputDescription">Description</label>
                                <input type="text" placeholder="Description" id="InputDescritption" class="form-control" name="InputD">
                            </div>
                            <div class="form-group">
                                <label for="InputPosition">Position</label>
                                <input type="number" placeholder="Position" id="InputPosition" class="form-control" name="InputP">
                            </div>
                            <div class="form-group">
                                <label for="InputFile">Image</label>
                                <input type="file" id="InputFile" name="img">
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus-circle">  Ajout</i>
                            </button>
                        </div>
                    </form>
                </div><!-- /.box -->


            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section>

@endsection