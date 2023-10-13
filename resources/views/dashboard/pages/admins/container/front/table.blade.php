<div class="col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="display: inline-block">المسؤولين</h4>
            <a class="heading-elements-toggle" style="float: left;cursor: pointer" id="reload_table">
                <i class='fa fa-refresh font-medium-3'></i>
            </a>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
               <div class="row">
                   <div class="col-6">
                       <a href="{{ route('dashboard.admin.create') }}" style="display:inline-block">
                           <button class="btn btn-success btn-icon mb-2" title="اضافة مسؤول"><i class="typcn typcn-document-add"></i></button>
                       </a>

                   </div>
                   <div class="col-6">
                       <button class="btn btn-danger btn-icon mb-2" id="multi_delete" style="float: left;display: none">
                           <i class="fa fa-trash" title="حذف المحدد" style="margin-right: -7px;"></i>
                       </button>
                   </div>
               </div>
                <div class="dt-ext table-responsive">

                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>
