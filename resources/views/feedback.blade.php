@extends("layout")


@section("content")
    <div class="container">
        <div class="main">
            <div class="contact">
                <div class="contact_info">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1430912648478" width="100%" height="250" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
                <div>
                    <h2>Rien à signaler ????</h2>

                    @if (session('successFeedback'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <i class="fa fa-times"></i> {{ session('successFeedback') }}
                        </div>
                    @endif



                    @if(count($errors->all()))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif




                    <form enctype="multipart/form-data" method="post" action="{{ route('go_back')  }}" >
            {{ csrf_field() }}
            <div>
                <span><label>URL (copier coller l'url de la page ici)</label></span>
                <span><input name="page" type="text" class="textbox"></span>
            </div>
            <div>
                <span><label>Bug</label></span>
                                <span><select name="bug">
                                        <option selected>RAS</option>
                                        <option>Problème visuel</option>
                                        <option>Problème technique</option>
                                        <option>Problème d'orthographe</option>

                                    </select></span>
            </div>
            <div>
                <span><label>Prénom</label></span>
                <span><input name="firstname" type="text" class="textbox"></span>
            </div>
            <div>
                <span><label>Nom</label></span>
                <span><input name="lastname" type="text" class="textbox"></span>
            </div>
            <div>
                <span><label>Email</label></span>
                <span><input name="email" type="text" class="textbox"></span>
            </div>

            <div>
                <span><label>Subject</label></span>
                <span><textarea name="message"> </textarea></span>
            </div>

            <div>

                <span><input name="screenshot" type="file"></span>
            </div>
            <div>
                <span><input type="submit" class="" value="Submit us"></span>
            </div>
        </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@stop