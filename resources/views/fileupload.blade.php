<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Upload ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js
">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <style>
        .progress {
            position: relative;
            width: 100%;
        }

        .bar {
            background-color: #2dab27;
            width: 0;
            height: 20%;
        }

        .percent {
            position: absolute;
            display: inline-block;
            left: 50%;
            color: #040608;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Laravel 10 Upload progress bar using ajax</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="file" type="file" class="form-control"><br />
                        <div class="progress">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <br>

                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var SITEURL = "{{URL('/')}}";
        $(function() {
            $(document).ready(function() {
                var bar = $('.bar');
                var percent = $('.percent');

                $('form').ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, persentComplete) {
                        var percentVal = persentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        alert('file uploaded successfully');
                        window.location.href = SITEURL + "/" + "ajax-file-upload-progress-bar";
                    }
                });
            });
        });
    </script>

</body>

</html>