/* 
  这就是该模块的入口文件
 */

// 1.配置模块
require.config({
    paths: {
        "jquery": "/static/assets/vendors/jquery/jquery",
        "template": "/static/assets/vendors/art-template/template-web",
        "pagination": "/static/assets/vendors/twbs-pagination/jquery.twbsPagination",
        "bootstrap": "/static/assets/vendors/bootstrap/js/bootstrap"
    }

});
// 2.引入模块
require(["jquery", "template", "pagination", "bootstrap"], function($, template, pagination, bootstrap) {
    $(function() {
        var currentPage = 1;
        var pageSize = 10;
        var pageCount;

        getPage();
        var visiblePages = 7;
        if (visiblePages >= pageCount) {
            visiblePages = pageCount;
        }

        function getPage() {
            $.ajax({
                type: "post",
                url: "api/_getComments.php",
                data: { currentPage: currentPage, pageSize: pageSize },
                success: function(res) {
                    if (res.code == 1) {
                        var html = template('postTemp', res.data);
                        $('tbody').html(html);
                        pageCount = res.pageCount;
                        $("#pagination-demo").twbsPagination({
                            totalPages: pageCount, //最大的页码数
                            visiblePages: visiblePages, // 总共显示多少个分页按钮
                            first: "<<",
                            last: ">>",
                            prev: '<',
                            next: '>',
                            onPageClick: function(event, page) { // 点击每个按钮的时候执行的操作
                                //回调函数有两个参数，第一个是事件对象，第二个是当前的页码数
                                currentPage = page;
                                //每次点击分页的按钮，也要获取数据
                                getPage();
                            }
                        });
                    }
                }
            });
        }
    });
});
// 3.实现功能