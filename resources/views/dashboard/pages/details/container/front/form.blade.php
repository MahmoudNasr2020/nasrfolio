<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">التفاصيل الشخصية</h4>
                <p class="mb-2">تسجيل التفاصيل الشخصية</p>
            </div>
            <div class="card-body">
                <form class="form-horizontal" id="form_update">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" value="{{ $data->name }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">المهنة</label>
                                <input type="text" class="form-control" id="job" name="job" placeholder="المهنة" value="{{ $data->job }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">تاريخ الميلاد</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="تاريخ الميلاد" value="{{ $data->birthday }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الموقع الالكتروني</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="الموقع الالكتروني" value="{{ $data->website }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">رقم الموبايل</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الموبايل" value="{{ $data->phone }}" >
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">المدينة</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="المدينة" value="{{ $data->city }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الدرجة</label>
                                <input type="text" class="form-control" id="degree" name="degree" placeholder="الدرجة" value="{{ $data->degree }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">العمر</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder="العمر" value="{{ $data->age }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الايميل</label>
                                <input type="text" class="form-control" id="mail" name="mail" placeholder="الايميل" value="{{ $data->mail }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">فري لانسر</label>
                                <select name="freelance" id="freelance" class="form-control">
                                    <option value="0" disabled selected >اختار الحالة</option>
                                    <option value="متاح" {{ $data->freelance == 'متاح'  ? 'selected':''}}>متاح</option>
                                    <option value="غير متاح" {{ $data->freelance == 'غير متاح'  ? 'selected':''}}>غير متاح</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الفيس بوك</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="الفيس بوك" value="{{ $data->facebook }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">تويتر</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="تويتر" value="{{ $data->twitter }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">لينكدان</label>
                                <input type="text" class="form-control" id="linkedIn" name="linkedIn" placeholder="لينكدان" value="{{ $data->linkedIn }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">جيت هاب</label>
                                <input type="text" class="form-control" id="github" name="github" placeholder="جيت هاب" value="{{ $data->github }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">واتس اب</label>
                                <input type="text" class="form-control" id="whatsApp" name="whatsApp" placeholder="واتس اب" value="{{ $data->whatsApp }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">تيليجرام</label>
                                <input type="text" class="form-control" id="telegram" name="telegram" placeholder="تيليجرام" value="{{ $data->telegram }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">السي في</label>
                                <input type="file" class="dropify" name="cv"  data-default-file="{{ asset('dashboard/images/'.$data->cv) }}" id="cv" data-height="200"  />
                                <a href="{{ asset('dashboard/images/'.$data->cv) }}">
                                    <i class="fa fa-download mt-3" style="font-size: 18px"></i>
                                </a>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الصورة</label>
                                <input type="file" class="dropify" name="image"  data-default-file="{{ asset('dashboard/images/'.$data->image) }}" id="image" data-height="200"  />
                            </div>
                        </div>
                    </div>

                    <button class="btn ripple btn-primary" type="submit" id="submit_button_edit">حفظ</button>
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <div class="col-lg-12 col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">الاعدادات</h4>
                <p class="mb-2">تسجيل الاعدادات </p>
            </div>
            <div class="card-body">
                <form class="form-horizontal" id="form_setting">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">اسم الموقع</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" placeholder="اسم الموقع" value="{{ $data->site_name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">حالة الموقع</label>
                                <select name="site_status" id="site_status" class="form-control">
                                    <option value="0" disabled selected >اختار حالة الموقع</option>
                                    <option value="مفتوح" {{ $data->site_status == 'مفتوح'  ? 'selected':''}}>مفتوح</option>
                                    <option value="مغلق" {{ $data->site_status == 'مغلق'  ? 'selected':''}}>مغلق</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">سطوع الموقع</label>
                                <select name="site_lightness" id="site_lightness" class="form-control">
                                    <option value="0" disabled selected >اختار سطوع الموقع</option>
                                    <option value="نهاري" {{ $data->site_lightness == 'نهاري'  ? 'selected':''}}>نهاري</option>
                                    <option value="ليلي" {{ $data->site_lightness == 'ليلي'  ? 'selected':''}}>ليلي</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">الوان الموقع</label>
                                <select name="site_color" id="site_color" class="form-control">
                                    <option value="0" disabled selected >اختار الوان الموقع</option>
                                    <option value="ازرق" {{ $data->site_color == 'ازرق'  ? 'selected':''}}>ازرق</option>
                                    <option value="احمر" {{ $data->site_color == 'احمر'  ? 'selected':''}}>احمر</option>
                                    <option value="اصفر" {{ $data->site_color == 'اصفر'  ? 'selected':''}}>اصفر</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">صورة الموقع</label>
                                <input type="file" class="dropify" name="site_image"  data-default-file="{{ asset('dashboard/images/'.$data->site_image) }}" id="image" data-height="200"  />
                            </div>
                        </div>
                    </div>

                    <button class="btn ripple btn-primary" type="submit" id="submit_button_setting">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>
