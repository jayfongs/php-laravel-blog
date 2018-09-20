$(function () {

    /**
     * @移动端点击显示隐藏菜单
     */

    $('.navbar-toggle').click(function () {
        $(this).next().slideToggle(100);
    });
});