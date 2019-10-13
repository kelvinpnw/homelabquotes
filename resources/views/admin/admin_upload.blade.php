@extends('main_template')
@section('title','admin')
@section('page_specific_css')
    <style>#adminpreview {
            max-width: 50%;
        }</style>
@endsection
@section('page_specific_js')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#adminpreview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).ready(
            function () {
                $('input:file').change(
                    function () {
                        if ($(this).val()) {
                            $('input:submit').attr('disabled', false);
                            // or, as has been pointed out elsewhere:
                            // $('input:submit').removeAttr('disabled');
                        }
                    }
                );
            });
    </script>

@endsection
@section('body')
    <h1>Upload a Quote</h1>
    <img id="adminpreview"
         src="/static/admin/placeholder-quote.png"
         alt="your image"/>
    {!! Form::open(array( 'novalidate' => 'novalidate', 'files' => true)) !!}
    <div class="form-group">
        {!! Form::label('Quote Transcript') !!}
        {!! Form::textarea('transcript', null, array('placeholder'=>'logkiller: I don\'t steal')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Screenshot') !!}
        <input name="screenshot" type="file" onchange="readURL(this); required">
    </div>
    <div class="form-group">
        <input type="submit" value="Create quote" disabled>
    </div>
    {!! Form::close() !!}

@endsection
