  // 添加商品按钮
  function addGoods() {
    // 获取表单数据
    var form = document.getElementById("myForm");
    var formData = new FormData(form);
    formData.append("action", "add");

    // 发送 Ajax 请求
    $.ajax({
        url: "process.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // 解析服务器返回的 JSON 数据
            var data = JSON.parse(response);
            if (data.error) {
                // 显示错误信息
                alert(data.error);
            } else if (data.success) {
                // 显示成功信息
                alert(data.success);
                $(".form2").trigger("click");
                // TODO: 根据业务需求更新页面的显示内容
            }
        },
        error: function(xhr, status, error) {
            // 处理请求错误
            alert('添加商品失败！请检查网络连接或稍后重试。');
            console.error(error);
        }
    });
}


// 删除商品按钮
function deleteGoods() {
    // 获取表单数据
    var form = document.getElementById("deleteForm");
    var formData = new FormData(form);
    formData.append("action", "delete");
    // 发送 Ajax 请求
    $.ajax({
        url: "process.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // 处理请求成功后的响应
            alert('删除商品成功！');
            $(".form2").click();
            // TODO: 根据业务需求更新页面的显示内容
        },
        error: function(xhr, status, error) {
            // 处理请求错误
            alert('删除商品失败！请检查网络连接或稍后重试。');
            console.error(error);
        }
    });
}

// 更新商品按钮
function updateGoods() {
    // 获取表单数据
    var form = document.getElementById("updateForm");
    var formData = new FormData(form);
    formData.append("action", "update");
    // 发送 Ajax 请求
    $.ajax({
        url: "process.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // 处理请求成功后的响应
            alert('更新商品信息成功！');
            $(".form2").click();
            // TODO: 根据业务需求更新页面的显示内容
        },
        error: function(xhr, status, error) {
            // 处理请求错误
            alert('更新商品信息失败！请检查网络连接或稍后重试。');
            console.error(error);
        }
    });
}

// 查询商品按钮
function searchGoods() {
    // 获取表单数据
    var form = document.getElementById("searchForm");
    var formData = new FormData(form);
    formData.append("action", "search");

    // 发送 Ajax 请求
    $.ajax({
        url: "process.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // 处理请求成功后的响应
            alert('查询商品信息成功！');
            // TODO: 根据业务需求更新页面的显示内容
        },
        error: function(xhr, status, error) {
            // 处理请求错误
            alert('查询商品信息失败！请检查网络连接或稍后重试。');
            console.error(error);
        }
    });
}
