<div class="modal" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل القسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_edit">
                    <div class="form-group">
                        <label for="name_edit">الاسم </label>
                        <input type="text" class="form-control" id="name_edit" name="name" placeholder="الاسم">
                    </div>

                    <div class="form-group">
                        <label for="percent_edit">الصورة </label>
                        <input type="file" class="dropify" data-default-file="" name="image"  id="image_dropify" data-height="150"  />
                        <img width="200px" height="100px" src="" id="image_edit">
                    </div>

                    <input type="hidden" id="id" name="id">
                    <button class="btn ripple btn-success" type="submit" id="submit_button_edit">تعديل</button>
                </form>
            </div>
            <div class="modal-footer">

                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
            </div>
        </div>
    </div>
</div>
