$(document).ready(function() {
    $('.mainContent div:not(.sum)').hide();
  
    // 一开始显示 "sum" 内容
    $('.leftMenu li.sum').addClass('active');
    $('.mainContent div.sum').show();
  
    // 添加点击事件处理程序，切换显示内容
    $('.leftMenu li').click(function() {
      $('.leftMenu li').removeClass('active');
      $(this).addClass('active');
      var index = $(this).index();
      $('.mainContent div').hide();
      $('.mainContent div').eq(index).show();
    });
  
    // 刷新页面后触发 "sum" 的点击事件
    $('.leftMenu li.sum').trigger('click');
  });
  
$(document).ready(function() {

    // 监听总和的点击事件
    $('.sum').click(function() {
        // 切换下面三个表单的显示状态，带渐变动画
        $('.form1').slideToggle();
        $('.form2').slideToggle();
        $('.form3').slideToggle();
        
        $(this).find('.arrow').toggleClass('rotate');
    });
});

// ajax
$(document).ready(function() {
  $(".form2").click(function(event) {
      event.preventDefault(); // 阻止链接默认的跳转行为

      // 发起Ajax请求，获取新的内容并替换three div中的内容
      $.ajax({
          url: "show_query_result.php", // 加载内容的PHP文件（例如：load_form2.php）
          method: "GET",
          success: function(response) {
              $(".three").html(response); // 将新的内容加载到three div中
          },
          error: function() {
              console.log("请求新内容时发生错误");
          }
      });
  });
});

// function submitForm() {
//     var search = $('#search-input').val();
//     $.ajax({
//         url: 'show_query_result.php',
//         type: 'GET',
//         data: { search: search },
//         success: function(response) {
//             $('.three').html(response);
//         },
//         error: function() {
//             console.log('请求失败');
//         }
//     });
// }

function submitForm() {
  var search = $('#search-input').val();
  var sort = $('select[name="sort"]').val();
  $.ajax({
      url: 'show_query_result.php',
      type: 'GET',
      data: { search: search, sort: sort },
      success: function(response) {
          $('.three').html(response);
      },
      error: function() {
          console.log('请求失败');
      }
  });
}

$(document).ready(function() {
    // 添加点击事件处理程序
      $("#form1-link").click(function(e) {
      e.preventDefault(); // 阻止默认链接行为
      updateGoods(); // 执行刷新操作
    });
    // 更新商品数据
    function updateGoods() {
      $.ajax({
        url: "goods_manger.php", // 向服务器发送请求的文件路径
        method: "GET", // 请求方法（GET或POST）
        success: function(response) {
          $(".two").html(response); // 将获取到的最新商品数据更新到指定的HTML元素中
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
  });















