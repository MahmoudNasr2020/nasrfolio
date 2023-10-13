<div class="modal" id="modalAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضافة خدمة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="add_service">

                    <div class="form-group">
                        <label for="name_edit">الاسم </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
                    </div>

                    <div class="form-group">
                        <label for="percent_edit">الوصف </label>
                        <textarea name="description"  id="description" class="form-control" rows="4" ></textarea>
                    </div>


                    <div class="form-group">
                        <label for="percent_edit">الصورة </label>
                        <input type="file" class="dropify" name="image"  id="image" data-height="150"  />
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
