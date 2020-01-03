<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <style>
        .hide {
            display: none;
        }
    </style>
    <title>Applicants form</title>
</head>
<body>
<div class="container">
    <div class="row m-5">
        <div class="col-md-12 card">
            <div class="card-body">
                <form action="#" id="app-form" name="app-form">

                    {{--                    <input type="hidden" value="{{ csrf_token() }}">--}}
                    {{ csrf_field() }}

                    <div class="row"><h3 class="text-center">Registration Form</h3></div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="applicant_name">Applicant's Name (*Required)</label>
                            <input type="text" name="applicant_name" value="{{old('applicant_name')}}"
                                   id="applicant_name" class="form-control" placeholder="Enter Name">
                            <span class="text text-danger">{{$errors->first('applicant_name')}}</span>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="email">Email Address (*Required)</label>
                            <input type="email" name="email" value="{{old('email')}}"
                                   id="email" class="form-control" placeholder="Enter Email">
                            <span class="text text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="mailing_address">Mailing Address (*Required)</label>
                            <textarea name="mailing_address" id="mailing_address" cols="30" rows="5"
                                      class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="division_name">Division (*Required)</label>
                            <select name="division_name" id="division_name" class="form-control division"
                                    data-dependent="district_name">
                                <option value="#">Select</option>
                                @foreach($location_list as $list)
                                    <option value="{{ $list->division_name }}">{{ $list->division_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="district_id">District (*Required)</label>
                            <select name="district_name" id="district_name" class="form-control division"
                                    data-dependent="upzila_name">
                                <option value="#">Select district</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="upzila_name">Upzila (*Required)</label>
                            <select name="upzila_name" id="upzila_name" class="form-control">
                                <option value="#">Select upzila</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="address_details">Address Details (*Required)</label>
                            <textarea name="address_details" id="address_details" cols="30" rows="5"
                                      class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="language">Language Proficiency (*Required)</label>
                            <input type="checkbox" name="lang_bangla" class="form-check-inline ml-5">Bangla
                            <input type="checkbox" name="lang_english" class="form-check-inline ml-3">English
                            <input type="checkbox" name="lang_french" class="form-check-inline ml-3">French
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="exam">Education Qualification (*Required)</label>
                            <table class="table table-bordered table-light exam-table">
                                <thead>
                                <tr>
                                    <td>Exam name</td>
                                    <td>Exam University</td>
                                    <td>Board</td>
                                    <td>Result</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody id="exam-tbody">
                                <!-- dynamic exam form here -->

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="photo">Photo (*Required)</label>
                            <input type="file" name="photo" value="{{old('photo')}}"
                                   id="photo" class="form-control">
                            <span class="text text-danger">{{$errors->first('photo')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="photo">CV Attachment (*Required)</label>
                            <input type="file" name="cv" value="{{old('cv')}}"
                                   id="cv" class="form-control">
                            <span class="text text-danger">{{$errors->first('cv')}}</span>
                        </div>
                    </div>

                    <div class="row border">

                        <div class="col-md-3">
                            <label for="training-details">Training (*Required)</label>
                            <div class="col-12">
                                <input type="radio" name="train_check" id="train-yes" onclick="train_check_yes()"
                                       value="0"
                                       class="form-check-inline">Yes
                                <input type="radio" name="train_check" id="train-no" onclick="train_check_no()"
                                       value="1"
                                       class="form-check-inline ml-1" checked>No
                            </div>
                        </div>
                        <div class="col-md-9 hide" id="train-table-div">
                            <table class="table table-bordered table-light" id="training-table">
                                <thead>
                                <tr>
                                    <td>Training</td>
                                    <td>Training Details</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody id="train-tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-primary btn-success btn-group-lg" id="add-app"
                                    onclick="addApplication()" name="add-app">Submit
                            </button>
                            <button type="reset" class="btn btn-outline-warning btn-danger btn-group-lg">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script !src="">
    $(document).ready(function () {

        //== dynamic location select start==
        $('.division').change(function () {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('location.fetch') }}",
                    method: "post",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('#' + dependent).html(result);
                    }
                });
            }
        });

        $('#division_name').change(function () {
            $('#district_name').val('');
            $('#upzila_name').val('');
        });

        $('#district_name').change(function () {
            $('#upzila_name').val('');
        });

        //== dynamic location select end ==
    });
    //== dynamic Exam Form Start ==

    $(document).ready(function () {
        var i = 0;

        dynamic_field(i);

        function dynamic_field(number) {

            html = '<tr>\n' +
                '<td>\n' +
                '                                        <select name="add-more-row[' + i + '][exam_name]" id="exam_id" class="form-control">\n' +
                '                                            <option value="#">Select</option>\n' +
                '                                        </select>\n' +
                '                                    </td>\n' +
                '<td>\n' +
                '                                        <select name="add-more-row[' + i + '][university_name]" id="university_id" class="form-control">\n' +
                '                                            <option value="#">Select</option>\n' +
                '                                        </select>\n' +
                '                                    </td>\n' +
                '                                    <td>\n' +
                '                                        <select name="add-more-row[' + i + '][board_name]" id="board_id" class="form-control">\n' +
                '                                            <option value="#">Select</option>\n' +
                '                                        </select>\n' +
                '                                    </td>\n' +
                '<td>\n' +
                '<input type="text" name="add-more-row[' + i + '][result]" id="result" class="form-control"\n' +
                '                                               placeholder="result"></td>\n';

            if (number > 0) {
                html += '<td>\n' +

                    '                                        <button type="button" name="delete" id="delete_exam" class="btn btn-danger btn-sm">\n' +
                    '                                            Delete\n' +
                    '                                        </button>\n' +
                    '                                    </td>\n' +
                    '</tr>';
                $('#exam-tbody').append(html);
            } else {
                html += '<td>\n' +

                    '                                        <button type="button" name="add-more" id="add-more-exam" class="btn btn-info btn-sm">\n' +
                    '                                            Add more..\n' +
                    '                                        </button>\n' +
                    '                                    </td>\n' +
                    '</tr>';
                $('#exam-tbody').html(html);
            }

            $(document).on('click', '#add-more-exam', function () {
                i++;
                dynamic_field(i);
            });
            $(document).on('click', '#delete_exam', function () {
                i--;
                $(this).closest("tr").remove();
            });

        }

        //== dynamic Exam Form End ==
    });

    //== dynamic training Form Start ==

    $(document).ready(function () {


        $('#train-yes').click(function () {
            document.getElementById('train-table-div').style.display = 'block';
        });

        $('#train-no').click(function () {
            document.getElementById('train-table-div').style.display = 'none';
        });


        var i = 0;
        dynamic_training(i);

        function dynamic_training(number) {

            html = '<tr>\n' +
                '                                    <td>\n' +
                '                                        <input type="text" name="add_more[' + i + '] training_name[]" id="training_name"\n' +
                '                                               class="form-control"\n' +
                '                                               placeholder="Training">\n' +
                '                                    </td>\n' +
                '                                    <td>\n' +
                '                                        <input type="text" name="add_more[' + i + '] training_details[]" id="training_details"\n' +
                '                                               class="form-control"\n' +
                '                                               placeholder="Training Details">\n' +
                '                                    </td>\n';


            if (number > 0) {
                html += '                                    <td>\n' +
                    '                                        <button type="button" id="del-training-row"\n' +
                    '                                                class="btn btn-danger btn-sm del-training-row">Delete\n' +
                    '                                        </button>\n' +
                    '                                    </td>\n' +
                    '                                </tr>';
                $('#train-tbody').append(html);
            } else {
                html += '                                    <td>\n' +
                    '                                        <button type="button" id="add-training-row"\n' +
                    '                                                class="btn btn-primary btn-sm add-training-row">Add more ..\n' +
                    '                                        </button>\n' +
                    '                                    </td>\n' +
                    '                                </tr>';
                $('#train-tbody').html(html);
            }
        }

        $(document).on('click', '#add-training-row', function () {
            i++;
            dynamic_training(i);
        });

        $(document).on('click', '#del-training-row', function () {
            $(this).closest("tr").remove();
        });

    });

    //== dynamic training Form End ==

</script>

</body>
</html>
