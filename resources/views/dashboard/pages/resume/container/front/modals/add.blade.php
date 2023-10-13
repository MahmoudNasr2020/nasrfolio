<div class="modal" id="modalAdd">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضافة عتصر</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="add_resume">

                    <div class="form-group">
                        <label for="category_id">القسم</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0" disabled selected>اختار القسم</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">العنوان </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="العنوان">
                    </div>

                    <div class="form-group">
                        <label for="date">التاريخ </label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="التاريخ">
                    </div>

                    <div class="form-group">
                        <label for="date">الوصف </label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="الوصف" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">النقاط : يجب وضع علامة <h4 style="display: inline"> ; </h4> بعد كل نقطة تكتب ماعدا السطر الاخير </label>
                        <textarea type="text" class="form-control" id="points" name="points" placeholder="النقاط" rows="4"></textarea>
                    </div>

                    <button class="btn ripple btn-primary" type="submit" id="submit_button">حفظ</button>
                </form>
            </div>
            <div class="modal-footer">

                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
            </div>
        </div>
    </div>
</div>
