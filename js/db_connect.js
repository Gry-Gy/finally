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

