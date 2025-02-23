
<div class="row g-0 flex-md-grow-1" id="chitietdethi" data-id="<?php echo $data["Test"]["made"] ?>">
    <div class="content content-full">
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-alt align-items-center" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="bang-diem-tab" data-bs-toggle="tab" data-bs-target="#bang-diem" role="tab" aria-controls="bang-diem" aria-selected="true">Điểm danh</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="thong-ke-tab" data-bs-toggle="tab" data-bs-target="#thong-ke" role="tab" aria-controls="thong-ke" aria-selected="false">QR</button>
                </li>
                <li class="nav-item ms-auto">
                    <div class="block-options ps-3 pe-2">
                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Toàn màn hình" type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content">
                <div class="tab-pane active" id="bang-diem" role="tabpanel" aria-labelledby="bang-diem-tab" tabindex="0">
                    <form action="#" method="POST" id="search-form" onsubmit="return false;">
                        <div class="row mb-4">
                            <div class="input-group">
                                <div class="col-md-6 d-flex gap-3">
                                    <button class="btn btn-alt-secondary dropdown-toggle btn-filtered-by-group" id="dropdown-filter-group" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                                    <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-group">
                                        <li><a class="dropdown-item filtered-by-group active" href="javascript:void(0)" data-value="0">Tất cả</a></li>
                                        <li><a class="dropdown-item filtered-by-group " href="javascript:void(0)" data-value="0">Đã điểm danh</a></li>
                                        <li><a class="dropdown-item filtered-by-group " href="javascript:void(0)" data-value="0">Chưa điểm danh</a></li>
                                    </ul>
                                    <input type="text" class="form-control form-control-alt" id="search-input" name="search-input" placeholder="Tìm kiếm sinh viên...">
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    
                                    <button type="button" class="btn btn-hero btn-primary btn-sm" id="export_excel"><i class="fa-solid fa-file me-1"></i>Điểm danh thủ công</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr class="table-col-title">
                                    <th class="text-center col-sort" data-sort-column="manguoidung" data-sort-order="default">MSSV</th>
                                    <th class="col-sort" data-sort-column="hoten" data-sort-order="default">Họ tên</th>
                                    <th class="text-center col-sort" data-sort-column="thoigianvaothi" data-sort-order="default">Thời gian điểm danh</th>
                                    <th class="text-center col-sort" data-sort-column="thoigianlambai" data-sort-order="default">Ip</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="took_the_exam">
                            </tbody>
                        </table>
                    </div>
                    <?php if (isset($data["Plugin"]["pagination"])) require "./mvc/views/inc/pagination.php" ?>
                </div>
                <div class="tab-pane" id="thong-ke" role="tabpanel" aria-labelledby="thong-ke-tab" tabindex="0">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-cau-hoi" tabindex="-1" role="dialog" aria-labelledby="modal-cau-hoi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết đề thi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-1">
                <div id="list-question"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
