
Dashmix.helpersOnLoad(["js-flatpickr", "jq-datepicker", "jq-select2"]);

/**
 * 
 * @param {[]} diemDanhs 
 * @returns 
 */
function showListDiemdanh(diemDanhs) {
    if (diemDanhs.length == 0) {
        // html += `<p class="text-center">Không có dữ liệu</p>`
        $("#diemdanh-list").html(`<p class="text-center">Không có dữ liệu</p>`);
        $(".pagination").hide();
        return
    }
    let html = ``;

    diemDanhs.forEach(diemDanh => {
        let htmlDiemDanh = `
        <tr>
            <td class="text-center">${diemDanh.madiemdanh}</td>
            <td class="text-center">${diemDanh.ngaydiemdanh}</td>
            <td class="text-center">${diemDanh.ngayhethan}</td>
            <td class="text-center">${diemDanh.ddd}/${diemDanh.ss}</td>
            <td class="text-center col-action">
                <a data-role="nguoidung" data-action="update" class="btn btn-sm btn-alt-secondary user-edit show" href="/module/diemdanh_detail/${diemDanh.madiemdanh}" data-bs-toggle="tooltip" aria-label="Chỉnh sửa" data-bs-original-title="Chỉnh sửa" >
                    <i class="fa fa-fw fa-eye"></i>
                </a>
                <a data-role="nguoidung" data-action="delete" class="btn btn-sm btn-alt-secondary user-delete show" href="javascript:void(0)" data-bs-toggle="tooltip" aria-label="Xoá" data-bs-original-title="Xoá" data-id="${diemDanh.madiemdanh}">
                    <i class="fa fa-fw fa-times"></i>
                </a>
            </td>
        </tr>`;

        html += htmlDiemDanh;
    })

    $("#diemdanh-list").html(`
        <table class="table table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th class="text-center" >Ngày tạo</th>
                    <th class="text-center">Ngày hết hạn</th>
                    <th class="text-center">Sỉ số</th>
                    <th class="text-center col-header-action">Hành động</th>
                </tr>
            </thead>
            <tbody id="list-user">
                ${html}
            </tbody>
        </table>`);
}


$(document).ready(function () {
    const manhom = $(".content").data("id");
    // $.ajax({
    //     url: "/module/loadData",
    //     // type: "POST",
    //     data: {
    //         hienthi: 1
    //     },
    //     async: false,
    //     type: "POST",
    //     dataType: "json",
    //     success: function (data) {
            
    //         showListDiemdanh(data)
    //     }
    // })

    $.ajax({
        url: "/module/getAllDiemDanh",
        data: {
            manhom: manhom
        },
        async: false,
        type: "POST",
        dataType: "json",
        success: function (data) {
            console.log(data);
            showListDiemdanh(data)
        }
    })

})