@extends('dashboard.layouts.index')

@section('title')
    | أضافة مسؤول
@stop

@section('page-header')
    <a href="{{ route('dashboard.admin.index') }}">المسؤولين</a> / اضافة مسؤول جديد
@stop

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12 basic-info">
                <div class="card">
                    <div class="card-header">
                        <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-user"></i>إضافة مسؤول جديد</h5>
                    </div>
                    <div class="card-body">
                        <form id="add_admin" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الاسم
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" class="form-control" placeholder="ادخل الاسم" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>البريد
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-control" placeholder="ادخل البريد الالكتروني" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>كلمة السر
                                                <span class="text-danger"> * </span>
                                                <span class=""></span>
                                            </label>
                                            <input type="password" name="password" class="form-control"  placeholder="ادخل كلمة السر" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>تاكيد كلمة السر
                                                <span class="text-danger">*</span>
                                                <span class=""></span>
                                            </label>
                                            <input type="password" name="password_confirmation" class="form-control"  placeholder="تاكيد كلمة السر" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الصلاحيات
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="roles[]" multiple>
                                                <option value="0" selected disabled>اختر الصلاحية</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الحالة
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="status">
                                                <option value="0" selected disabled>اختر الحالة</option>
                                                <option value="enable">مفعل</option>
                                                <option value="disable">معطل</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label>الصورة
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div></div>
                                            <div class="custom-file">
                                                <div class="image-upload">
                                                    <label for="file-input">
                                                        <img id="previewImg" src="{{ asset('dashboard/images/image-upload-icon.jpg') }}" style="width: 100px; height: 100px;cursor: pointer" />
                                                    </label>
                                                    <input id="file-input" type="file" style="display: none;" name="photo" />
                                                    <div  style="margin-top: 5px;display: inline-block;">
                                                        <a href="#" data-toggle="modal" data-target="#model_item_image">
                                                            <img id="show_image" src="#" style="width: 48px;height: 48px;object-fit: cover;border-radius: 50%;display: none" class="" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="submit_button" class="btn btn-primary mr-2">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@include('dashboard.pages.admins.container.front.imageModal')
@endsection

@section('js')
    @include('dashboard.pages.admins.container.include.ajax.add')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result).css('display','inline-block');
                    $('#image_modal').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function(){
            readURL(this);
        });
        $('input').attr('autocomplete','off');
    </script>
@endsection
