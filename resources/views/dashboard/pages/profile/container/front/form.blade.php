<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><i style="margin-left: 6px;color: darkred;" class="fa fa-user"></i>تعديل اعدادات الحساب</h5>
            </div>
            <div class="card-body">
                <form id="form_update" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الاسم
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="ادخل الاسم"  value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>البريد
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="ادخل البريد الالكتروني" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"/>
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

                        <div class="col-6 mt-4">
                            <div class="form-group">
                                <label for="">الصورة</label>
                                <input type="file" class="dropify" name="image"  data-default-file="{{ asset('dashboard/images/'.\Illuminate\Support\Facades\Auth::user()->image) }}" id="image" data-height="200"  />
                            </div>
                        </div>

                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="submit_button_update" class="btn btn-primary mr-2">حفظ</button>
            </div>
            </form>
        </div>
    </div>
</div>
